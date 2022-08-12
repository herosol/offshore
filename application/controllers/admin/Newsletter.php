<?php

class Newsletter extends Admin_Controller
{
    private $table_name = "newsletter";
    public function __construct()
    {
        parent::__construct();
        $this->isLogged();
        has_access(20);
    }

    public function index()
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/newsletter';
        
        $this->data['rows'] = $this->master->getRows('newsletter');
        foreach($this->data['rows'] as $row){
            if($row->status==0){
                $arr['status'] = 1;
                $this->master->save($this->table_name, $arr, 'id', $row->id);
            }
        }
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }
    
    function delete()
    {
        $this->master->delete('newsletter', 'id', $this->uri->segment('4'));
        setMsg('success', 'Eamil has been deleted successfully.');
        redirect(ADMIN . '/newsletter', 'refresh');
        exit;
    }

    function csv_export()
    {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=newsletter-'.date('Y-m-d').'-'.toSlugUrl($this->data['adminsite_setting']->site_name).'.csv');

        $output = fopen('php://output', 'w');

        fputcsv($output, array('Sr.', 'Name','Email'));

        $rows = $this->master->getRows('newsletter');

        foreach ($rows as $key => $row) {
            $arr = array($key+1, $row->fname." ".$row->lname,$row->email);
            fputcsv($output, $arr);
        }
        fclose($output);
        exit;
    }

}

?>