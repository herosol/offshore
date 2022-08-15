<?php

$CI = & get_instance();

function format_name($fname,$lname)
{
    return ucwords($fname.' '.$lname);
    // return ucwords($fname.' '.substr($lname, 0,1).'.');
}
function get_cat_name($id)
{
    global $CI;
    $row = $CI->master->getRow('categories', array('id' => $id));
    if(!empty($row)){
        return $row->title;
    }
    else{
        return '---';
    }
    
}
function nextOrder($table) {    
    $CI = get_instance();    
    $ary = $CI->db->query('SELECT max(order_no) as orderid FROM '.$table)->result_array();    
    return intval($ary[0]['orderid']) + 1;
}
function get_job_cat($id)
{
    global $CI;
    $CI = get_instance();
    $row = $CI->master->getRow('job_categories', array('id' => $id));
    return ($row->title);
}
function get_prac_area($id)
{
    global $CI;
    $CI = get_instance();
    $row = $CI->master->getRow('job_practice_area', array('id' => $id));
    return ($row->title);
}
function get_experience_level($id)
{
    global $CI;
    $CI = get_instance();
    $row = $CI->master->getRow('job_experience_levels', array('id' => $id));
    return ($row->title);
}
function getTotalRatings($p_id)
{
    $CI = get_instance();
    $CI->db->select("AVG(pr.ratings) as total");
    $CI->db->from("product_reviews pr");
    $CI->db->join("products p", "p.id=pr.p_id");
    $CI->db->where('p.status',1);
    $CI->db->where('pr.p_id',$p_id);
    $row= $CI->db->get()->row();
    return round($row->total);
}
function total_rows($table)
{
    $CI = get_instance();
    $CI->db->select("count(*) as total");
    $CI->db->from($table);
    
    $CI->db->where('status',0);
    $row= $CI->db->get()->row();
    if(intval($row->total) > 0){
        return '<span class="miniLbl red">'.intval($row->total).'</span>';
    }
}
function saveAnyPic($path, $pic_name, $pic_type, $pic_tmp, $pic_error, $pic_size, $fieldname){
    $CI = get_instance();
    $_FILES[$fieldname]['name'] = $pic_name;
    $_FILES[$fieldname]['type'] = $pic_type;
    $_FILES[$fieldname]['tmp_name'] = $pic_tmp;
    $_FILES[$fieldname]['error'] = $pic_error;
    $_FILES[$fieldname]['size'] = $pic_size;
    $config['upload_path'] = $path;
    $config['allowed_types'] = 'jpg|png|jpeg|gif|svg';
    $config['max_size'] = 2100000;
    $stamp = time() . '_' . rand(1111, 9999);
    $file_name = "image_" . $stamp;
    $config['file_name'] = $file_name;
    $CI->load->library('upload', $config);
    if ($CI->upload->do_upload($fieldname)) {
        return $CI->upload->data();
    }
}
function saveMultiMediaFieldsImgs($path, $files, $fieldname, $section, $pics, $cont,$site_lang,$thumb_size='') {
    //pr($cont);
    extract($cont);
    $CI = get_instance();
    $cpt = count($files['name']);
    for ($i = 0; $i < $cpt; $i++) {
        if ($files['name'][$i] != '') {
            $img = saveAnyPic($path, $files['name'][$i], $files['type'][$i], $files['tmp_name'][$i], $files['error'][$i], $files['size'][$i], $fieldname);
            $image = $CI->upload->data();
            if(!empty($thumb_size)){
                generate_thumb($path, $path, $img['file_name'], $thumb_size, 'thumb_');
            }
            $arr['site_lang'] = $site_lang;
            $arr['section'] = $section;
            $arr['title'] = ($cont['title'][$i] != '') ? $cont['title'][$i] : '';
            $arr['detail'] = ($cont['detail'][$i] != '') ? $cont['detail'][$i] : '';
            $arr['txt1'] = ($cont['txt1'][$i] != '') ? $cont['txt1'][$i] : '';
            $arr['txt2'] = ($cont['txt2'][$i] != '') ? $cont['txt2'][$i] : '';
            $arr['txt3'] = ($cont['txt3'][$i] != '') ? $cont['txt3'][$i] : '';
            $arr['txt4'] = ($cont['txt4'][$i] != '') ? $cont['txt4'][$i] : '';
            $arr['txt5'] = ($cont['txt5'][$i] != '') ? $cont['txt5'][$i] : '';
            $arr['image'] = ($img['file_name'] != '') ? $img['file_name'] : '';
            $arr['order_no'] = ($cont['order_no'][$i] != '') ? $cont['order_no'][$i] : '';
            $CI->db->set($arr);
            $CI->db->insert('multi_text');
        }else{
            if ($pics[$i] != '') {
                $arr['site_lang'] = $site_lang;
                $arr['section'] = $section;
                $arr['title'] = ($cont['title'][$i] != '') ? $cont['title'][$i] : '';
                $arr['detail'] = ($cont['detail'][$i] != '') ? $cont['detail'][$i] : '';
                $arr['txt1'] = ($cont['txt1'][$i] != '') ? $cont['txt1'][$i] : '';
                $arr['txt2'] = ($cont['txt2'][$i] != '') ? $cont['txt2'][$i] : '';
                $arr['txt3'] = ($cont['txt3'][$i] != '') ? $cont['txt3'][$i] : '';
                $arr['txt4'] = ($cont['txt4'][$i] != '') ? $cont['txt4'][$i] : '';
                $arr['txt5'] = ($cont['txt5'][$i] != '') ? $cont['txt5'][$i] : '';
                $arr['image'] = $pics[$i];
                $arr['order_no'] = ($cont['order_no'][$i] != '') ? $cont['order_no'][$i] : '';
                $CI->db->set($arr);
                $CI->db->insert('multi_text');
            }
            
        }
    }
    return $success;
}

