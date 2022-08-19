<?php
class Page extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('page_model');
        
        $this->load->model('testimonial_model');
        $this->load->model('hocl_model');
        $this->load->model('team_model');
        $this->load->model('case_model');
        $this->load->model('product_model');
        $this->load->model('resource_model');
    }
    
    function contact_us()
    {
        if ($vals = $this->input->post()) {
            $res = array();
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 0;
            $res['status'] = 0;
            $res['frm_reset'] = 0;
            $res['redirect_url'] = 0;

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('phone', 'Phone', 'required');
            $this->form_validation->set_rules('country', 'Country', 'required');
            $this->form_validation->set_rules('msg', 'Message', 'required');
            // $this->form_validation->set_rules('g-recaptcha-response','Robot','required',array('required'=>'Please verify that you are not robot!'));
            if ($this->form_validation->run() === FALSE) {
                $res['msg'] = validation_errors();
            } else {
                $vals['msg'] = html_escape($this->input->post('msg'));
                $vals['created_date']=date('Y-m-d H:i:s');
                $vals['status']=0;
                $id = $this->master->save('contact',$vals);
                /*$secret = RECAPTCHA_SECRET_KEY;
                $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$vals['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
                if($response['success'] == true){*/

                // $vals['site_email'] = $this->data['site_settings']->site_email;
                // $vals['site_noreply_email'] = $this->data['site_settings']->site_noreply_email;
                
                if ($id > 0) {
                    // if ($_SERVER['HTTP_HOST'] != 'localhost') {
                    //     $this->sendMessage($vals);
                    // }
                    $res['msg'] = 'Message sent successfully!';
                    // $n_ar['sender'] = $this->session->userdata('mem_id');
                    // $n_ar['mem_id'] = 0;
                    // $n_ar['created_date'] = date('Y-m-d h:i:s');
                    // $n_ar['status'] = 0;
                    // $n_ar['section'] = 'New Contact message';
                    // $n_ar['txt'] = 'You have received a message from '.$vals['name'].'. To view details, <a href="'.base_url(ADMIN.'/contact/manage/'.$id).'">click here</a>';
                    // $this->master->save('notify', $n_ar); 
                    $res['status'] = 1;
                    $res['frm_reset'] = 1;
                    $res['hide_msg'] = 1;
                    // $res['redirect_url'] = site_url('contact-us');
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
        else{
            $row = $this->page_model->get_row_where(array('ckey' => 'contact'));   
            // pr($row);     
            $this->data['left_1'] = getMultiText('contact-sec2-left-1');
            $this->data['left_2'] = getMultiText('contact-sec2-left-2');
            $this->data['site_content'] = unserialize($row->code);
            $this->data['pageView']='contact';
            $this->data['footer']=true;
            $this->load->view("includes/site-master", $this->data);
        } 
    }
    function jobs()
    {
        $row = $this->page_model->get_row_where(array('ckey' => 'jobs'));       
        $this->data['site_content'] = unserialize($row->code);
        $this->data['pageView']='job';
        $this->data['cats'] = $this->master->get_data_rows('job_categories', ['status'=> 1]);
        $this->data['areas'] = $this->master->get_data_rows('job_practice_area', ['status'=> 1]);
        $this->data['levels'] = $this->master->get_data_rows('job_experience_levels', ['status'=> 1]);
        $this->data['jobs'] = $this->master->get_data_rows('jobs', ['status'=> 1], 'desc');
        $this->data['footer']=true;
        $this->load->view("includes/site-master", $this->data);
    }

    function search_jobs()
    {
        if($this->input->post())
        {
            $this->data['jobs'] = $this->page_model->search_for_jobs($this->input->post());
            echo json_encode(
                [
                    'status'=> true,
                    'html'=> $this->load->view('search-job', $this->data, true)
                ]   
            );
        }
    }
    
    function locations()
    {
        $row = $this->page_model->get_row_where(array('ckey' => 'locations')); 
        $this->data['site_content'] = unserialize($row->code);
        $this->data['locations'] = $this->master->get_data_rows('locations', ['status'=> 1], 'desc');
        $this->data['pageView']='location';
        $this->data['footer']=true;
        $this->load->view("includes/site-master", $this->data);
    }

    function resources()
    {
        $row = $this->page_model->get_row_where(array('ckey' => 'resources'));       
        $this->data['site_content'] = unserialize($row->code);
        $this->data['resources_videos'] = $this->resource_model->get_rows(array('status'=>1,'type'=>'video')); 
        $this->data['resources_pdfs'] = $this->resource_model->get_rows(array('status'=>1,'type'=>'pdf')); 
        $this->data['resources'] = $this->resource_model->get_rows(array('status'=>1)); 
        $this->data['pageView']='pages/resources';
        $this->data['footer']=true;
        $this->load->view("includes/site-master", $this->data);
    }
    
    function what_is_hocl($id)
    {
        $id=doDecode($id);

        if (intval($id) > 0 && $this->data['hocl'] = $this->hocl_model->get_row_where(array("id"=>$id,'status'=>1))) {
            $this->data['pageView'] = 'pages/what-is-hocl';
            $this->data['footer']=true;
            // pr($this->data['tags']);
            $this->data['page_title'] = $this->data['hocl']->title;
            $this->data['meta_keywords'] = $this->data['hocl']->meta_keywords;
            $this->data['meta_description'] = $this->data['hocl']->meta_description;
            $this->data['meta_title'] = $this->data['hocl']->meta_title;
            $this->load->view("includes/site-master", $this->data);
        } else {
            show_404();
        }
    }
    
    function case_studies($id)
    {
        $id=doDecode($id);

        if (intval($id) > 0 && $this->data['case_study'] = $this->case_model->get_row_where(array("id"=>$id,'status'=>1))) {
            $this->data['pageView'] = 'pages/case-study';
            $this->data['footer']=true;
            // pr($this->data['tags']);
            $this->data['page_title'] = $this->data['case_study']->title;
            $this->data['meta_keywords'] = $this->data['case_study']->meta_keywords;
            $this->data['meta_description'] = $this->data['case_study']->meta_description;
            $this->data['meta_title'] = $this->data['case_study']->meta_title;
            $this->load->view("includes/site-master", $this->data);
        } else {
            show_404();
        }
    }
    
    function job_detail($id)
    {
        $id = doDecode($id);
        if($vals = $this->input->post())
        {
            $res = array();
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 0;
            $res['status'] = 0;
            $res['frm_reset'] = 0;
            $res['redirect_url'] = 0;

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('phone', 'Phone No', 'required');
            $this->form_validation->set_rules('msg', 'Message', 'required');
            if ($this->form_validation->run() === FALSE) {
                $res['msg'] = validation_errors();
            } else {
                $vals['msg'] = html_escape($this->input->post('msg'));
                $vals['created_date']=date('Y-m-d H:i:s');
                $vals['status']=0;
                $vals['job_id'] = $id;

                if (isset($_FILES["cv"]["name"]) && $_FILES["cv"]["name"] != "") {
                    $image = upload_file(UPLOAD_PATH.'cv/', 'cv', 'file');
                    if(!empty($image['file_name'])){
                        $vals['cv'] = $image['file_name'];
                    }
                }

                $job_id = $this->master->save('job_enquiries', $vals);
                // $vals['site_email'] = $this->data['site_settings']->site_email;
                // $vals['site_noreply_email'] = $this->data['site_settings']->site_noreply_email;
                
                if ($job_id > 0) {
                    // if ($_SERVER['HTTP_HOST'] != 'localhost') {
                    //     $this->sendMessage($vals);
                    // }
                    $res['msg'] = 'Enquiry sent successfully!';
                    // $n_ar['sender'] = $this->session->userdata('mem_id');
                    // $n_ar['mem_id'] = 0;
                    // $n_ar['created_date'] = date('Y-m-d h:i:s');
                    // $n_ar['status'] = 0;
                    // $n_ar['section'] = 'New Contact message';
                    // $n_ar['txt'] = 'You have received a message from '.$vals['name'].'. To view details, <a href="'.base_url(ADMIN.'/contact/manage/'.$id).'">click here</a>';
                    // $this->master->save('notify', $n_ar); 
                    $res['status'] = 1;
                    $res['frm_reset'] = 1;
                    $res['hide_msg'] = 1;
                    // $res['redirect_url'] = site_url('contact-us');
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
        else
        {
            if (intval($id) > 0 && $this->data['job'] = $this->master->get_data_row('jobs', ['status'=> 1, 'id'=> $id])) {
                $row = $this->page_model->get_row_where(array('ckey' => 'job_detail'));       
                $this->data['site_content'] = unserialize($row->code);
    
                $this->data['pageView'] = 'job-detail';
                $this->data['footer']=true;
                // pr($this->data['tags']);
                $this->data['page_title'] = $this->data['job']->title;
                $this->data['meta_keywords'] = $this->data['job']->title;
                $this->data['meta_description'] = $this->data['job']->title;
                $this->data['meta_title'] = $this->data['job']->title;
                $this->load->view("includes/site-master", $this->data);
            } else {
                show_404();
            }
        }
    }

    function location_detail($id)
    {
        $id = doDecode($id);

        if (intval($id) > 0 && $this->data['location'] = $this->master->get_data_row('locations', ['status'=> 1, 'id'=> $id]))
        {
            $this->data['pageView'] = 'location-detail';
            $this->data['footer']=true;
            // pr($this->data['tags']);
            $this->data['page_title'] = $this->data['location']->title;
            $this->data['meta_keywords'] = $this->data['location']->meta_keywords;
            $this->data['meta_description'] = $this->data['location']->meta_description;
            $this->data['meta_title'] = $this->data['location']->meta_title;
            $this->data['images'] = getMultiText($id);
            $this->load->view("includes/site-master", $this->data);
        } else {
            show_404();
        }
    }

    function blog()
    {
        $row = $this->page_model->get_row_where(array('ckey' => 'blog'));       
        $this->data['site_content'] = unserialize($row->code);
        $this->data['pageView']='pages/blog';
        $this->data['footer']=true;
        $this->data['featured_news'] = $this->blog_model->get_rows(array('status'=>1,'feature'=>1), 0, 3, 'desc');
        $this->data['blogs'] = $this->blog_model->get_rows(array('status'=>1), '', '', 'desc');
        $this->data['recent_news'] = $this->news_model->get_rows(array('status'=>1), 0, 6, 'asc');
        $this->load->view("includes/site-master", $this->data);
    }
    
    function blog_details($id)
    {
        $id=doDecode($id);
        $this->data['blog'] = $this->blog_model->get_row($id, 'id');
        // pr($this->db->last_query());
        if (intval($id) > 0 && $this->data['blog'] = $this->blog_model->get_row($id, 'id')) {
            // pr($this->data['blog']);
            $this->data['recent_blogs'] = $this->blog_model->get_rows(array('id!=' => $this->data['blog']->id), 0, 6, 'DESC');
            $this->data['pageView'] = 'pages/blog_details';
            $this->data['footer']=true;
            // pr($this->data['recent_blogs']);
            $this->data['page_title'] = $this->data['blog']->title;
            $this->data['meta_keywords'] = $this->data['blog']->meta_keywords;
            $this->data['meta_description'] = $this->data['blog']->meta_description;
            $this->load->view("includes/site-master", $this->data);
        } else {
            show_404();
        }
    }
    
    function privacy_policy()
    {
        $row = $this->page_model->get_row_where(array('ckey' => 'privacy_policy'));      
        $this->data['site_content'] = unserialize($row->code);
        $this->data['pageView']='pages/privacy-policy';
        $this->data['footer']=true;
        $this->load->view("includes/site-master", $this->data);
    }

    function where_to_buy()
    {
        $row = $this->page_model->get_row_where(array('ckey' => 'where_to_buy'));      
        $this->data['site_content'] = unserialize($row->code);
        $this->data['pageView']='pages/where-to-buy';
        $this->data['footer']=true;
        $this->load->view("includes/site-master", $this->data);
    }
    
    function terms()
    {
        $row = $this->page_model->get_row_where(array('ckey' => 'terms'));       
        $this->data['site_content'] = unserialize($row->code);
        $this->data['pageView']='pages/terms-and-conditions';
        $this->data['footer']=true;
        $this->load->view("includes/site-master", $this->data);
    }
    function error()
    {
        $this->data['page_404']=true;
        $this->data['pageView']='pages/404';
        $this->data['page_title'] = '404';
        $this->data['meta_keywords'] = '404';
        $this->data['meta_description'] = '404';
        $this->load->view("includes/site-master", $this->data);
    }

}
