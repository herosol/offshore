<?php

class Practice_area extends Admin_Controller
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
        $this->data['pageView'] = ADMIN . '/practice_area';

        $this->data['rows'] = $this->master->getRows('job_practice_area', array(), '', '', 'desc', '');
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/practice_area';
        if ($this->input->post()) {
            $vals = $this->input->post();

            $this->master->save('job_practice_area', $vals, 'id', $this->uri->segment(4));
            setMsg('success', 'Job Practice Area has been saved successfully.');
            if(empty(intval($this->uri->segment(4)))){
                redirect(ADMIN . '/practice_area', 'refresh');
                exit;
            }
        }

        $this->data['row'] = $this->master->getRow('job_practice_area', array('id' => $this->uri->segment('4')));
        $this->data['page_title'] = $this->data['row'] ? "Edit Job Practice Area" : "Add New Job Practice Area";
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete()
    {
        $this->master->delete('job_practice_area', 'id', $this->uri->segment(4));
        setMsg('success', 'Job Practice Area has been deleted successfully.');
        redirect(ADMIN . '/practice_area', 'refresh');
    }

}

?>