<?php

class Faq extends Admin_Controller
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
        $this->data['pageView'] = ADMIN . '/faq/index';

        $this->data['rows'] = $this->master->getRows('faqs', array(), '', '', 'acs', 'sort_order');
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }
    function categories()
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/faq/category';

        $this->data['rows'] = $this->master->getRows('faq_categories', array(), '', '', 'DESC', 'id');
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/faq/index';
        if ($this->input->post()) {
            $vals = $this->input->post();

            $this->master->save('faqs', $vals, 'id', $this->uri->segment(4));
            setMsg('success', 'Question has been saved successfully.');
            if(empty(intval($this->uri->segment(4)))){
                redirect(ADMIN . '/faq', 'refresh');
                exit;
            }
        }
        $this->data['cats'] = $this->master->getRows('faq_categories', array(), '', '', 'DESC', 'id');
        $this->data['row'] = $this->master->getRow('faqs', array('id' => $this->uri->segment('4')));
        $this->data['page_title'] = $this->data['row'] ? "Edit Help & Support" : "Add New Help & Support";
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }
    function manage_cat()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/faq/category';
        if ($this->input->post()) {
            $vals = $this->input->post();

            $this->master->save('faq_categories', $vals, 'id', $this->uri->segment(4));
            setMsg('success', 'Category has been saved successfully.');
            if(empty(intval($this->uri->segment(4)))){
                redirect(ADMIN . '/faq/categories', 'refresh');
                exit;
            }
        }

        $this->data['row'] = $this->master->getRow('faq_categories', array('id' => $this->uri->segment('4')));
        $this->data['page_title'] = $this->data['row'] ? "Edit FAQ Category" : "Add New FAQ Category";
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete()
    {
        $this->master->delete('faqs', 'id', $this->uri->segment(4));
        setMsg('success', 'Question has been deleted successfully.');
        redirect(ADMIN . '/faq', 'refresh');
    }
    function delete_cat()
    {
        $this->master->delete('faqs', 'c_id', $this->uri->segment(4));
        $this->master->delete('faq_categories', 'id', $this->uri->segment(4));
        setMsg('success', 'Category has been deleted successfully.');
        redirect(ADMIN . '/faq/categories', 'refresh');
    }

}

?>