<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isLogged();
        $this->load->model('Admin', 'admin');
    }

    function index()
    {
        $this->data['enable_editor'] = TRUE;
        has_access();
        if ($vals = $this->input->post()) {
            
            if (($_FILES["logo_image"]["name"] != "")) {
                $image = upload_file(UPLOAD_PATH . "images/", 'logo_image', 'image', toSlugUrl($vals['site_name']).'-logo');
                // pr($image);
                if (!empty($image['file_name'])) {
                    if (!empty($this->data['adminsite_setting']->site_logo))
                        $this->remove_file($this->data['adminsite_setting']->site_logo);
                    $vals['site_logo'] = $image['file_name'];
                } else {
                    setMsg('errorMsg', 'Please upload a valid logo image file >> ' . strip_tags($image['error']));
                    redirect(ADMIN . '/settings', 'refresh');
                    exit;
                }
            }
            if (($_FILES["footer_logo_image"]["name"] != "")) {
                $footer = upload_file(UPLOAD_PATH . "images/", 'footer_logo_image', 'image', toSlugUrl($vals['site_name']).'-footer-logo');
                if (!empty($footer['file_name'])) {
                    if (!empty($this->data['adminsite_setting']->site_footer_logo))
                        $this->remove_file($this->data['adminsite_setting']->site_footer_logo);
                    $vals['site_footer_logo'] = $footer['file_name'];
                } else {
                    setMsg('errorMsg', 'Please upload a valid logo image file >> ' . strip_tags($footer['error']));
                    redirect(ADMIN . '/settings', 'refresh');
                    exit;
                }
            }
            
            if (($_FILES["footer_background"]["name"] != "")) {
                $footer = upload_file(UPLOAD_PATH . "images/", 'footer_background', 'image', toSlugUrl($vals['site_name']).'-footer-bg');
                if (!empty($footer['file_name'])) {
                    generate_thumb(UPLOAD_PATH . "images/", UPLOAD_PATH . "images/", $footer['file_name'], 1920, 'thumb_');
                    if (!empty($this->data['adminsite_setting']->footer_background))
                        $this->remove_file($this->data['adminsite_setting']->footer_background);
                    $vals['footer_background'] = $footer['file_name'];
                } else {
                    setMsg('errorMsg', 'Please upload a valid logo image file >> ' . strip_tags($footer['error']));
                    redirect(ADMIN . '/settings', 'refresh');
                    exit;
                }
            }

            if (($_FILES["icon_image"]["name"] != "")) {
                $icon = upload_file(UPLOAD_PATH . "images/", 'icon_image','image',toSlugUrl($vals['site_name']).'-icon');
                // pr($icon);
                if (!empty($icon['file_name'])) {
                    if (!empty($this->data['adminsite_setting']->site_icon))
                        $this->remove_file($this->data['adminsite_setting']->site_icon);
                    $vals['site_icon'] = $icon['file_name'];
                } else {
                    setMsg('errorMsg', 'Please upload a valid icon image file >> ' . strip_tags($icon['error']));
                    redirect(ADMIN . '/settings', 'refresh');
                    exit;
                }
            }

            if (($_FILES["thumb_image"]["name"] != "")) {
                $thumb = upload_file(UPLOAD_PATH . "images/", 'thumb_image','image',toSlugUrl($vals['site_name']).'-thumb');
                // pr($image);
                if (!empty($thumb['file_name'])) {
                    if (!empty($this->data['adminsite_setting']->site_thumb))
                        $this->remove_file($this->data['adminsite_setting']->site_thumb);
                    $vals['site_thumb'] = $thumb['file_name'];
                } else {
                    setMsg('errorMsg', 'Please upload a valid thumb image file >> ' . strip_tags($thumb['error']));
                    redirect(ADMIN . '/settings', 'refresh');
                    exit;
                }
            }
            $this->admin->saveSettings($vals);
            setMsg("success", "Site Settings have been Changed");
            redirect(ADMIN . "/settings");
            exit;
        }else{
            $this->data['pageView'] = ADMIN . "/site_setting";
            $this->load->view(ADMIN . "/includes/siteMaster", $this->data);
        }
    }

    function clear_cashe()
    {
        has_access();
        $this->admin->saveSettings(array('site_version'=>rand(1, 100)));
        setMsg("success", "Successfully Cashe Cleared!");
        redirect(ADMIN . "/settings");
        exit;
    }

    function change()
    {
        $this->data['adminsite_setting']->page_title = 'Change Password';
        $this->load->view(ADMIN . '/admin_change', $this->data);
    }
    
    function pass()
    {
        if ($data = $this->input->post()) {
            $row = $this->admin->authenticate($this->session->loged_in['name'], $data['opwd']);
            if ($row) {
                $this->admin->save(array('site_password' => md5($data['npwd'])),$this->session->loged_in['id']);
                // $this->admin->saveSettings(array('site_password' => md5($data['npwd'])));
                $res['login_status'] = "success";
                $res['redirect_url'] = site_url(ADMIN . '/dashboard');
            } else {
                $res['login_status'] = "invalid";
                $res['invalid_respnse'] = "Old Password Does not Match";
            }
            echo json_encode($res);
        }
    }

    function remove_file($file_name)
    {

        $filepath = UPLOAD_PATH . "/images/" . $file_name;
        if (is_file($filepath))
            unlink($filepath);
        return;
    }

}

?>