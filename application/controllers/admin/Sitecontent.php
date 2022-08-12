<?php
class Sitecontent extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->isLogged();
        has_access(21);
        $this->table_name = 'sitecontent';
        $this->load->model('page_model');
    }

    public function home()
    {
        $check = $this->page_model->num_rows(array('ckey' => $this->uri->segment(3),'site_lang'=>$this->session->userdata('admin_lang')));
        // pr($this->db->last_query());
        if (!$check) {
            $this->page_model->save(array('ckey' => $this->uri->segment(3),'site_lang'=>$this->session->userdata('admin_lang')));
        }
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_home';
        if ($vals = $this->input->post()) {
            $content_row = $this->page_model->get_row_where(array('ckey' => $this->uri->segment(3),'site_lang'=>$this->session->userdata('admin_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <= 10; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if(!empty($image['file_name'])){
                        if($i==1){
                            generate_thumb(UPLOAD_PATH . "images/", UPLOAD_PATH . "images/", $image['file_name'], 1200, 'thumb_');
                        }
                        else if($i==2){
                            generate_thumb(UPLOAD_PATH . "images/", UPLOAD_PATH . "images/", $image['file_name'], 400, 'thumb_');
                        }
                        else if($i==6 || $i==7 || $i==8){
                            generate_thumb(UPLOAD_PATH . "images/", UPLOAD_PATH . "images/", $image['file_name'], 80, 'thumb_');
                        }
                        else if($i==9){
                            generate_thumb(UPLOAD_PATH . "images/", UPLOAD_PATH . "images/", $image['file_name'], 1000, 'thumb_');
                        }
                        else if($i==10){
                            generate_thumb(UPLOAD_PATH . "images/", UPLOAD_PATH . "images/", $image['file_name'], 400, 'thumb_');
                        }
                        if(isset($content_row['image'.$i]))
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }


            $data = serialize(array_merge($content_row, $vals));
            $this->page_model->save(array('code' => $data,'site_lang'=>$this->session->userdata('admin_lang')),'ckey', $this->uri->segment(3),$this->session->userdata('admin_lang'));
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/home");
            exit;
        }

        $this->data['row'] = $this->page_model->get_row_where(array('ckey' => $this->uri->segment(3),'site_lang'=>$this->session->userdata('admin_lang')));        
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }
    
    public function jobs()
    {
        $check = $this->page_model->num_rows(array('ckey' => $this->uri->segment(3),'site_lang'=>$this->session->userdata('admin_lang')));
        // pr($this->db->last_query());
        if (!$check) {
            $this->page_model->save(array('ckey' => $this->uri->segment(3),'site_lang'=>$this->session->userdata('admin_lang')));
        }
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_jobs';
        if ($vals = $this->input->post()) {
            $content_row = $this->page_model->get_row_where(array('ckey' => $this->uri->segment(3),'site_lang'=>$this->session->userdata('admin_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();
            for($i = 1; $i <= 1; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if(!empty($image['file_name'])){
                        if($i==1){
                            generate_thumb(UPLOAD_PATH . "images/", UPLOAD_PATH . "images/", $image['file_name'], 1000, 'thumb_');
                        }
                        if(isset($content_row['image'.$i]))
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $data = serialize(array_merge($content_row, $vals));
            $this->page_model->save(array('code' => $data,'site_lang'=>$this->session->userdata('admin_lang')),'ckey', $this->uri->segment(3),$this->session->userdata('admin_lang'));
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/".$this->uri->segment(3));
            exit;
        }

        $this->data['row'] = $this->page_model->get_row_where(array('ckey' => $this->uri->segment(3),'site_lang'=>$this->session->userdata('admin_lang')));
        
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }
    
    public function locations()
    {
        $check = $this->page_model->num_rows(array('ckey' => $this->uri->segment(3),'site_lang'=>$this->session->userdata('admin_lang')));
        // pr($this->db->last_query());
        if (!$check) {
            $this->page_model->save(array('ckey' => $this->uri->segment(3),'site_lang'=>$this->session->userdata('admin_lang')));
        }
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_locations';
        if ($vals = $this->input->post()) {
            $content_row = $this->page_model->get_row_where(array('ckey' => $this->uri->segment(3),'site_lang'=>$this->session->userdata('admin_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();
            for($i = 1; $i <= 1; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if(!empty($image['file_name'])){
                        if($i==1){
                            generate_thumb(UPLOAD_PATH . "images/", UPLOAD_PATH . "images/", $image['file_name'], 1000, 'thumb_');
                        }
                        if(isset($content_row['image'.$i]))
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $data = serialize(array_merge($content_row, $vals));
            $this->page_model->save(array('code' => $data,'site_lang'=>$this->session->userdata('admin_lang')),'ckey', $this->uri->segment(3),$this->session->userdata('admin_lang'));
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/".$this->uri->segment(3));
            exit;
        }

        $this->data['row'] = $this->page_model->get_row_where(array('ckey' => $this->uri->segment(3),'site_lang'=>$this->session->userdata('admin_lang')));
        
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }
    
    public function contact()
    {
        $check = $this->page_model->num_rows(array('ckey' => $this->uri->segment(3),'site_lang'=>$this->session->userdata('admin_lang')));
        // pr($this->db->last_query());
        if (!$check) {
            $this->page_model->save(array('ckey' => $this->uri->segment(3),'site_lang'=>$this->session->userdata('admin_lang')));
        }
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_contact';
        if ($vals = $this->input->post()) {
            $content_row = $this->page_model->get_row_where(array('ckey' => $this->uri->segment(3),'site_lang'=>$this->session->userdata('admin_lang')));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

                for($i = 1; $i <= 1; $i++) {
                    if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                        
                        $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                        if(!empty($image['file_name'])){
                            if($i==1){
                                generate_thumb(UPLOAD_PATH . "images/", UPLOAD_PATH . "images/", $image['file_name'], 1200, 'thumb_');
                            }
                            if(isset($content_row['image'.$i]))
                                $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                            $vals['image'.$i] = $image['file_name'];
                        }
                    }
                }

            $sec2_left_1['title'] = $vals['sec2_left_1_title'];
            $sec2_left_1['detail'] = $vals['sec2_left_1_detail'];
            $sec2_left_1['order_no'] = $vals['sec2_left_1_order_no'];
            unset($vals['sec2_left_1_order_no'], $vals['sec2_left_1_title']);
            $this->master->delete('multi_text', 'section', 'contact-sec2-left-1');
            $sec2_left_1s = array('title' => $sec2_left_1['title'], 'order_no' => $sec2_left_1['order_no'], 'detail' =>  $sec2_left_1['detail']);
            saveMultiMediaFields($sec2_left_1s, 'contact-sec2-left-1');

            $sec2_left_2['title'] = $vals['sec2_left_2_title'];
            $sec2_left_2['order_no'] = $vals['sec2_left_2_order_no'];
            $sec2_left_2Phto['pics'] = $vals['sec2_left_2_pics'];
            unset($vals['sec2_left_2_pics'],$vals['sec2_left_2_order_no'],$vals['sec2_left_2_title']);
            $this->master->delete_where('multi_text', array('section'=> 'contact-sec2-left-2','site_lang'=>$this->session->userdata('admin_lang')));
            $sec2_left_2s = array('order_no' => $sec2_left_2['order_no'],'title' => $sec2_left_2['title']);
            saveMultiMediaFieldsImgs('./uploads/images/', $_FILES['sec2_left_2_image'], 'sec2_left_2_image', 'contact-sec2-left-2', $sec2_left_2Phto['pics'], $sec2_left_2s,$this->session->userdata('admin_lang'),100);
            $data = serialize(array_merge($content_row, $vals));
            $this->page_model->save(array('code' => $data,'site_lang'=>$this->session->userdata('admin_lang')),'ckey', $this->uri->segment(3),$this->session->userdata('admin_lang'));
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/".$this->uri->segment(3));
            exit;
        }

        $this->data['row'] = $this->page_model->get_row_where(array('ckey' => $this->uri->segment(3),'site_lang'=>$this->session->userdata('admin_lang')));
        
        $this->data['row'] = unserialize($this->data['row']->code);
        // pr($this->data['row']);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    

    public function delete()
    {
        $arr = $this->input->post('delete');
        foreach ($arr as $key => $values) {
            $this->master->delete($this->table_name, 'id', $values);
        }
        redirect("admin/sitecontent/slider", 'refresh');
    }

    function remove_file($filepath)
    {
        if (is_file($filepath))
            unlink($filepath);
        return;
    }

}
?>