function productFeatureImage($id) {
    $CI = get_instance();
    $CI->db->where('p_id', $id);
    // $CI->db->where('featured', '1');
    $CI->db->order_by('id', 'ASC');
    $query = $CI->db->get('product_images')->row();
    
    return $query->image;
}
function productTitle($id) {
    $CI = get_instance();
    $CI->db->where('id', $id);
    $query = $CI->db->get('products');
    return $query->row()->title;
}
function productImage($id) {
    $CI = get_instance();
    $CI->db->where('id', $id);
    $query = $CI->db->get('products');
    return $query->row()->image;
}
function count_inactive_members($type='')
{
    $CI = get_instance();
    $CI->db->select('count(*) as total');
    if(!empty($type)){
       $CI->db->where('mem_type', $type); 
    }
    $CI->db->where('mem_verified',0 ); 
    $query = $CI->db->get('members');
    $total = $query->row()->total;
    // pr($CI->db->last_query());
    if(intval($total) > 0){
        return '<span class="badge badge-danger">'.intval($total).'</span>';
    }
}
function count_new_bookings($status)
{
    $CI = get_instance();
    $CI->db->select('count(*) as total');
    $CI->db->where($status ); 
    $query = $CI->db->get('bookings');
    $total = $query->row()->total;
    // pr($CI->db->last_query());
    if(intval($total) > 0){
        return '<span class="badge badge-danger">'.intval($total).'</span>';
    }
}
function count_new_booking_charge()
{
    $CI = get_instance();
    $CI->db->select('count(*) as total');
    $CI->db->where('status','pending' ); 
    $query = $CI->db->get('booking_charge');
    $total = $query->row()->total;
    // pr($CI->db->last_query());
    if(intval($total) > 0){
        return '<span class="badge badge-danger">'.intval($total).'</span>';
    }
}
function get_booking_row($id){
    $CI = get_instance();
    $CI->db->where('id', $id);
    $query = $CI->db->get('bookings');
    return $query->row();
}
function count_pending_withdrawal_requests()
{
    $CI = get_instance();
    $CI->db->select('count(*) as total');
    $CI->db->where('status', 'pending');
    $query = $CI->db->get('earnings');
    $total = $query->row()->total;
    if(intval($total) > 0){
        return '<span class="badge badge-danger">'.intval($total).'</span>';
    }
    
}
function getMemTotalEarnings($mem_id,$type){
    $CI = get_instance();
    $CI->db->select("SUM(price) as total");
    $CI->db->where('type', $type);
    $CI->db->where('mem_id', $mem_id);
    $CI->db->where('status', 'pending');
    $query = $CI->db->get('earnings');
    return $query->row()->total;
}
function count_owner_bookings($mem_id)
{
    $CI = get_instance();
    $CI->db->select('count(*) as total');
    $CI->db->from("bookings b");
    $CI->db->join("vehicles v", "v.id=b.v_id");
    $CI->db->where('v.mem_id', $mem_id);
    $CI->db->where('b.booking_status','complete' ); 
    $query = $CI->db->get();
    $total = $query->row()->total;
    return $total;
}
function count_vehicle_bookings($v_id)
{
    $CI = get_instance();
    $CI->db->select('count(*) as total');
    $CI->db->from("bookings b");
    $CI->db->join("vehicles v", "v.id=b.v_id");
    $CI->db->where('v.id',$v_id);
    $CI->db->where('b.booking_status','complete' ); 
    $query = $CI->db->get();
    $total = $query->row()->total;
    return $total;
}
function getVehicleRatings($v_id)
{
    $CI = get_instance();
    $CI->db->select("AVG(b_c.ratings) as total");
    $CI->db->from("booking_comments b_c");
    $CI->db->join("bookings b", "b.id=b_c.booking_id");
    $CI->db->join("vehicles v", "v.id=b.v_id");
    $CI->db->where('v.id',$v_id);
    // $CI->db->where('mem.mem_id',$mem_id);
    $row= $CI->db->get()->row();
    // pr($CI->db->last_query());
    return number_format($row->total, 1, '.', '');
}
function getFooter(){
    $CI = get_instance();
    $row = $CI->master->getRow('sitecontent', array('ckey' => 'footer-content'));
    return unserialize($row->code);
}
function getVehicleComments($v_id)
{
    $CI = get_instance();
    $CI->db->select("b_c.*");
    $CI->db->from("booking_comments b_c");
    $CI->db->join("bookings b", "b.id=b_c.booking_id");
    $CI->db->join("vehicles v", "v.id=b.v_id");
    $CI->db->where('v.id',$v_id);
    // $CI->db->where('mem.mem_id',$mem_id);
    $rows= $CI->db->get()->result();
    // pr($CI->db->last_query());
    return $rows;
}
function vehicleColors()
{
    $CI = get_instance();
    $CI->db->select('color');
    $CI->db->from("vehicles");
    $CI->db->where('status','active' ); 
    $query = $CI->db->get();
    $total = $query->result();
    return $total;
}
function vehiclesMaxPrice()
{
    $CI = get_instance();
    $CI->db->select('MAX(price)');
    $CI->db->from("vehicles");
    $CI->db->where('status','active' ); 
    $query = $CI->db->get();
    $total = $query->row()->total;
    return $total;
}
function vehicle_favorite($v_id) {
    $CI = get_instance();
        if ($CI->session->userdata('hazel_mem_id') > 0){
            $CI->db->where('mem_id', $CI->session->userdata('hazel_mem_id'));
        }
        else if ($CI->session->userdata('new_mem_id') > 0){
            $CI->db->where('mem_id', $CI->session->userdata('new_mem_id'));
        }else{
            $CI->db->where('user_ip', getUserIpAddr());
        }
        $CI->db->where('v_id' , $v_id);

        $query = $CI->db->get("favorites");

        if(!empty($query->row())){
            $status="liked like_btn";
        }
        else{
            $status="like_btn";
        }
        return $status;
}
function member_favorite() {
    $CI = get_instance();
        if ($CI->session->userdata('hazel_mem_id') > 0){
            $CI->db->where('mem_id', $CI->session->userdata('hazel_mem_id'));
        }
        else if ($CI->session->userdata('new_mem_id') > 0){
            $CI->db->where('mem_id', $CI->session->userdata('new_mem_id'));
        }else{
            $CI->db->where('user_ip', getUserIpAddr());
        }

        $query = $CI->db->get("favorites");

        
        return $query->result();
}
function productPrice($id) {
    $CI = get_instance();
    $CI->db->where('id', $id);
    $query = $CI->db->get('products');
    return $query->row()->price;
}
function get_vehicle_name($id) {
    $CI = get_instance();
    $CI->db->where('id', $id);
    $query = $CI->db->get('vehicles');
    return $query->row()->title;
}
function get_vehicle_image($id) {
    $CI = get_instance();
    $CI->db->where('id', $id);
    $query = $CI->db->get('vehicles');
    return $query->row()->image;
}
function get_vehicle($id) {
    $CI = get_instance();
    $CI->db->where('id', $id);
    $query = $CI->db->get('vehicles');
    return $query->row();
}
function getProduct($id) {
    $CI = get_instance();
    $CI->db->where('id', $id);
    $query = $CI->db->get('products');
    return $query->row();
}
function getVehiclePictures($id) {
    $CI = get_instance();
    $CI->db->where('v_id', $id);
    $query = $CI->db->get('vehicle_images');
    return $query->result();
}
function get_vehicle_certificates($id) {
    $CI = get_instance();
    $CI->db->where('v_id', $id);
    $query = $CI->db->get('vehicle_certificates');
    return $query->result();
}
function get_vehicle_requirements() {
    $CI = get_instance();
    $CI->db->where('status', 1);
    $query = $CI->db->get('vehicle_requirements');
    return $query->result();
}
function get_vehicle_requirements_array($v_id) {
    $CI = get_instance();
    $CI->db->where('v_id', $v_id);
    $query = $CI->db->get('vehicle_reqs');
    return $query->result();
}
function get_vehicle_requirement_heading($id) {
    $CI = get_instance();
    $CI->db->where('id', $id);
    $query = $CI->db->get('vehicle_requirements');
    $row= $query->row();
    return $row->title;
}
function vimeo_youtube($video){
    if (strpos($video, 'vimeo') !== false) {
        $v=$video;
        $v_type="vimeo";
    }
    else {
        $v=$video;
        $v_type="youtube";
    }
    $str = substr(strrchr($v, '/'), 1);
    return array('code'=>$str,'type'=>$v_type);
}
function getProperties($limit) {
    $CI = get_instance();
    if(!empty($limit)){
        $CI->db->limit($limit);
    }
    $query = $CI->db->get('properties');
    return $query->result();
}
function getPropertyFeatures($id,$limit="") {
    $CI = get_instance();
    $CI->db->where('p_id', $id);
    if(!empty($limit)){
        $CI->db->limit($limit);
    }
    $query = $CI->db->get('property_features');
    return $query->result();
}
function getSize($id) {
    $CI = get_instance();
    $CI->db->where('p_id', $id);
    $CI->db->order_by('id', 'ASC');
    $query = $CI->db->get('product_sizes');
    return $query->row();
}
function getOrderSize($id) {
    $CI = get_instance();
    $CI->db->where('id', $id);
    $CI->db->order_by('id', 'ASC');
    $query = $CI->db->get('product_sizes');
    return $query->row();
}
function get_rows($table,$where,$order_by='',$field=''){
    $CI = get_instance();
    if(!empty($where)):
        $CI->db->where($where);
    endif;
    if(!empty($order_by) && !empty($field)):
        $CI->db->order_by($field, $order_by);
    endif;
    $CI->db->order_by('id', 'ASC');
    $query = $CI->db->get($table);
    return $query->result();
}
function getPictures($id) {
    $CI = get_instance();
    $CI->db->where('p_id', $id);
    $CI->db->order_by('id', 'ASC');
    $query = $CI->db->get('product_images');
    return $query->result();
}
function getCasePictures($id) {
    $CI = get_instance();
    $CI->db->where('c_id', $id);
    $CI->db->order_by('id', 'ASC');
    $query = $CI->db->get('case_images');
    return $query->result();
}
function getOrderFirstProduct($o_id) {
    $CI = get_instance();
    $CI->db->where('o_id', $o_id);
    $CI->db->order_by('id', 'ASC');
    $query = $CI->db->get('order_items');
    return $query->row();
}
function getFeaturedPicture($type, $id) {
    $CI = get_instance();
    $CI->db->where('featured', 1);
    $CI->db->where('p_id', $id);
    $CI->db->order_by('id', 'ASC');
    $query = $CI->db->get('product_images');
    return $query->row();
}

