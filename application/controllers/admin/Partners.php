<?php

class Partners extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->isLogged();
    }

    public function index() {
        // echo 'yes';die();
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/partners';

        $this->data['rows'] = $this->master->getRows('partners');
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }
    function manage() {
        $this->data['enable_editor'] = TRUE;
        $this->data['settings'] = $this->master->getRow('siteadmin');
        $this->data['pageView'] = ADMIN . '/partners';
         if ($this->input->post()) {
            $vals = $this->input->post();
            $content_row = $this->master->getRow('partners', array('id'=>$this->uri->segment(4)));
            if (isset($_FILES["image"]["name"]) && $_FILES["image"]["name"] != "") {
                $image1 = upload_file(UPLOAD_PATH . "partners/", 'image');
                //  generate_thumb(UPLOAD_PATH . "partners/", UPLOAD_PATH . "partners/", $image1['file_name'], 210, 'thumb_');
                $vals['image']=$image1['file_name'];
                generate_thumb(UPLOAD_PATH . "partners/", UPLOAD_PATH . "partners/", $vals['image'], 210, 'thumb_');
                
                //$vals['image'] = $image1['file_name'];
            }
            else{
                $vals['image']=$content_row->image;
                // generate_thumb(UPLOAD_PATH . "partners/", UPLOAD_PATH . "partners/", $vals['image'], 210, 'thumb_');
            }
            $id=$this->master->save('partners',$vals,'id', $this->uri->segment(4));
            //print_r($id);die;
            if($id>0){
                //print_r($count_title);die;
                setMsg('success', 'Data has been saved successfully.');
                redirect(ADMIN . '/partners', 'refresh');
                exit;
            }
        }
        $this->data['row'] = $this->master->getRow('partners',array('id'=>$this->uri->segment('4')));
       
        //pr($this->data['recipes']);die;
         $this->load->view(ADMIN . '/includes/siteMaster', $this->data);        
    }
    function delete() {
        $this->master->delete('partners', 'id', $this->uri->segment('4'));
        setMsg('success', 'Delete successfully !');
        redirect(ADMIN . '/partners', 'refresh');
    }
}

?>