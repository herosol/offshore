<?= getBredcrum(ADMIN, array('#' => 'Contact Page')); ?>
<?= showMsg(); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <h2 class="no-margin"><i class="entypo-window"></i> Update <strong>Contact Page</strong></h2>
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
                        <h3> Section 1 </h3>
                    </div>
                    <div class="col-md-12">
                        <div class="panel panel-primary" data-collapsed="0">
                            <div class="panel-heading">
                                <div class="panel-title">
                                     Banner Image
                                </div>
                                <div class="panel-options">
                                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                        <img src="<?= !empty($row['image1']) ? get_site_image_src("images/", $row['image1']) : base_url('assets/images/no-image.svg') ?>" alt="--">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                    <div>
                                        <span class="btn btn-white btn-file">
                                            <span class="fileinput-new">Select image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="image1" accept="image/*" <?php if(empty($row['image1'])){echo 'required=""';}?>>
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
                        <h3> Section 2 (LEFT)</h3>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-6">
                                <label for="section2_left_heading" class="control-label"> Heading  <span class="symbol required">*</span></label>
                                <input type="text" name="section2_left_heading" id="section2_left_heading" value="<?= $row['section2_left_heading'] ?>" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="section2_left_tagline" class="control-label"> Tagline  <span class="symbol required">*</span></label>
                                <input type="text" name="section2_left_tagline" id="section2_left_tagline" value="<?= $row['section2_left_tagline'] ?>" class="form-control" required>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="col-md-12">
                        <table class="table table-bordered newTable" id="newTable">
                            <tr style="background-color: #eee">
                                <th width="25%">Heading</th>
                                <th>Text</th>
                                <th width="10%">Order#</th>
                                <th width="4%" class="text-center"><a href="javascript:void(0)" id="addNewRowTbl" class="addNewRowTbl"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
                            </tr>
                            <?php $sec2_left_1s = getMultiText('contact-sec2-left-1'); ?>
                            <?php if (count($sec2_left_1s) > 0) { $sec2_left_1s_count = 1; ?>
                            <?php foreach ($sec2_left_1s as $sec2_left_1) { ?>
                                <tr>
                                    <td>
                                        <input type="text" name="sec2_left_1_title[]" id="sec2_left_1_title" value="<?= $sec2_left_1->title; ?>" class="form-control" placeholder="Heading">
                                    </td>
                                    <td>
                                        <textarea name="sec2_left_1_detail[]" id="sec2_left_1_detail" class="form-control" placeholder="Text" rows="3"><?= $sec2_left_1->detail; ?></textarea>
                                    </td>
                                    <td>
                                        <input type="number" name="sec2_left_1_order_no[]" id="sec2_left_1_order_no" value="<?= $sec2_left_1->order_no; ?>" class="form-control" placeholder="Order#">
                                    </td>
                                    <td class="text-center">
                                        <?php if ($sec2_left_1s_count > 1) { ?>
                                            <a href="javascript:void(0)" id="delNewRowTbl" class="delNewRowTbl"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php $sec2_left_1s_count++; ?>
                            <?php } ?>
                            <?php }else{ ?>
                                <tr>
                                    <td>
                                        <input type="text" name="sec2_left_1_title[]" id="sec2_left_1_title" value="" class="form-control" placeholder="Heading">
                                    </td>
                                    <td>
                                        <textarea name="sec2_left_1_detail[]" id="sec2_left_1_detail" class="form-control" placeholder="Text" rows="3"></textarea>
                                    </td>
                                    <td>
                                        <input type="number" name="sec2_left_1_order_no[]" id="sec2_left_1_order_no" value="" class="form-control" placeholder="Order#">
                                    </td>
                                    <td class="text-center">
                                    </td>
                                </tr>  
                            <?php } ?>                  
                        </table>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <table class="table table-bordered newTable" id="newTable">
                            <tr style="background-color: #eee">
                                <th width="10%">Image</th>
                                <th width="25%">Link</th>
                                <th width="10%">Order#</th>
                                <th width="4%" class="text-center"><a href="javascript:void(0)" id="addNewRowTbl" class="addNewRowTbl"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
                            </tr>
                            <?php $sec2_left_2s = getMultiText('contact-sec2-left-2'); ?>
                            <?php if (count($sec2_left_2s) > 0) { $sec2_left_2s_count = 1; ?>
                            <?php foreach ($sec2_left_2s as $sec2_left_2) { ?>
                                <tr>
                                    <td>
                                        <div id="imgDiv">
                                            <input type="file" name="sec2_left_2_image[]" accept="image/*" id="newImgInput" style="display: none;" />
                                            <img src="<?php echo getImageSrc('./uploads/images/'.$sec2_left_2->image); ?>" style="width: 100%; cursor: pointer;" id="newImg"> 
                                            <input type="hidden" name="sec2_left_2_pics[]" value="<?= $sec2_left_2->image; ?>"> 
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" name="sec2_left_2_title[]" id="sec2_left_2_title" value="<?= $sec2_left_2->title; ?>" class="form-control" placeholder="Link">
                                    </td>
                                    <td>
                                        <input type="number" name="sec2_left_2_order_no[]" id="sec2_left_2_order_no" value="<?= $sec2_left_2->order_no; ?>" class="form-control" placeholder="Order#">
                                    </td>
                                    <td class="text-center">
                                        <?php if ($sec2_left_2s_count > 1) { ?>
                                            <a href="javascript:void(0)" id="delNewRowTbl" class="delNewRowTbl"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php $sec2_left_2s_count++; ?>
                            <?php } ?>
                            <?php }else{ ?>
                                <tr>
                                    <td>
                                        <div id="imgDiv">
                                            <input type="file" name="sec2_left_2_image[]" accept="image/*" id="newImgInput" style="display: none;" />
                                            <img src="<?php echo getImageSrc('./uploads/images/'); ?>" style="width: 100%; cursor: pointer;" id="newImg">
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" name="sec2_left_2_title[]" id="sec2_left_2_title" value="" class="form-control" placeholder="Link">
                                    </td>
                                    <td>
                                        <input type="number" name="sec2_left_2_order_no[]" id="sec2_left_2_order_no" value="" class="form-control" placeholder="Order#">
                                    </td>
                                    <td class="text-center">
                                    </td>
                                </tr>  
                            <?php } ?>                  
                        </table>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <h3> Section 2 (Right)</h3>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="section2_right_heading" class="control-label"> Heading  <span class="symbol required">*</span></label>
                                <input type="text" name="section2_right_heading" id="section2_right_heading" value="<?= $row['section2_right_heading'] ?>" class="form-control" required>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label for="first_field_heading" class="control-label"> First Field Heading  <span class="symbol required">*</span></label>
                                <input type="text" name="first_field_heading" id="first_field_heading" value="<?= $row['first_field_heading'] ?>" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="second_field_heading" class="control-label"> Second Field Heading  <span class="symbol required">*</span></label>
                                <input type="text" name="second_field_heading" id="second_field_heading" value="<?= $row['second_field_heading'] ?>" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="third_field_heading" class="control-label"> Third Field Heading  <span class="symbol required">*</span></label>
                                <input type="text" name="third_field_heading" id="third_field_heading" value="<?= $row['third_field_heading'] ?>" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="fourth_field_heading" class="control-label"> Fourth Field Heading  <span class="symbol required">*</span></label>
                                <input type="text" name="fourth_field_heading" id="fourth_field_heading" value="<?= $row['fourth_field_heading'] ?>" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="fifth_field_heading" class="control-label"> Fifth Field Heading  <span class="symbol required">*</span></label>
                                <input type="text" name="fifth_field_heading" id="fifth_field_heading" value="<?= $row['fifth_field_heading'] ?>" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="button_heading" class="control-label"> Button Heading  <span class="symbol required">*</span></label>
                                <input type="text" name="button_heading" id="button_heading" value="<?= $row['button_heading'] ?>" class="form-control" required>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
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