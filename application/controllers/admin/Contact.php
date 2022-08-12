<?php

class Contact extends Admin_Controller {

    private $table_name = "contact";

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = 'admin/contact';
        $this->data['rows'] = $this->master->getRows('contact','','','','DESC');;
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }
    function manage() {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = 'admin/contact';
        $arr['status'] = 1;
        $this->master->save($this->table_name, $arr, 'id', $this->uri->segment(4));
        $this->data['row'] = $this->master->getRow($this->table_name, array('id' => $this->uri->segment(4)));
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete() {
        $this->master->delete($this->table_name, 'id', $this->uri->segment('4'));
        setMsg('success', 'Delete successfully !');
        redirect(ADMIN . '/contact', 'refresh');
    }

}

?>