function setFeaturedPicture($id) {
    $CI = get_instance();
    $CI->db->set(array('featured' => 1));
    $CI->db->where('p_id', $id);
    $CI->db->order_by('id', 'ASC');
    $CI->db->limit(1, 0);
    $query = $CI->db->update('product_images');
}

function changeFeaturedPicture($p_id, $pic_id) {
    $CI = get_instance();
    $CI->db->set(array('featured' => 0));
    $CI->db->where('p_id', $p_id);
    $query1 = $CI->db->update('product_images');

    $CI->db->set(array('featured' => 1));
    $CI->db->where('id', $pic_id);
    $query2 = $CI->db->update('product_images');
}

function deltePicture($pic_id) {
    $CI = get_instance();
    $CI->db->where('id', $pic_id);
    $query = $CI->db->delete('product_images');
}
function upload_product_images($path, $files, $fieldname, $p_id,$type='',$table="") {
    // pr($files[$fieldname]);
    $success = 0;
    $CI = & get_instance();
    $cpt = count($files[$fieldname]['name']);
    for ($i = 0; $i < $cpt; $i++) {
        $_FILES[$fieldname]['name'] = $files[$fieldname]['name'][$i];
        $_FILES[$fieldname]['type'] = $files[$fieldname]['type'][$i];
        $_FILES[$fieldname]['tmp_name'] = $files[$fieldname]['tmp_name'][$i];
        $_FILES[$fieldname]['error'] = $files[$fieldname]['error'][$i];
        $_FILES[$fieldname]['size'] = $files[$fieldname]['size'][$i];

        $config['upload_path'] = $path;
        $config['allowed_types'] = 'jpg|png|jpeg|gif|svg';
        $config['max_size'] = 2100000;
        $stamp = time() . '_' . rand(1111, 9999);
        $file_name = "image_" . $stamp;
        $config['file_name'] = $file_name;

        $CI->load->library('upload', $config);

        if ($CI->upload->do_upload($fieldname)) {
            $image = $CI->upload->data();
            if(!empty($image['file_name'])){
                if($type=='case'){
                    generate_thumb($path,$path, $image['file_name'], 1000, 'thumb_');
                    savePicture('c_id',$p_id, $image['file_name'],$table);
                }
                else{
                    // generate_thumb($path, $path, $image['file_name'], 200, 'thumb_');
                    generate_thumb($path, $path, $image['file_name'], 1000, 'full_');
                    savePicture('p_id',$p_id, $image['file_name'],$table);
                }
                
            }
            
            $success++;
        }
    }
    return $success;
}
function savePicture($field,$p_id, $pic,$table) {
    $vals = array(
        $field => $p_id,
        'image' => $pic,
    );
    $CI = get_instance();
    $CI->db->set($vals);
    $CI->db->insert($table);
}
function saveMultiMediaFields($vals,$section,$site_lang='eng') {
    //pr($vals);
    if (count($vals['title']) > 0) {
        for ($i = 0; $i < count($vals['title']); $i++) {
            $arr['site_lang'] = $site_lang;
            $arr['section'] = $section;
            $arr['title'] = ($vals['title'][$i] != '') ? $vals['title'][$i] : '';
            $arr['detail'] = ($vals['detail'][$i] != '') ? $vals['detail'][$i] : '';
            $arr['txt1'] = ($vals['txt1'][$i] != '') ? $vals['txt1'][$i] : '';
            $arr['txt2'] = ($vals['txt2'][$i] != '') ? $vals['txt2'][$i] : '';
            $arr['txt3'] = ($vals['txt3'][$i] != '') ? $vals['txt3'][$i] : '';
            $arr['txt4'] = ($vals['txt4'][$i] != '') ? $vals['txt4'][$i] : '';
            $arr['txt5'] = ($vals['txt5'][$i] != '') ? $vals['txt5'][$i] : '';
            $arr['order_no'] = ($vals['order_no'][$i] != '') ? $vals['order_no'][$i] : '';
            $CI = get_instance();
            $CI->db->set($arr);
            $CI->db->insert('multi_text');
        }
    } 
}
function saveFeatures($vals,$p_id) {
    // pr($vals);
    if (count($vals['title']) > 0 || count($vals['title_gr']) > 0) {
        for ($i = 0; $i < count($vals['title']); $i++) {
            $arr['p_id'] = $p_id;
            $arr['title_gr'] = ($vals['title_gr'][$i] != '') ? $vals['title_gr'][$i] : '';
            $arr['title'] = ($vals['title'][$i] != '') ? $vals['title'][$i] : '';
            $arr['details'] = ($vals['details'][$i] != '') ? $vals['details'][$i] : '';
            $arr['details_gr'] = ($vals['details_gr'][$i] != '') ? $vals['details_gr'][$i] : '';
            $CI = get_instance();
            $CI->db->set($arr);
            $CI->db->insert('property_features');
        }
    } 
}
function getMultiText($section,$site_lang='eng') {
    $CI = get_instance();
    $CI->db->where('section', $section);
    $CI->db->where('site_lang', $site_lang);
    $CI->db->order_by('order_no', 'ASC');
    $query = $CI->db->get('multi_text');
    return $query->result();
}
function getPrograms() {
    $CI = get_instance();
    $CI->db->order_by('id', 'ASC');
    $query = $CI->db->get('programs');
    return $query->result();
}
function getProgramTitle($id) {
    $CI = get_instance();
    $CI->db->where('id', $id);
    $query = $CI->db->get('programs');
    $row= $query->row();
    return $row->title;
}


