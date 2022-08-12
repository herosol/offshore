<?php

class Products extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isLogged();
        $this->load->model('product_model');
    }

    function index()
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/products';
        $this->data['rows'] = $this->product_model->get_rows(array());
        
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/products';
        if ($this->input->post()) {
            $vals = $this->input->post();
            
            $p_id=$this->product_model->save($vals, $this->uri->segment(4));
            if($p_id > 0){
                if (isset($_FILES["upload_file"]["name"]) && count($_FILES["upload_file"]["name"]) > 0) {
                    upload_product_images('./uploads/products/', $_FILES, 'upload_file', $p_id,'products','product_images');
                    
                }
            }
            setMsg('success', 'Data has been saved successfully.');
            redirect(ADMIN . '/products', 'refresh');
            exit;
        }
        $this->data['row'] = $this->product_model->get_row_where(array('id' => $this->uri->segment('4')));
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete($id) {
        $id = intval($id);
        if ($row = $this->product_model->get_row($id)) {
            $this->product_model->delete($this->uri->segment('4'));
            setMsg('success', 'Data has been deleted successfully.');
            redirect(ADMIN . '/products', 'refresh');
            exit;
        }
        else
            show_404();
    }

    
    function remove_project_image($id) {
        $arr = $this->master->getRow("product_images",array("id"=>$id));

        $filepath = "./" . UPLOAD_PATH . "/products/" . $arr->image;
        $filepath_thumb = "./" . UPLOAD_PATH . "/products/thumb_" . $arr->image;
        if (is_file($filepath)) {
            unlink($filepath);
        }
        if (is_file($filepath_thumb)) {
            unlink($filepath_thumb);
        }
        return;
    }
    
        function delete_image(){
        $vals = $this->input->post();
        // pr($vals);
        if ($vals) {
            $this->remove_project_image($vals['id']);
            $this->master->delete('product_images','id',$vals['id']);
                echo json_encode(array('status'=>1));

            
        }
    }

}

?>