<?php
class Index extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('page_model');
    }

    function index()
    {
        $this->data['content_row'] = $this->master->getRow('sitecontent', array('ckey' => 'home'));
        $this->data['site_content'] = unserialize($this->data['content_row']->code);
        $this->data['videos'] = getMultiText('home-sec-6');
        $this->data['pageView']='index';
        $this->data['footer']=true;
        $this->load->view("includes/site-master", $this->data);
    }
    
}

?>