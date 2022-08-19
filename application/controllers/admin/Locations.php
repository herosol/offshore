<?php

class Locations extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->isLogged();
        // $this->load->model('newsletter_model');
        has_access(10);
    }

    public function index() {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/locations';
        $this->data['locations'] = $this->master->get_data_rows('locations', [], 'desc');
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage() {
        $this->data['enable_editor'] = TRUE;
        $this->data['settings'] = $this->master->get_data_row('siteadmin');
        $this->data['pageView'] = ADMIN . '/locations';
         if ($this->input->post()) {
            $vals = $this->input->post();
            // pr($vals, false);
            // pr($_FILES);
            $content_row = $this->master->get_data_row('locations', array('id'=>$this->uri->segment(4)));

            if (isset($_FILES["image"]["name"]) && $_FILES["image"]["name"] != "") {
                $image = upload_file(UPLOAD_PATH.'locations/', 'image');
                    generate_thumb(UPLOAD_PATH . "locations/", UPLOAD_PATH . "locations/", $image['file_name'],400,'thumb_');
                $vals['image'] = $image['file_name'];
            }
            else{
                $vals['image']=$content_row->image;
            }

            if (isset($_FILES["banner1"]["name"]) && $_FILES["banner1"]["name"] != "") {
                $image = upload_file(UPLOAD_PATH.'locations/', 'banner1');
                    generate_thumb(UPLOAD_PATH . "locations/", UPLOAD_PATH . "locations/", $image['file_name'],1920,'thumb_');
                $vals['banner1'] = $image['file_name'];
            }
            else{
                $vals['banner1']=$content_row->banner1;
            }

            if (isset($_FILES["sec1_image"]["name"]) && $_FILES["sec1_image"]["name"] != "") {
                $image = upload_file(UPLOAD_PATH.'locations/', 'sec1_image');
                    generate_thumb(UPLOAD_PATH . "locations/", UPLOAD_PATH . "locations/", $image['file_name'],700,'thumb_');
                $vals['sec1_image'] = $image['file_name'];
            }
            else{
                $vals['sec1_image']=$content_row->sec1_image;
            }

            if (isset($_FILES["banner2"]["name"]) && $_FILES["banner2"]["name"] != "") {
                $image = upload_file(UPLOAD_PATH.'locations/', 'banner2');
                    generate_thumb(UPLOAD_PATH . "locations/", UPLOAD_PATH . "locations/", $image['file_name'],1920,'thumb_');
                $vals['banner2'] = $image['file_name'];
            }
            else{
                $vals['banner2']=$content_row->banner2;
            }

            if (isset($_FILES["sec2_image"]["name"]) && $_FILES["sec2_image"]["name"] != "") {
                $image = upload_file(UPLOAD_PATH.'locations/', 'sec2_image');
                    generate_thumb(UPLOAD_PATH . "locations/", UPLOAD_PATH . "locations/", $image['file_name'],700,'thumb_');
                $vals['sec2_image'] = $image['file_name'];
            }
            else{
                $vals['sec2_image']=$content_row->sec2_image;
            }

            $created_date="";
            if(empty($content_row->created_date)){
                $created_date=date('Y-m-d h:i:s');
            }
            else{
                $created_date=$content_row->created_date;
            }
            //pr($image1);
            //$categories=implode(",",$vals['categories']);
            $values=array(
                'meta_title'=>$vals['meta_title'],
                'meta_keywords'=>$vals['meta_keywords'],
                'meta_description'=>$vals['meta_description'],
                'title'=>$vals['title'],
                'image'=>$vals['image'],
                'banner1'=>$vals['banner1'],
                'sec1_image'=>$vals['sec1_image'],
                'banner2'=>$vals['banner2'],
                'sec2_image'=>$vals['sec2_image'],
                'sec1_heading'=>$vals['sec1_heading'],
                'sec1_detail'=>$vals['sec1_detail'],
                'sec2_heading'=>$vals['sec2_heading'],
                'sec2_detail'=>$vals['sec2_detail'],
                'status'=>$vals['status'],
                'created_date'=>$created_date,
            );
            $id = $this->master->save('locations', $values, 'id', $this->uri->segment(4));


            $sec2_left_2['order_no'] = $vals['sec2_left_2_order_no'];
            $sec2_left_2Phto['pics'] = $vals['sec2_left_2_pics'];
            unset($vals['sec2_left_2_pics'],$vals['sec2_left_2_order_no']);
            $this->master->delete_where('multi_text', array('section'=> $id,'site_lang'=>$this->session->userdata('admin_lang')));
            $sec2_left_2s = array('order_no' => $sec2_left_2['order_no']);
            saveMultiMediaFieldsImgs('./uploads/locations/', $_FILES['sec2_left_2_image'], 'sec2_left_2_image', $id, $sec2_left_2Phto['pics'], $sec2_left_2s,$this->session->userdata('admin_lang'), 700);

            //print_r($id);die;
            if($id > 0){
                setMsg('success', 'Location has been saved successfully.');
                redirect(ADMIN . '/locations', 'refresh');
                exit;
            }
        }
        $this->data['row'] = $this->master->get_data_row('locations',array('id'=>$this->uri->segment('4')));
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);        
    }

    function add_category(){
        $data=$this->input->post();
        $res=array();
        if(empty($data['cat_name'])){
            $res['status']=false;
            $res['empty']=true;
            echo json_encode($res);
        }
        else{
            $vals=array(
                'name'=>$data['cat_name']
            );
            $q=$this->master->save("categories",$vals);
            if($q>0){
                $res['status']=true;
                $res['success']=true;
                $res['cat_id']=$q;
            }
            else{
                 $res['status']=false; 
                 $res['fail']=false;  
            }
            echo json_encode($res);
        }
    }	
    
    function delete()
    {
        has_access(17);
        $this->master->delete('locations','id', $this->uri->segment(4));
        setMsg('success', 'Locations has been deleted successfully.');
        redirect(ADMIN . '/locations', 'refresh');
    }
}

?>