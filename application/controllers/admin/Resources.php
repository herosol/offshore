<?php

class Resources extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isLogged();
        $this->load->model('resource_model');
    }

    function index()
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/resources';

        $this->data['rows'] = $this->resource_model->get_rows(array());
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/resources';
        if ($this->input->post()) {
            $vals = $this->input->post();
            // pr($_FILES);
            if (($_FILES["image"]["name"] != "")) {
                
                $image = upload_image(UPLOAD_PATH . "resources/", 'image');
                if (!empty($image['file_name'])) {
                    $vals['image'] = $image['file_name'];
                    $this->remove_file($this->uri->segment(4));
                    generate_thumb(UPLOAD_PATH . "resources/", UPLOAD_PATH . "resources/", $image['file_name'],800,'thumb_');
                } else {
                    setMsg('errorMsg', 'Please upload a valid video poster file >> ' . strip_tags($image['error']));
                    redirect(ADMIN . '/resources/manage/' . $this->uri->segment(4), 'refresh');
                    exit;
                }
            }
            if (($_FILES["pdf_image"]["name"] != "")) {
                
                $pdf_image = upload_image(UPLOAD_PATH . "resources/", 'pdf_image');
                if (!empty($pdf_image['file_name'])) {
                    $vals['image'] = $pdf_image['file_name'];
                    $this->remove_file($this->uri->segment(4));
                    generate_thumb(UPLOAD_PATH . "resources/", UPLOAD_PATH . "resources/", $pdf_image['file_name'],800,'thumb_');
                } else {
                    setMsg('errorMsg', 'Please upload a valid pdf thumbnail file >> ' . strip_tags($pdf_image['error']));
                    redirect(ADMIN . '/resources/manage/' . $this->uri->segment(4), 'refresh');
                    exit;
                }
            }
            // pr($image);
            if (isset($_FILES["video"]["name"]) && $_FILES["video"]["name"] != "") {
                $video = upload_file(UPLOAD_PATH.'resources/', 'video','video');
                // pr($video);
                if(!empty($video['file_name'])){
                    
                    $vals['video'] = $video['file_name'];
                    $this->remove_file($this->uri->segment(4),'video');
                    
                }
                else{
                    setMsg('errorMsg', 'Please upload a valid image file >> ' . strip_tags($video['error']));
                    redirect(ADMIN . '/resources/manage/' . $this->uri->segment(4), 'refresh');
                    exit;
                }
            }
            if (($_FILES["file"]["name"] != "")) {
                $form = upload_file(UPLOAD_PATH . "resources/", 'file','file');
                if (!empty($form['file_name'])) {
                    
                    $vals['file'] = $form['file_name'];
                    $this->remove_file($this->uri->segment(4));
                } else {
                    setMsg('error', 'Please upload a valid file >> ' . strip_tags($form['error']));
                    redirect(ADMIN . '/resources/manage/' . $this->uri->segment(4), 'refresh');
                    exit;
                }
            }
            $p_id=$this->resource_model->save($vals, $this->uri->segment(4));
            setMsg('success', 'Data has been saved successfully.');
            redirect(ADMIN . '/resources', 'refresh');
            exit;
        }
        $this->data['row'] = $this->resource_model->get_row_where(array('id' => $this->uri->segment('4')));
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete($id) {
        $id = intval($id);
        if ($row = $this->resource_model->get_row($id)) {
            $this->remove_file($this->uri->segment(4));
            $this->resource_model->delete($this->uri->segment('4'));
            setMsg('success', 'Data has been deleted successfully.');
            redirect(ADMIN . '/resources', 'refresh');
            exit;
        }
        else
            show_404();
    }

    function remove_file($id,$type='image') {
        $arr = $this->resource_model->get_row($id);
        if($type=='video'){
            $filepath = "./" . UPLOAD_PATH . "/resources/" . $arr->video;
            if (is_file($filepath)) {
                unlink($filepath);
            }
        }
        else if($type=='file'){
            $filepath = "./" . UPLOAD_PATH . "/resources/" . $arr->file;
            if (is_file($filepath)) {
                unlink($filepath);
            }
        }
        else{
            $filepath = "./" . UPLOAD_PATH . "/resources/" . $arr->image;
            $filepath_thumb = "./" . UPLOAD_PATH . "/resources/thumb_" . $arr->image;
            if (is_file($filepath)) {
                unlink($filepath);
            }
            if (is_file($filepath_thumb)) {
                unlink($filepath_thumb);
            }
        }
        
        return;
    }
    

}

?>