function get_mem_row($mem_id)
{
    global $CI;
    $CI = get_instance();
    return $CI->master->getRow('members', array('mem_id' => $mem_id));
}

function get_mem_image($mem_id)
{
    global $CI;
    $CI = get_instance();
    $row = $CI->master->getRow('members', array('mem_id' => $mem_id));
    return $row->mem_image;
}
function get_mem_site_commission($mem_id)
{
    global $CI;
    $CI = get_instance();
    $row = $CI->master->getRow('members', array('mem_id' => $mem_id));
    return $row->site_commission;
}
function get_product_image($p_id)
{
    global $CI;
    $CI = get_instance();
    $row = $CI->master->getRow('products', array('id' => $p_id));
    if(!empty($row->sale_price)){
        return $row->sale_price;
    }
    else{
        return $row->price;
    }
}
function getTotalPayment($mem_id,$status){
    $CI = get_instance();
    $CI->db->select("SUM(amount) as total");
    $CI->db->where('mem_id', $mem_id);
    $CI->db->where('booking_status', $status);
    $CI->db->where('status', 'paid');
    $query = $CI->db->get('bookings');
    $row=$query->row();
    if(!empty($row->total)){
        return $row->total;
    }
    else{
        return 0;
    }
}
function get_mem_name($mem_id)
{
    global $CI;
    $CI = get_instance();
    $row = $CI->master->getRow('members', array('mem_id' => $mem_id));
    return ucwords($row->mem_fname.' '.$row->mem_lname);
}

