<?php

class Testimonials extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isLogged();
        $this->load->model('testimonial_model');
    }

    function index()
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/testimonials/index';
        $this->data['enable_ratings'] = TRUE;
        $this->data['rows'] = $this->testimonial_model->get_rows(array(),'','','asc','order_no');
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage()
    {
        $this->data['enable_ratings'] = TRUE;
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/testimonials/index';
        if ($this->input->post()) {
            $vals = ($this->input->post());
            if (($_FILES["image"]["name"] != "")) {
                $this->remove_file($this->uri->segment(4));
                $image = upload_image(UPLOAD_PATH . "testimonials/", 'image');
                if (!empty($image['file_name'])) {
                    $vals['image'] = $image['file_name'];
                    generate_thumb(UPLOAD_PATH . "testimonials/", UPLOAD_PATH . "testimonials/", $image['file_name'],150,'thumb_');
                } else {
                    setMsg('errorMsg', 'Please upload a valid logo image file >> ' . strip_tags($image['error']));
                    redirect(ADMIN . '/testimonials/manage/' . $this->uri->segment(4), 'refresh');
                    exit;
                }
            }
            if ($this->uri->segment(4) == '') {
                $vals['order_no'] = nextOrder('tbl_testimonials');
            }
            $this->testimonial_model->save($vals, $this->uri->segment(4));
            setMsg('success', 'Testimonial has been saved successfully.');
            redirect(ADMIN . '/testimonials', 'refresh');
            exit;
        }
        $this->data['row'] = $this->testimonial_model->get_row_where(array('id' => $this->uri->segment('4')));
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }
    function orderAll(){
        $rows = $this->testimonial_model->get_rows(array());
        
        foreach ($rows as $row){
            if(isset($_POST["orderid".$row->id])) {    
                $vals['order_no'] = $_POST["orderid".$row->id];
                // $this->master->save('case_studies', $vals, 'id', $row->id);
                $this->testimonial_model->save($vals, $row->id);
            }   
        }
        setMsg('success', 'updated successfully !');
        redirect(base_url() . ADMIN . '/testimonials');
    }

    function delete($id) {
        $id = intval($id);
        if ($row = $this->testimonial_model->get_row($id)) {
            $this->remove_file($this->uri->segment(4));
            $this->testimonial_model->delete($this->uri->segment('4'));
            setMsg('success', 'Testimonial has been deleted successfully.');
            redirect(ADMIN . '/testimonials', 'refresh');
            exit;
        }
        else
            show_404();
    }

    function remove_file($id) {
        $arr = $this->testimonial_model->get_row($id);

        $filepath = "./" . UPLOAD_PATH . "/testimonials/" . $arr->image;
        $filepath_thumb = "./" . UPLOAD_PATH . "/testimonials/thumb_" . $arr->image;
        if (is_file($filepath)) {
            unlink($filepath);
        }
        if (is_file($filepath_thumb)) {
            unlink($filepath_thumb);
        }
        return;
    }

}

?>