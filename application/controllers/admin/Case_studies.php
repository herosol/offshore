<?php

class Case_studies extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isLogged();
        $this->load->model('case_model');
    }

    function index()
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/case_studies';

        $this->data['rows'] = $this->case_model->get_rows(array(),'','','asc','order_no');
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/case_studies';
        if ($this->input->post()) {
            $vals = $this->input->post();
            if (($_FILES["image"]["name"] != "")) {
                $this->remove_file($this->uri->segment(4));
                $image = upload_image(UPLOAD_PATH . "case_studies/", 'image');
                if (!empty($image['file_name'])) {
                    $vals['image'] = $image['file_name'];
                    generate_thumb(UPLOAD_PATH . "case_studies/", UPLOAD_PATH . "case_studies/", $image['file_name'],1300,'thumb_');
                } else {
                    setMsg('errorMsg', 'Please upload a valid image file >> ' . strip_tags($image['error']));
                    redirect(ADMIN . '/case_studies/manage/' . $this->uri->segment(4), 'refresh');
                    exit;
                }
            }
            if (isset($_FILES["video_code"]["name"]) && $_FILES["video_code"]["name"] != "") {
                $video_code = upload_file(UPLOAD_PATH.'case_studies/', 'video_code','video');
                // pr($video_code);
                if(!empty($video_code['file_name'])){
                    
                    $vals['video_code'] = $video_code['file_name'];
                    $this->remove_file($this->uri->segment(4),'video');
                    
                }
                else{
                    setMsg('errorMsg', 'Please upload a valid video file >> ' . strip_tags($video_code['error']));
                    redirect(ADMIN . '/resources/manage/' . $this->uri->segment(4), 'refresh');
                    exit;
                }
            }
            if ($this->uri->segment(4) == '') {
                $vals['order_no'] = nextOrder('tbl_case_studies');
            }
            $p_id=$this->case_model->save($vals, $this->uri->segment(4));
            if($p_id > 0){
                if (isset($_FILES["upload_file"]["name"]) && count($_FILES["upload_file"]["name"]) > 0) {
                    upload_product_images('./uploads/case_studies/', $_FILES, 'upload_file', $p_id,'case','case_images');
                    
                }
            }
            setMsg('success', 'Data has been saved successfully.');
            redirect(ADMIN . '/case_studies', 'refresh');
            exit;
        }
        $this->data['row'] = $this->case_model->get_row_where(array('id' => $this->uri->segment('4')));
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }
    function orderAll(){
        $rows = $this->case_model->get_rows(array());
        
        foreach ($rows as $row){
            if(isset($_POST["orderid".$row->id])) {    
                $vals['order_no'] = $_POST["orderid".$row->id];
                // $this->master->save('case_studies', $vals, 'id', $row->id);
                $this->case_model->save($vals, $row->id);
            }   
        }
        setMsg('success', 'updated successfully !');
        redirect(base_url() . ADMIN . '/case_studies');
    }
    function delete($id) {
        $id = intval($id);
        if ($row = $this->case_model->get_row($id)) {
            $this->case_model->delete($this->uri->segment('4'));
            $this->remove_file($this->uri->segment(4));
            setMsg('success', 'Data has been deleted successfully.');
            redirect(ADMIN . '/case_studies', 'refresh');
            exit;
        }
        else
            show_404();
    }

    function remove_file($id,$type="image") {
        $arr = $this->case_model->get_row($id);
        if($type=='video'){
            $filepath = "./" . UPLOAD_PATH . "/case_studies/" . $arr->video_code;
            if (is_file($filepath)) {
                unlink($filepath);
            }
        }
        else{
            $filepath = "./" . UPLOAD_PATH . "/case_studies/" . $arr->image;
            $filepath_thumb = "./" . UPLOAD_PATH . "/case_studies/thumb_" . $arr->image;
            if (is_file($filepath)) {
                unlink($filepath);
            }
            if (is_file($filepath_thumb)) {
                unlink($filepath_thumb);
            } 
        }
        
        return;
    }
    function delete_image(){
        if($this->input->post()){
            $vals=$this->input->post();
            
            $row=$this->master->getRow("case_images",array("c_id"=>$vals['p_id'],'id'=>$vals['id']));
            if($row){
                $filepath = "./" . UPLOAD_PATH . "/case_studies/" . $row->image;
                $filepath_thumb = "./" . UPLOAD_PATH . "/case_studies/thumb_" . $row->image;
                if (is_file($filepath)) {
                    unlink($filepath);
                }
                if (is_file($filepath_thumb)) {
                    unlink($filepath_thumb);
                }
                $this->master->delete("case_images",'id',$row->id);
                exit(json_encode(array("status"=>1)));
            }
        }
    }
    

}

?>