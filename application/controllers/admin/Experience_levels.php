<?php

class Experience_levels extends Admin_Controller
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
        $this->data['pageView'] = ADMIN . '/experience_levels';

        $this->data['rows'] = $this->master->getRows('job_experience_levels', array(), '', '', 'desc', '');
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/experience_levels';
        if ($this->input->post()) {
            $vals = $this->input->post();

            $this->master->save('job_experience_levels', $vals, 'id', $this->uri->segment(4));
            setMsg('success', 'Job Experience Level has been saved successfully.');
            if(empty(intval($this->uri->segment(4)))){
                redirect(ADMIN . '/experience_levels', 'refresh');
                exit;
            }
        }

        $this->data['row'] = $this->master->getRow('job_experience_levels', array('id' => $this->uri->segment('4')));
        $this->data['page_title'] = $this->data['row'] ? "Edit Job Experience Level" : "Add New Job Experience Level";
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete()
    {
        $this->master->delete('job_experience_levels', 'id', $this->uri->segment(4));
        setMsg('success', 'Job Experience Level has been deleted successfully.');
        redirect(ADMIN . '/experience_levels', 'refresh');
    }

}

?>