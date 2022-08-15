<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends MY_Controller
{

	function __construct()
    {
		parent::__construct();
	}
	
	function newsletter()
    {
        $res = array();
        $res['hide_msg'] = 0;
        $res['scroll_to_msg'] = 1;
        $res['status'] = 0;
        $res['frm_reset'] = 0;
        $res['redirect_url'] = 0;
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[newsletter.email]',
            array(
                'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already joined.'
            ));
        if($this->form_validation->run() === FALSE) {
            $res['msg'] = validation_errors();
            $res['status'] = 0;
        } else {
            $vals = html_escape($this->input->post());

            $id=$this->master->save('newsletter', $vals);
			if($id > 0){
				$res['msg'] = 'Joined successfully!';
				$res['status'] = 1;
				$res['frm_reset'] = 1;
				$res['hide_msg']=1;
				
			}
			else{
				$res['msg'] = 'Technical problem!';
			}
            
        }
        exit(json_encode($res));
    }
	function searchResults(){
        $output='';
        $vals=$this->input->post();
        if($this->input->post()){
            $query=$vals['query'];

            $products=$this->master->searchResults($query,'products');
            $hocl=$this->master->searchResults($query,'hocl');
            $case_studies=$this->master->searchResults($query,'case_studies');
            $faqs=$this->master->searchResults($query,'faqs');
            if(!empty($products) || !empty($hocl) || !empty($case_studies) || !empty($faqs)){
                if(!empty($products)){
                    $output .="<h5 style='padding:0 10px;text-align:left;margin-top:10px'>Products:</h5>";
                    foreach($products as $product){
                        $output .="<li><a href='".base_url('product/'.doEncode($product->id)."/".toSlugUrl($product->title))."'>".ucfirst($product->title)."</a></li>";
                    }
                }
                if(!empty($hocl)){
                    $output .="<h5 style='padding:0 10px;text-align:left;margin-top:10px'>HOCL:</h5>";
                    foreach($hocl as $hcl){
                        $output .="<li><a href='".base_url('hocl/'.doEncode($hcl->id)."/".toSlugUrl($hcl->title))."'>".ucfirst($hcl->title)."</a></li>";
                    }
                }
                if(!empty($case_studies)){
                    $output .="<h5 style='padding:0 10px;text-align:left;margin-top:10px'>Case Studies:</h5>";
                    foreach($case_studies as $case){
                        $output .="<li><a href='".base_url('case-study/'.doEncode($case->id)."/".toSlugUrl($case->title))."'>".ucfirst($case->title)."</a></li>";
                    }
                }
                if(!empty($faqs)){
                    $output .="<h5 style='padding:0 10px;text-align:left;margin-top:10px'>FAQs:</h5>";
                    foreach($faqs as $faq){
                        $url=base_url('faq#'.toSlugUrl($faq->question));
                        
                        $output .="<li><a href='".$url."'>".ucfirst($faq->question)."</a></li>";
                    }
                }
                
                
            }
            else{
                $output.="<li>No results found!!</li>";
            }

            
        }
         exit(json_encode($output));

    }
	
	function get_states($country_id){
		$output='';
		$country_id=intval($country_id);
		if($country_id > 0 && $states=$this->master->getRows('states',array('country_id'=>$country_id))){
			foreach($states as $state){
				$output .='
						<option value="'.$state->id.'">'.ucfirst($state->name).'</option>
				';
			}
		}
		else{
			$output .='<option value="">No state found!</option>';
		}
		exit(json_encode($output));
	}
	
	function loan_requests(){
		if ($vals = html_escape($this->input->post())) {
            $res = array();
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 0;
            $res['status'] = 0;
            $res['frm_reset'] = 0;
            $res['redirect_url'] = 0;

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('country', 'Country', 'required');
            $this->form_validation->set_rules('state', 'State', 'required');
            $this->form_validation->set_rules('city', 'City', 'required');
            $this->form_validation->set_rules('msg', 'Message', 'required');
            // $this->form_validation->set_rules('g-recaptcha-response','Robot','required',array('required'=>'Please verify that you are not robot!'));
            if ($this->form_validation->run() === FALSE) {
                $res['msg'] = validation_errors();
            } else {
				$vals['country']=get_country_name($vals['country']);
				$vals['state']=get_state_name($vals['state']);
                $vals['msg'] = html_escape($this->input->post('msg'));
                $vals['created_date']=date('Y-m-d H:i:s');
                $vals['status']=0;
            $id = $this->master->save('loan_requests',$vals);
                /*$secret = RECAPTCHA_SECRET_KEY;
                $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$vals['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
                if($response['success'] == true){*/

                $vals['site_email'] = $this->data['site_settings']->site_email;
                $vals['site_noreply_email'] = $this->data['site_settings']->site_noreply_email;
                
                if ($id > 0) {
                    if ($_SERVER['HTTP_HOST'] != 'localhost') {
                        $this->sendLoanRequest($vals);
                        $this->sendLoanRequestAdmin($vals);
                    }
                    $res['msg'] = 'Request sent successfully!';
                    
                    $res['status'] = 1;
                    $res['frm_reset'] = 1;
                    $res['hide_msg'] = 1;
                } else {
                    $res['msg'] = 'Error Occurred!';
                }
                /*}else{
                    $res['msg'] = showMsg('error','Please verify that you are not robot!');

                    // $res['redirect_url'] = site_url('contact-us');
                }*/
            }
            exit(json_encode($res));
        }
	}
	
	
	
	
}

?>