function get_mem_type($mem_id)
{
    global $CI;
    $CI = get_instance();
    $row = $CI->master->getRow('members', array('mem_id' => $mem_id));
    return $row->mem_type;
}
function get_vehicle_brand_name($id)
{
    global $CI;
    $CI = get_instance();
    $row = $CI->master->getRow('vehicle_brands', array('id' => $id));
    return $row->name;
}
function get_vehicle_model_name($id)
{
    global $CI;
    $CI = get_instance();
    $row = $CI->master->getRow('vehicle_brand_models', array('id' => $id));
    return $row->name;
}


function get_faqs($c_id) {
    global $CI;
    $CI = get_instance();
    $CI->db->where('c_id',$c_id);
    $CI->db->where('status',1);
    $query = $CI->db->get('faqs');
    return $query->result();
}
function get_vehicle_features() {
    global $CI;
    $CI = get_instance();
    
    $CI->db->where('status',1);
    $query = $CI->db->get('vehicle_features');
    return $query->result();
}
function get_vehicle_feature_row($id) {
    global $CI;
    $CI = get_instance();
    $CI->db->where('id',$id);
    $CI->db->where('status',1);
    $query = $CI->db->get('vehicle_features');
    return $query->row();
}
function get_brand_vehicle_feature_row($v_id,$f_id) {
    global $CI;
    $CI = get_instance();
    $CI->db->where('v_id',$v_id);
    $CI->db->where('f_id',$f_id);
    $query = $CI->db->get('veh_features');
    return $query->row();
}
function get_member_vehicle_features($v_id) {
    global $CI;
    $CI = get_instance();
    
    $CI->db->where('v_id',$v_id);
    $query = $CI->db->get('veh_features');
    return $query->result();
}
function get_vehicle_brands($v_id='') {
    global $CI;
    $CI = get_instance();
    if(!empty($v_id)){
        $CI->db->where('id',$v_id);
    }
    
    $CI->db->where('status',1);
    $query = $CI->db->get('vehicle_brands');
    return $query->result();
}
function get_vehicle_brand_models($b_id='') {
    global $CI;
    $CI = get_instance();
    if(!empty($b_id)){
        $CI->db->where('b_id',$b_id);
    }
    
    $CI->db->where('status',1);
    $query = $CI->db->get('vehicle_brand_models');
    return $query->result();
}

