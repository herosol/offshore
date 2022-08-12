<?php

class Job_categories extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isLogged();
        has_access(7);
    }

    function index()
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/job_categories';

        $this->data['rows'] = $this->master->getRows('job_categories', array(), '', '', 'acs', '');
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/job_categories';
        if ($this->input->post()) {
            $vals = $this->input->post();

            $this->master->save('job_categories', $vals, 'id', $this->uri->segment(4));
            setMsg('success', 'Job Category has been saved successfully.');
            if(empty(intval($this->uri->segment(4)))){
                redirect(ADMIN . '/job_categories', 'refresh');
                exit;
            }
        }

        $this->data['row'] = $this->master->getRow('job_categories', array('id' => $this->uri->segment('4')));
        $this->data['page_title'] = $this->data['row'] ? "Edit Job Category" : "Add New Job Category";
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete()
    {
        $this->master->delete('job_categories', 'id', $this->uri->segment(4));
        setMsg('success', 'Job Category has been deleted successfully.');
        redirect(ADMIN . '/job_categories', 'refresh');
    }

}

?>