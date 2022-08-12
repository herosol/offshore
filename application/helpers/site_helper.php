<?php

$CI = & get_instance();


//***** PERMISSIONS*******///
function has_access($permission_id = 0)
{
    $CI = get_instance();
    if(is_admin())
        return true;
    if(!in_array($permission_id, $CI->session->permissions)){
    // if($permission_id>0 && !is_admin() && !in_array($permission_id,$CI->session->userdata('permissions'))){
        show_404();
        exit;
    }
    return $CI->session->loged_in['id'];
}

function access($permission_id)
{
    $CI = get_instance();
    if(is_admin()) return true;
    return in_array($permission_id, $CI->session->permissions);
}

function is_admin()
{
    $CI = get_instance();
    return $CI->session->loged_in['admin_type']=='admin' ? true : false;
}

function has_permissions($permission_id, $id = 0)
{
    $CI = get_instance();
    if($id<1)
        $id=$CI->session->loged_in['id'];
    return $CI->master->getRow('permissions_admin', array('permission_id' => $permission_id, 'admin_id' => $id));
}


//***** end PERMISSIONS*******///


?>