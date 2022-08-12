<?php

class Hocl extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isLogged();
        $this->load->model('hocl_model');
    }

    function index()
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/hocl';

        $this->data['rows'] = $this->hocl_model->get_rows(array());
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/hocl';
        if ($this->input->post()) {
            $vals = $this->input->post();
            if (($_FILES["image"]["name"] != "")) {
                $this->remove_file($this->uri->segment(4));
                $image = upload_image(UPLOAD_PATH . "hocl/", 'image');
                if (!empty($image['file_name'])) {
                    $vals['image'] = $image['file_name'];
                    generate_thumb(UPLOAD_PATH . "hocl/", UPLOAD_PATH . "hocl/", $image['file_name'],800,'thumb_');
                } else {
                    setMsg('errorMsg', 'Please upload a valid image file >> ' . strip_tags($image['error']));
                    redirect(ADMIN . '/hocl/manage/' . $this->uri->segment(4), 'refresh');
                    exit;
                }
            }
            $p_id=$this->hocl_model->save($vals, $this->uri->segment(4));
            setMsg('success', 'Data has been saved successfully.');
            redirect(ADMIN . '/hocl', 'refresh');
            exit;
        }
        $this->data['row'] = $this->hocl_model->get_row_where(array('id' => $this->uri->segment('4')));
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete($id) {
        $id = intval($id);
        if ($row = $this->hocl_model->get_row($id)) {
            $this->remove_file($this->uri->segment(4));
            $this->hocl_model->delete($this->uri->segment('4'));
            setMsg('success', 'Data has been deleted successfully.');
            redirect(ADMIN . '/hocl', 'refresh');
            exit;
        }
        else
            show_404();
    }

    function remove_file($id) {
        $arr = $this->hocl_model->get_row($id);

        $filepath = "./" . UPLOAD_PATH . "/hocl/" . $arr->image;
        $filepath_thumb = "./" . UPLOAD_PATH . "/hocl/thumb_" . $arr->image;
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