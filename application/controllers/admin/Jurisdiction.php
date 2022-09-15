<?php

class Jurisdiction extends Admin_Controller
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
        $this->data['pageView'] = ADMIN . '/jurisdiction';

        $this->data['rows'] = $this->master->getRows('job_jurisdiction', array(), '', '', 'acs', '');
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/jurisdiction';
        if ($this->input->post()) {
            $vals = $this->input->post();

            $this->master->save('job_jurisdiction', $vals, 'id', $this->uri->segment(4));
            setMsg('success', 'Job Jurisdiction has been saved successfully.');
            if(empty(intval($this->uri->segment(4)))){
                redirect(ADMIN . '/jurisdiction', 'refresh');
                exit;
            }
        }

        $this->data['row'] = $this->master->getRow('job_jurisdiction', array('id' => $this->uri->segment('4')));
        $this->data['page_title'] = $this->data['row'] ? "Edit Job Jurisdiction" : "Add New Job Jurisdiction";
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete()
    {
        $this->master->delete('job_jurisdiction', 'id', $this->uri->segment(4));
        setMsg('success', 'Job Jurisdiction has been deleted successfully.');
        redirect(ADMIN . '/jurisdiction', 'refresh');
    }

}

?>