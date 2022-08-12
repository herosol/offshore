<?php

class Section extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->isLogged();
        $this->load->model('page_model');
    }

    public function index() {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/section';
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }


}

?>