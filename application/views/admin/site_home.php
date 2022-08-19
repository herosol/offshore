<?= getBredcrum(ADMIN, array('#' => 'Home Page')); ?>
<?= showMsg(); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <h2 class="no-margin"><i class="entypo-window"></i> Update <strong>Home Page</strong></h2>
    </div>
    <div class="col-md-6 text-right">
        <!--        <a href="<?= base_url('admin/services'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>-->
    </div>
</div>
<div>
    <hr>
    <div class="clearfix"></div>
    <div class="panel-body">
        <form role="form"  method="post" class="form-horizontal form-groups-bordered validate" novalidate="novalidate" enctype="multipart/form-data">
        <div class="form-group">
            <div class="row">
                    <div class="col-md-12">
                        <label class="control-label">Page Title <span style="color: red">*</label>
                        <textarea name="page_title" class="form-control" required="required" rows="3"><?php echo $row['page_title']; ?></textarea>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-12">
                        <h3>Meta Tags</h3>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-6">
                        <label class="control-label">Meta Title <span style="color: red">*</label>
                        <textarea name="meta_title" class="form-control" required="required" rows="3"><?php echo $row['meta_title']; ?></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="control-label">Meta Keywords <span style="color: red">*</label>
                        <textarea name="meta_keywords" class="form-control" required="required" rows="3"><?php echo $row['meta_keywords']; ?></textarea>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-12">
                        <label class="control-label">Meta Description <span style="color: red">*</label>
                        <textarea name="meta_description" class="form-control" required="required" rows="3"><?php echo $row['meta_description']; ?></textarea>
                    </div>
                    <div class="clearfix"></div>
            </div>
        </div>
            
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <h3> Main Banner </h3>
                    </div>
                    <div class="col-md-12">
                            
                            <div class="form-group">
                                <?php for($i = 1; $i <= 1; $i++):?>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="banner_heading1" class="control-label"> Heading <span class="symbol required">*</span></label>
                                                <input type="text" name="banner_heading1" id="banner_heading1" value="<?= $row['banner_heading1'] ?>" class="form-control" required>
                                            </div>
                                            <br/>
                                            <div class="col-md-12">
                                                <input type="text" name="banner_heading2" id="banner_heading2" value="<?= $row['banner_heading2'] ?>" class="form-control" required>
                                            </div>
                                            <br/>
                                            <div class="col-md-12">
                                                <input type="text" name="banner_heading3" id="banner_heading3" value="<?= $row['banner_heading3'] ?>" class="form-control" required>
                                            </div>
                                            <br/>
                                            <div class="col-md-12">
                                                <div class="panel panel-primary" data-collapsed="0">
                                                    <div class="panel-heading">
                                                        <div class="panel-title">
                                                            Image
                                                        </div>
                                                        <div class="panel-options">
                                                            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                                <img src="<?= !empty($row['image'.$i]) ? get_site_image_src("images/", $row['image'.$i]) : base_url('assets/images/no-image.svg')  ?>" alt="--">
                                                            </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                            <div>
                                                                <span class="btn btn-white btn-file">
                                                                    <span class="fileinput-new">Select image</span>
                                                                    <span class="fileinput-exists">Change</span>
                                                                    <input type="file" name="image<?=$i?>" accept="image/*" <?php if(empty($row['image'.$i])){echo 'required=""';}?>>
                                                                </span>
                                                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                <?php endfor?>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                    <!-- <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="banner_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                                <input type="text" name="banner_heading" id="banner_heading" value="<?= $row['banner_heading'] ?>" class="form-control" required>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-6">
                                <label for="banner_sub_heading" class="control-label"> Heading  <span class="symbol required">*</span></label>
                                <input type="text" name="banner_sub_heading" id="banner_sub_heading" value="<?= $row['banner_sub_heading'] ?>" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="banner_sub_color_heading" class="control-label"> Color Heading  <span class="symbol required">*</span></label>
                                <input type="text" name="banner_sub_color_heading" id="banner_sub_color_heading" value="<?= $row['banner_sub_color_heading'] ?>" class="form-control" required>
                            </div>
                            
                            <div class="clearfix"></div> 
                            <div class="col-md-12">
                                <label for="banner_text" class="control-label"> Details <span class="symbol required">*</span></label>
                                <textarea name="banner_text" class="form-control" required="required" rows="3"><?php echo $row['banner_text']; ?></textarea>
                            </div>
                            <br>
                            <div class="clearfix"></div>
                            <div class="col-md-12">
                            <table class="table table-bordered newTable" id="newTable">
                                        <tr style="background-color: #eee">
                                            <th>Text</th>
                                            <th width="10%">Order#</th>
                                            <th width="4%" class="text-center"><a href="javascript:void(0)" id="addNewRowTbl" class="addNewRowTbl"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
                                        </tr>
                                        <?php $sec1s = getMultiText('home-sec1'); ?>
                                        <?php if (count($sec1s) > 0) { $sec1s_count = 1; ?>
                                        <?php foreach ($sec1s as $sec1) { ?>
                                            <tr>
                                                <td>
                                                    <input type="text" name="sec1_title[]" id="sec1_title" value="<?= $sec1->title; ?>" class="form-control" placeholder="Text">
                                                </td>    
                                                <td>
                                                    <input type="number" name="sec1_order_no[]" id="sec1_order_no" value="<?= $sec1->order_no; ?>" class="form-control" placeholder="Order#">
                                                </td>
                                                <td class="text-center">
                                                    <?php if ($sec1s_count > 1) { ?>
                                                        <a href="javascript:void(0)" id="delNewRowTbl" class="delNewRowTbl"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php $sec1s_count++; ?>
                                        <?php } ?>
                                        <?php }else{ ?>
                                            <tr>
                                                <td>
                                                    <input type="text" name="sec1_title[]" id="sec1_title" value="" class="form-control" placeholder="Heading">
                                                </td>
                                                <td>
                                                    <input type="number" name="sec1_order_no[]" id="sec1_order_no" value="" class="form-control" placeholder="Order#">
                                                </td>
                                                <td class="text-center">
                                                </td>
                                            </tr>  
                                        <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div> -->
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <h3> Section 2 </h3>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="section2_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                                <input type="text" name="section2_heading" id="section2_heading" value="<?= $row['section2_heading'] ?>" class="form-control" required>
                            </div>
                            <div class="clearfix"></div>                            
                            <div class="col-md-12">
                                <label for="section2_detail" class="control-label">  Detail <span class="symbol required">*</span></label>
                                <textarea name="section2_detail" rows="3" class="form-control ckeditor"><?= $row['section2_detail'] ?></textarea>
                            </div>
                            <div class="clearfix"></div>
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-primary" data-collapsed="0">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    Image
                                </div>
                                <div class="panel-options">
                                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                        <img src="<?= !empty($row['image2']) ? get_site_image_src("images/", $row['image2']) : base_url('assets/images/no-image.svg')  ?>" alt="--">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                    <div>
                                        <span class="btn btn-white btn-file">
                                            <span class="fileinput-new">Select image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="image2" accept="image/*" <?php if(empty($row['image2'])){echo 'required=""';}?>>
                                        </span>
                                        <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <h3> Section 3 </h3>
                    </div>
                    <?php for($i = 1; $i <= 3; $i++):?>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="panel panel-primary" data-collapsed="0">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                Image
                                            </div>
                                            <div class="panel-options">
                                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                    <img src="<?= !empty($row['image'.($i+5)]) ? get_site_image_src("images/", $row['image'.($i+5)]) : base_url('assets/images/no-image.svg')  ?>" alt="--">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                <div>
                                                    <span class="btn btn-white btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="image<?=($i+5)?>" accept="image/*" <?php if(empty($row['image'.($i+5)])){echo 'required=""';}?>>
                                                    </span>
                                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="section3_heading<?=$i?>" class="control-label"> Heading <?= $i?> <span class="symbol required">*</span></label>
                                    <input type="text" name="section3_heading<?=$i?>" id="section3_heading<?=$i?>" value="<?= $row['section3_heading'.$i] ?>" class="form-control" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="section3_text<?=$i?>" class="control-label"> Detail <?= $i?><span class="symbol required">*</span></label>
                                    <textarea name="section3_text<?=$i?>" for="section3_text<?=$i?>" rows="4" class="form-control" ><?= $row['section3_text'.$i] ?></textarea>
                                </div>
                            </div>
                        </div>
                    <?php endfor?>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <h3> Section 4</h3>
                    </div>
                    <div class="col-md-12">
                        <div class="panel panel-primary" data-collapsed="0">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    Image
                                </div>
                                <div class="panel-options">
                                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                        <img src="<?= !empty($row['image9']) ? get_site_image_src("images/", $row['image9']) : base_url('assets/images/no-image.svg')  ?>" alt="--">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                    <div>
                                        <span class="btn btn-white btn-file">
                                            <span class="fileinput-new">Select image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="image9" accept="image/*" <?php if(empty($row['image9'])){echo 'required=""';}?>>
                                        </span>
                                        <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <h3> Section 5 </h3>
                    </div>
                    <div class="col-md-3">
                        <div class="panel panel-primary" data-collapsed="0">
                            <div class="panel-heading">
                                <div class="panel-title">
                                     Image <br>Notes: Image dimention : 665px x 466px
                                </div>
                                <div class="panel-options">
                                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                        <img src="<?= !empty($row['image10']) ? get_site_image_src("images/", $row['image10']) : base_url('assets/images/no-image.svg') ?>" alt="--">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                    <div>
                                        <span class="btn btn-white btn-file">
                                            <span class="fileinput-new">Select image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="image10" accept="image/*" <?php if(empty($row['image10'])){echo 'required=""';}?>>
                                        </span>
                                        <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-md-9">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="section5_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                                <input type="text" name="section5_heading" id="section5_heading" value="<?= $row['section5_heading'] ?>" class="form-control" required>
                            </div>
                            <div class="clearfix"></div>                            
                            <div class="col-md-12">
                                <label for="section5_detail" class="control-label">  Detail <span class="symbol required">*</span></label>
                                <textarea name="section5_detail" rows="3" class="form-control ckeditor"><?= $row['section5_detail'] ?></textarea>
                            </div>
                            <div class="clearfix"></div>
                            
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <h3> Section 6</h3>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="section6_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                                <input type="text" name="section6_heading" id="section6_heading" value="<?= $row['section6_heading'] ?>" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered newTable" id="newTable">
                            <tr style="background-color: #eee">
                                <th width="10%">Image</th>
                                <th width="25%">Title</th>
                                <th width="25%">Video Iframe Embeded Link</th>
                                <th width="10%">Order#</th>
                                <th width="4%" class="text-center"><a href="javascript:void(0)" id="addNewRowTbl" class="addNewRowTbl"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
                            </tr>
                            <?php $sec6s = getMultiText('home-sec-6'); ?>
                            <?php if (count($sec6s) > 0) { $sec6s_count = 1; ?>
                            <?php foreach ($sec6s as $sec6) { ?>
                                <tr>
                                    <td>
                                        <div id="imgDiv">
                                            <input type="file" name="sec6_image[]" accept="image/*" id="newImgInput" style="display: none;" />
                                            <img src="<?php echo getImageSrc('./uploads/images/'.$sec6->image); ?>" style="width: 100%; cursor: pointer;" id="newImg"> 
                                            <input type="hidden" name="sec6_pics[]" value="<?= $sec6->image; ?>"> 
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" name="sec6_title[]" id="sec6_title" value="<?= $sec6->title; ?>" class="form-control" placeholder="Title">
                                    </td>
                                    <td>
                                        <input type="text" name="sec6_link[]" id="sec6_link" value="<?= $sec6->txt1; ?>" class="form-control" placeholder="Link">
                                    </td>
                                    <td>
                                        <input type="number" name="sec6_order_no[]" id="sec6_order_no" value="<?= $sec6->order_no; ?>" class="form-control" placeholder="Order#">
                                    </td>
                                    <td class="text-center">
                                        <?php if ($sec6s_count > 1) { ?>
                                            <a href="javascript:void(0)" id="delNewRowTbl" class="delNewRowTbl"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php $sec6s_count++; ?>
                            <?php } ?>
                            <?php }else{ ?>
                                <tr>
                                    <td>
                                        <div id="imgDiv">
                                            <input type="file" name="sec6_image[]" accept="image/*" id="newImgInput" style="display: none;" />
                                            <img src="<?php echo getImageSrc('./uploads/images/'); ?>" style="width: 100%; cursor: pointer;" id="newImg">
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" name="sec6_title[]" id="sec6_title" value="" class="form-control" placeholder="Title">
                                    </td>
                                    <td>
                                        <input type="text" name="sec6_link[]" id="sec6_link" value="" class="form-control" placeholder="Link">
                                    </td>
                                    <td>
                                        <input type="number" name="sec6_order_no[]" id="sec6_order_no" value="" class="form-control" placeholder="Order#">
                                    </td>
                                    <td class="text-center">
                                    </td>
                                </tr>  
                            <?php } ?>                  
                        </table>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            
            
            <div class="form-group">
                <label for="field-1" class="col-sm-2 control-label "></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary btn-lg col-md-3 pull-right"><i class="fa fa-save"></i> Save</button>
                </div>
            </div>
        </form>
    </div>
</div>