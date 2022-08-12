<?= showMsg(); ?>
<?= getBredcrum(ADMIN, array('#' => 'Site Settings')); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <!-- <h2 class="no-margin"><i class="entypo-window"></i> Update <strong>About Page</strong></h2> -->
        <h2 class="no-margin"><i class="fa fa-cogs"></i> Site <strong>Settings</strong></h2>
    </div>
    <div class="col-md-6 text-right">
        <a href="<?= site_url(ADMIN . '/settings/clear-cashe'); ?>" class="btn btn-lg btn-primary"><i class="fa fa-refresh"></i> Clear Cache</a>
    </div>
</div>
<hr>
<div class="row col-md-12">
    <form role="form" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
        <div class="col-md-6">
        <h3><i class="fa fa-bars"></i> Contact Detail</h3>
            <hr class="hr-short">
             <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label"> Site Email <span class="symbol required"></span></label>
                    <input type="text" name="site_email" value="<?php if (isset($adminsite_setting->site_email)) echo $adminsite_setting->site_email; ?>" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label"> Site Email for receiving emails <span class="symbol required"></span></label>
                    <input type="text" name="site_email_send" value="<?php if (isset($adminsite_setting->site_email_send)) echo $adminsite_setting->site_email_send; ?>" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label"> Site No-Reply Email <span class="symbol required"></span></label>
                    <input type="text" name="site_noreply_email" value="<?php if (isset($adminsite_setting->site_noreply_email)) echo $adminsite_setting->site_noreply_email; ?>" class="form-control" required>
                </div>
            </div>
            
            <div class="form-group hidden">
                <div class="col-md-12">
                    <label class="control-label"> Site Phone <span class="symbol required"></span></label>
                    <input type="text" name="site_phone" value="<?php if (isset($adminsite_setting->site_phone)) echo $adminsite_setting->site_phone; ?>"  class="form-control" required>
                </div>
            </div>
            <div class="form-group hidden">
                <div class="col-md-12">
                    <label class="control-label"> Address  <span class="symbol required"></span></label>
                    <textarea rows="5" name="site_address" class="form-control"><?php if (isset($adminsite_setting->site_address)) echo ($adminsite_setting->site_address); ?></textarea>
                </div>
            </div>
            <!-- <h3><i class="fa fa-bars"></i> Header Notification</h3>
            <hr class="hr-short">
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label">  Text</label>
                    <textarea rows="5" name="site_header_notification" class="form-control"><?php if (isset($adminsite_setting->site_header_notification)) echo ($adminsite_setting->site_header_notification); ?></textarea>
                </div>
            </div> -->
            <!-- <h3><i class="fa fa-bars"></i> Default Meta</h3> -->
            <!-- <hr class="hr-short"> -->
            <!-- <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label"> Meta Description <span class="symbol required"></span></label>
                    <textarea rows="5" name="site_meta_desc" class="form-control" required autofocus=""><?php if (isset($adminsite_setting->site_meta_desc)) echo ($adminsite_setting->site_meta_desc); ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label"> Meta Keywords <span class="symbol required"></span></label>
                    <textarea rows="5" name="site_meta_keyword" class="form-control" required><?php if (isset($adminsite_setting->site_meta_keyword)) echo ($adminsite_setting->site_meta_keyword); ?></textarea>
                </div>
            </div> -->
            
            <!-- <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label"> Meta Copyright <span class="symbol required"></span></label>
                    <input type="text" name="site_meta_copyright" value="<?php if (isset($adminsite_setting->site_meta_copyright)) echo htmlentities($adminsite_setting->site_meta_copyright); ?>" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label"> Meta Author <span class="symbol required"></span></label>
                    <input type="text" name="site_meta_author" value="<?php if (isset($adminsite_setting->site_meta_author)) echo $adminsite_setting->site_meta_author; ?>" class="form-control" required>
                </div>
            </div> -->
            
            
            <!-- <h3><i class="fa fa-bars"></i> Stripe Settings</h3>
            <hr>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="control-label" for="site_paypal_sandox">Stripe Testing Keys  <span class="symbol required">*</span></label>
                        <select name="site_stripe_type" id="site_paypal_sandox" class="form-control" required>
                            <option value="0" <?= (isset($adminsite_setting->site_stripe_type) && 0 == $adminsite_setting->site_stripe_type)?' selected':''?>>No</option>
                            <option value="1" <?= (isset($adminsite_setting->site_stripe_type) && 1 == $adminsite_setting->site_stripe_type)?' selected':''?>>Yes</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label class="control-label" for="site_stripe_testing_api_key"> Testing API Key  <span class="symbol required">*</span></label>
                        <input type="text" name="site_stripe_testing_api_key" value="<?php if (isset($adminsite_setting->site_stripe_testing_api_key)) echo $adminsite_setting->site_stripe_testing_api_key; ?>"  class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label class="control-label" for="site_stripe_testing_secret_key"> Testing SECRET Key  <span class="symbol required">*</span></label>
                        <input type="text" name="site_stripe_testing_secret_key" value="<?php if (isset($adminsite_setting->site_stripe_testing_secret_key)) echo $adminsite_setting->site_stripe_testing_secret_key; ?>"  class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label class="control-label" for="site_stripe_live_api_key"> Production API Key  <span class="symbol required">*</span></label>
                        <input type="text" name="site_stripe_live_api_key" value="<?php if (isset($adminsite_setting->site_stripe_live_api_key)) echo $adminsite_setting->site_stripe_live_api_key; ?>"  class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label class="control-label" for="site_stripe_live_secret_key"> Production SECRET Key  <span class="symbol required">*</span></label>
                        <input type="text" name="site_stripe_live_secret_key" value="<?php if (isset($adminsite_setting->site_stripe_live_secret_key)) echo $adminsite_setting->site_stripe_live_secret_key; ?>"  class="form-control" required>
                    </div>
                </div>
                <h3><i class="fa fa-bars"></i> Paypal Settings</h3>
            <hr>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="control-label" for="site_paypal_sandox">Paypal Sandbox  <span class="symbol required">*</span></label>
                        <select name="site_paypal_sandox" id="site_paypal_sandox" class="form-control" required>
                            <option value="0" <?= (isset($adminsite_setting->site_paypal_sandox) && 0 == $adminsite_setting->site_paypal_sandox)?' selected':''?>>No</option>
                            <option value="1" <?= (isset($adminsite_setting->site_paypal_sandox) && 1 == $adminsite_setting->site_paypal_sandox)?' selected':''?>>Yes</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="control-label" for="site_sandbox_paypal"> Sandbox Paypal Email  <span class="symbol required">*</span></label>
                        <input type="text" name="site_sandbox_paypal" value="<?php if (isset($adminsite_setting->site_sandbox_paypal)) echo $adminsite_setting->site_sandbox_paypal; ?>"  class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="control-label" for="site_live_paypal"> Live Paypal Email  <span class="symbol required">*</span></label>
                        <input type="text" name="site_live_paypal" value="<?php if (isset($adminsite_setting->site_live_paypal)) echo $adminsite_setting->site_live_paypal; ?>"  class="form-control" required>
                    </div>
                    <div class="clearfix"></div>
                </div>
             -->
            
            <!-- <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label"> Footer Copyright in German <span class="symbol required"></span></label>
                    <textarea rows="5" name="site_copyright_gr" class="form-control"><?php if (isset($adminsite_setting->site_copyright_gr)) echo ($adminsite_setting->site_copyright_gr); ?></textarea>
                </div>
            </div> -->
            <!-- <h3><i class="fa fa-bars"></i> Paypal Settings</h3>
            <hr>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="control-label" for="site_paypal_sandox">Paypal Sandbox  <span class="symbol required">*</span></label>
                        <select name="site_paypal_sandox" id="site_paypal_sandox" class="form-control" required>
                            <option value="0" <?= (isset($adminsite_setting->site_paypal_sandox) && 0 == $adminsite_setting->site_paypal_sandox)?' selected':''?>>No</option>
                            <option value="1" <?= (isset($adminsite_setting->site_paypal_sandox) && 1 == $adminsite_setting->site_paypal_sandox)?' selected':''?>>Yes</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="control-label" for="site_sandbox_paypal"> Sandbox Paypal Email  <span class="symbol required">*</span></label>
                        <input type="text" name="site_sandbox_paypal" value="<?php if (isset($adminsite_setting->site_sandbox_paypal)) echo $adminsite_setting->site_sandbox_paypal; ?>"  class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="control-label" for="site_live_paypal"> Live Paypal Email  <span class="symbol required">*</span></label>
                        <input type="text" name="site_live_paypal" value="<?php if (isset($adminsite_setting->site_live_paypal)) echo $adminsite_setting->site_live_paypal; ?>"  class="form-control" required>
                    </div>
                    <div class="clearfix"></div>
                </div> -->
            
        </div>
        <div class="col-md-6">
            <h3><i class="fa fa-bars"></i> General Detail</h3>
            <hr class="hr-short">
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label"> Site Domain <span class="symbol required"></span></label>
                    <input type="text" name="site_domain" value="<?php if (isset($adminsite_setting->site_domain)) echo $adminsite_setting->site_domain; ?>" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label"> Site Name <span class="symbol required"></span></label>
                    <input type="text" name="site_name" value="<?php if (isset($adminsite_setting->site_name)) echo $adminsite_setting->site_name; ?>" class="form-control" required>
                </div>
            </div>
            
            
            
            <!-- <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label"> Site Fax</label>
                    <input type="text" name="site_fax" value="<?php if (isset($adminsite_setting->site_fax)) echo $adminsite_setting->site_fax; ?>"  class="form-control">
                </div>
            </div>
             -->
            
            <!-- <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label"> Address in German <span class="symbol required"></span></label>
                    <textarea rows="5" name="site_address_gr" class="form-control"><?php if (isset($adminsite_setting->site_address_gr)) echo ($adminsite_setting->site_address_gr); ?></textarea>
                </div>
            </div> -->
            
            <!-- <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label"> Site Contact Map <span class="symbol required"></span></label>
                    <textarea rows="6" name="site_contact_map" class="form-control"><?php if (isset($adminsite_setting->site_contact_map)) echo ($adminsite_setting->site_contact_map); ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label"> Google Adsense Ad <span class="symbol required"></span></label>
                    <textarea rows="4" name="site_google_ad" class="form-control"><?php if (isset($adminsite_setting->site_google_ad)) echo ($adminsite_setting->site_google_ad); ?></textarea>
                </div>
            </div> 
        </div>
                <div class="col-md-6">
            <h3><i class="fa fa-bars"></i> Euro  Amount</h3>
            <hr class="hr-short">
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label">Amount <span class="symbol required"></span></label>
                <input type="number" name="euro_amount" value="<?php if (isset($adminsite_setting->euro_amount)) echo $adminsite_setting->euro_amount; ?>" class="form-control" required>
                </div>
            </div></div>-->
            <!-- <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label"> Chat Code <span class="symbol required"></span></label>
                    <textarea rows="5" name="site_chat" class="form-control"><?php if (isset($adminsite_setting->site_chat)) echo ($adminsite_setting->site_chat); ?></textarea>
                </div>
            </div> -->
            <!-- <h3><i class="fa fa-bars"></i> Stripe Settings</h3>
            <hr>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="control-label" for="site_paypal_sandox">Stripe Testing Keys  <span class="symbol required">*</span></label>
                        <select name="site_stripe_type" id="site_paypal_sandox" class="form-control" required>
                            <option value="0" <?= (isset($adminsite_setting->site_stripe_type) && 0 == $adminsite_setting->site_stripe_type)?' selected':''?>>No</option>
                            <option value="1" <?= (isset($adminsite_setting->site_stripe_type) && 1 == $adminsite_setting->site_stripe_type)?' selected':''?>>Yes</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label class="control-label" for="site_stripe_testing_api_key"> Testing API Key  <span class="symbol required">*</span></label>
                        <input type="text" name="site_stripe_testing_api_key" value="<?php if (isset($adminsite_setting->site_stripe_testing_api_key)) echo $adminsite_setting->site_stripe_testing_api_key; ?>"  class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label class="control-label" for="site_stripe_testing_secret_key"> Testing SECRET Key  <span class="symbol required">*</span></label>
                        <input type="text" name="site_stripe_testing_secret_key" value="<?php if (isset($adminsite_setting->site_stripe_testing_secret_key)) echo $adminsite_setting->site_stripe_testing_secret_key; ?>"  class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label class="control-label" for="site_stripe_live_api_key"> Production API Key  <span class="symbol required">*</span></label>
                        <input type="text" name="site_stripe_live_api_key" value="<?php if (isset($adminsite_setting->site_stripe_live_api_key)) echo $adminsite_setting->site_stripe_live_api_key; ?>"  class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label class="control-label" for="site_stripe_live_secret_key"> Production SECRET Key  <span class="symbol required">*</span></label>
                        <input type="text" name="site_stripe_live_secret_key" value="<?php if (isset($adminsite_setting->site_stripe_live_secret_key)) echo $adminsite_setting->site_stripe_live_secret_key; ?>"  class="form-control" required>
                    </div>
                </div> -->
            <!-- <h3><i class="fa fa-bars"></i> External Link</h3>
            <hr class="hr-short">
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label">  Link</label>
                    <input type="text" name="site_external_link" value="<?php if (isset($adminsite_setting->site_external_link)) echo $adminsite_setting->site_external_link; ?>" class="form-control">
                </div>
            </div> -->
            
            <!-- <h3><i class="fa fa-bars"></i> Social Media</h3>
            <hr class="hr-short">
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label"> Facebook Link</label>
                    <input type="text" name="site_facebook" value="<?php if (isset($adminsite_setting->site_facebook)) echo $adminsite_setting->site_facebook; ?>" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label"> Twitter Link</label>
                    <input type="text" name="site_twitter" value="<?php if (isset($adminsite_setting->site_twitter)) echo $adminsite_setting->site_twitter; ?>" class="form-control">
                </div>
            </div> -->
            <!-- <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label"> Pinterest Link</label>
                <input type="text" name="site_pinterest" value="<?php if (isset($adminsite_setting->site_pinterest)) echo $adminsite_setting->site_pinterest; ?>"  class="form-control">
                </div>
            </div> -->
            <!-- <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label"> Instagram Link</label>
                    <input type="text" name="site_instagram" value="<?php if (isset($adminsite_setting->site_instagram)) echo $adminsite_setting->site_instagram; ?>" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label"> LinkedIn Link</label>
                    <input type="text" name="site_linkedin" value="<?php if (isset($adminsite_setting->site_linkedin)) echo $adminsite_setting->site_linkedin; ?>" class="form-control">
                </div>
            </div> -->
            <!-- <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label"> Youtube Link</label>
                    <input type="text" name="site_youtube" value="<?php if (isset($adminsite_setting->site_youtube)) echo $adminsite_setting->site_youtube; ?>" class="form-control">
                </div>
            </div> -->
        </div>        
        
        
        <div class="clearfix"></div>
        <div class="col-md-12">
            <!-- <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label"> Footer About Company<span class="symbol required"></span></label>
                    <textarea rows="5" name="site_about" class="form-control ckeditor"><?php if (isset($adminsite_setting->site_about)) echo ($adminsite_setting->site_about); ?></textarea>
                </div>
            </div> -->
            
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label"> Footer Copyright <span class="symbol required"></span></label>
                    <textarea rows="5" name="site_copyright" class="form-control"><?php if (isset($adminsite_setting->site_copyright)) echo ($adminsite_setting->site_copyright); ?></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <hr class="hr-short">
            <div class="form-group">
                <div class="col-md-3">
                    <div class="panel panel-primary" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Logo Image
                            </div>
                            <div class="panel-options">
                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                    <img src="<?= get_site_image_src("images/", $adminsite_setting->site_logo)?>" alt="--">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="logo_image" accept="image/*" <?php if(empty($adminsite_setting->site_logo)){echo 'required=""';}?>>
                                    </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-primary" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Footer Logo
                            </div>
                            <div class="panel-options">
                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                    <img src="<?= get_site_image_src("images/", $adminsite_setting->site_footer_logo)?>" alt="--">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="footer_logo_image" accept="image/*" <?php if(empty($adminsite_setting->site_footer_logo)){echo 'required=""';}?>>
                                    </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-primary" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title">
                               Fav Icon Image
                            </div>
                            <div class="panel-options">
                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                    <img src="<?= get_site_image_src("images/", $adminsite_setting->site_icon)?>" alt="--">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="icon_image" accept="image/*" <?php if(empty($adminsite_setting->site_icon)){echo 'required=""';}?>>
                                    </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-primary" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title">
                               Meta Thumb Image
                            </div>
                            <div class="panel-options">
                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                    <img src="<?= get_site_image_src("images/", $adminsite_setting->site_thumb)?>" alt="--">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="thumb_image" accept="image/*" <?php if(empty($adminsite_setting->site_thumb)){echo 'required=""';}?>>
                                    </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group text-right">
                <div class="col-md-12">
                    <input type="submit" class="btn btn-green btn-lg" value="Update Settings">
                </div>
            </div>
        </div>
        <br><br>
    </form>
</div>