function get_category_name($id) {
    global $CI;
    $CI = get_instance();
    $CI->db->where('id',$id);
    $query = $CI->db->get('categories');
    return $query->row()->title;
}

function shorString($url)
{
    if (strlen($url) >= 20) {
        return substr($url, 0, 15) . " ... " . substr($url, -4);
    } else {
        return $url;
    }
}
function url_text($url)
{
    $not_allowed = array(' ', '/', '$', '\'', '"', '.');
    $url = trim(str_replace($not_allowed, '-', strtolower($url)), '-');
    return strlen($url) >= 70 ? substr($url, 0, 70) : $url;
}
function get_bookings_count($date1,$date2){
    global $CI;
    $CI->db->select("*");
    $CI->db->from('bookings');
    $CI->db->where('book_from>=',$date1);
    $CI->db->where('book_to<=',$date2);
    $query = $CI->db->get();
    return $query->num_rows();
}
function count_new_header_notis($mem_id)
{
    global $CI;
    $CI->db->select("count(id) as total");
    $CI->db->where('mem_id', $mem_id);
    $CI->db->where("status", 0);
    $query = $CI->db->get('notify');
    return intval($query->row()->total);
}
function get_notifications($mem_id){
    global $CI;
    $rows=$CI->master->getRows('notify', array('mem_id' => $mem_id,'status'=>0), '', '', 'DESC');
    return $rows;
}

