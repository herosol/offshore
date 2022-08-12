<?php

class Dashboard extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isLogged();
    }
    
    public function index()
    {
        $this->data['pageView'] = ADMIN."/dashboard";
        $this->data['dashboard'] = "1";
       
        // $this->data['total_case_studies'] = intval($this->master->num_rows('case_studies'));
        // $this->data['total_messages'] = intval($this->master->num_rows('contact'));
        // $this->data['total_subscribers'] = intval($this->master->num_rows('newsletter'));
        // $this->data['total_products'] = intval($this->master->num_rows('products'));
        // $this->data['total_hocl'] = intval($this->master->num_rows('hocl'));
        // $this->data['total_testimonials'] = intval($this->master->num_rows('testimonials'));

        $this->load->view(ADMIN.'/includes/siteMaster', $this->data);
    }
    
}

?>  