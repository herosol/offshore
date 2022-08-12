<?php

class Jobs extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->isLogged();
        // $this->load->model('newsletter_model');
        has_access(10);
    }

    public function index() {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/jobs';
        $this->data['jobs'] = $this->master->get_data_rows('jobs', [], 'desc');
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage() {
        $this->data['enable_editor'] = TRUE;
        $this->data['settings'] = $this->master->get_data_row('siteadmin');
        $this->data['pageView'] = ADMIN . '/jobs';
         if ($this->input->post()) {
            $vals = $this->input->post();
            $content_row = $this->master->get_data_row('jobs', array('id'=>$this->uri->segment(4)));
            // if (isset($_FILES["image"]["name"]) && $_FILES["image"]["name"] != "") {
            //     $image1 = upload_file(UPLOAD_PATH.'jobs/', 'image');
            //         generate_thumb(UPLOAD_PATH . "jobs/", UPLOAD_PATH . "jobs/", $image1['file_name'],100,'thumb_');
            //         generate_thumb(UPLOAD_PATH . "jobs/", UPLOAD_PATH . "jobs/", $image1['file_name'],200,'200p_');
            //         generate_thumb(UPLOAD_PATH . "jobs/", UPLOAD_PATH . "jobs/", $image1['file_name'],400,'400p_');
            //         generate_thumb(UPLOAD_PATH . "jobs/", UPLOAD_PATH . "jobs/", $image1['file_name'],500,'500p_');
            //         generate_thumb(UPLOAD_PATH . "jobs/", UPLOAD_PATH . "jobs/", $image1['file_name'],700,'700p_');
            //     $vals['image']=$image1['file_name'];
            // }
            // else{
            //     $vals['image']=$content_row->image;
            // }
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
                'title'=>$vals['title'],
                'description'=>$vals['description'],
                'job_cat'=>$vals['job_category'],
                'years_of_experience'=>$vals['years_of_experience'],
                'min_salary'=>$vals['min_salary'],
                'max_salary'=>$vals['max_salary'],
                'job_type'=>$vals['job_type'],
                'city'=>$vals['city'],
                'status'=>$vals['status'],
                'created_date'=>$created_date,
            );
            $id = $this->master->save('jobs', $values, 'id', $this->uri->segment(4));
            //print_r($id);die;
            if($id > 0){
                setMsg('success', 'Job has been saved successfully.');
                redirect(ADMIN . '/jobs', 'refresh');
                exit;
            }
        }
        $this->data['row'] = $this->master->get_data_row('jobs',array('id'=>$this->uri->segment('4')));
        $this->data['cats'] = $this->master->get_data_rows('job_categories', ['status'=> 1]);
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
        $this->master->delete('jobs','id', $this->uri->segment(4));
        setMsg('success', 'Job has been deleted successfully.');
        redirect(ADMIN . '/jobs', 'refresh');
    }
}

?>