function getSiteText($type, $key, $column = 'value')
{
    global $CI;
    $CI = get_instance();
    $row = $CI->master->getRow('site_texts', array('txt_type' => $type, 'txt_key' => $key));
    $column = 'txt_'.$column;
    return $row->$column;
}

function get_countries_options($type, $selected = '')
{
    global $CI;
    $options = "";
    $rows = $CI->master->getRows("countries", array());
    foreach ($rows as $key => $row) {
        $options.='<option value="'.$row->{$type}.'"'.($selected!='' && ($selected==$row->id || $selected==$row->short_code || $selected==$row->name)?' selected':'').'>'.$row->name.'</option>';
    }
    return $options;
}
function get_member_default_payment_method($mem_id){
    global $CI;
    $payment_method=$CI->master->getRow('payment_methods',array("mem_id"=>$mem_id,'default'=>1));
    if($payment_method->payment_method=='bank'){
        return "<strong>Bank Details: </strong>".$payment_method->bank_name."/". $payment_method->account_number ."/". $payment_method->account_title;
    }
    else if($payment_method->payment_method=='paypal'){
        return "<strong>Paypal Email: </strong>".$payment_method->paypal_email;
    }
    else{
        return 'N/A';
    }
    
}
function get_country_name($key, $type = 'id', $default_text = "N/A")
{
    global $CI;
    $arr = $CI->master->getRow("countries", array($type => $key));
    if ($arr) {
        return $arr->name;
    } else {
        return $default_text;
    }
}


function get_states_options($type, $selected = '', $country_id = NULL)
{
    global $CI;
    $options = "";
    $contition = array();
    if (!is_null($country_id))
        $contition['country_id'] = $country_id;
    $rows = $CI->master->getRows("states", $contition);
    foreach ($rows as $key => $row) {
        $options.='<option value="'.$row->{$type}.'"'.($selected!='' && ($selected==$row->id || $selected==$row->code || $selected==$row->name)?' selected':'').'>'.$row->name.'</option>';
    }
    return $options;
}
function get_state_name($key, $type = 'id', $default_text = "N/A")
{
    global $CI;
    $arr=$CI->master->getRow("states", array($type=>$key));
    if ($arr) {
        return $arr->name;
    } else {
        return $default_text;
    }
}

function get_cities_options($type, $selected = '', $state = NULL)
{
    global $CI;
    $options = "";
    $contition = array();
    if (!is_null($state))
        $contition['state'] = $state;
    $rows = $CI->master->getRows("cities", $contition);
    foreach ($rows as $key => $row) {
        $options.='<option value="'.$row->{$type}.'"'.($selected!='' && ($selected==$row->id || $selected==$row->city)?' selected':'').'>'.$row->city.'</option>';
    }
    return $options;
}

function get_city_name($key, $type = 'id', $default_text = "N/A")
{
    global $CI;
    $arr = $CI->master->getRow("cities", array($type => $key));
    if ($arr) {
        return $arr->city;
    } else {
        return $default_text;
    }
}

function applyHTTP($url) {
    if ((substr($url, 0, 3) == "www")) {
        return $httpUrl = "http://" . $url;
    }
    return $url;
}

function getPref($key, $field) {
    global $CI;
    $CI = get_instance();
    $row = $CI->master->getRow('preferences', array('pref_key' => $key));
    return $row->{$field};
}




?>