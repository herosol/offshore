<?php

class Jobs_enquiries extends Admin_Controller {

    private $table_name = "job_enquiries";

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = 'admin/job_enquiries';
        $this->data['rows'] = $this->master->getRows('job_enquiries','','','','DESC');;
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage() {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = 'admin/job_enquiries';
        $arr['status'] = 1;
        $this->master->save($this->table_name, $arr, 'id', $this->uri->segment(4));
        $this->data['row'] = $this->master->getRow($this->table_name, array('id' => $this->uri->segment(4)));
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete() {
        $this->master->delete($this->table_name, 'id', $this->uri->segment('4'));
        setMsg('success', 'Delete successfully !');
        redirect(ADMIN . '/jobs_enquiries', 'refresh');
    }

}

?>