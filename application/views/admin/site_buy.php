<?= getBredcrum(ADMIN, array('#' => 'Where to Buy Page')); ?>
<?= showMsg(); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <h2 class="no-margin"><i class="entypo-window"></i> Update <strong>Where to Buy Page</strong></h2>
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
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="section1_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                                <input type="text" name="section1_heading" id="section1_heading" value="<?= $row['section1_heading'] ?>" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="section1_heading2" class="control-label"> Heading 2 <span class="symbol required">*</span></label>
                                <input type="text" name="section1_heading2" id="section1_heading2" value="<?= $row['section1_heading2'] ?>" class="form-control" required>
                            </div>
                            <div class="clearfix"></div>
                            
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    
                    
                    
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        
                        <div class="form-group">
                            <div class="col-md-12">
                                <table class="table table-bordered newTable" id="newTable">
                                    <tr style="background-color: #eee">
                                        <th width="10%">Image</th>
                                        <th width="25%">Heading</th>
                                        <th>Link</th>
                                        <th width="10%">Order#</th>
                                        <th width="4%" class="text-center"><a href="javascript:void(0)" id="addNewRowTbl" class="addNewRowTbl"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
                                    </tr>
                                    <?php $sec2s = getMultiText('buy-sec1'); ?>
                                    <?php if (count($sec2s) > 0) { $sec2s_count = 1; ?>
                                    <?php foreach ($sec2s as $sec2) { ?>
                                        <tr>
                                            <td>
                                                Notes: Image dimention : 265px x 159px
                                                <div id="imgDiv">
                                                    <input type="file" name="sec2_image[]" accept="image/*" id="newImgInput" style="display: none;" />
                                                    <img src="<?php echo getImageSrc('./uploads/images/'.$sec2->image); ?>" style="width: 100%; cursor: pointer;" id="newImg"> 
                                                    <input type="hidden" name="sec2_pics[]" value="<?= $sec2->image; ?>"> 
                                                </div>
                                            </td>
                                            <td>
                                                <input type="text" name="sec2_title[]" id="sec2_title" value="<?= $sec2->title; ?>" class="form-control" placeholder="Heading">
                                            </td>
                                            <td>
                                                <input type="text" name="sec2_detail[]" id="sec2_detail" value="<?= $sec2->detail; ?>" class="form-control" placeholder="Link">
                                            </td>
                                            <td>
                                                <input type="number" name="sec2_order_no[]" id="sec2_order_no" value="<?= $sec2->order_no; ?>" class="form-control" placeholder="Order#">
                                            </td>
                                            <td class="text-center">
                                                <?php if ($sec2s_count > 1) { ?>
                                                    <a href="javascript:void(0)" id="delNewRowTbl" class="delNewRowTbl"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php $sec2s_count++; ?>
                                    <?php } ?>
                                    <?php }else{ ?>
                                        <tr>
                                            <td>
                                                Notes: Image dimention : 265px x 159px
                                                <div id="imgDiv">
                                                    <input type="file" name="sec2_image[]" accept="image/*" id="newImgInput" style="display: none;" />
                                                    <img src="<?php echo getImageSrc('./uploads/images/'); ?>" style="width: 100%; cursor: pointer;" id="newImg">
                                                </div>
                                            </td>
                                            <td>
                                                <input type="text" name="sec2_title[]" id="sec2_title" value="" class="form-control" placeholder="Heading">
                                            </td>
                                            <td>
                                                <input type="text" name="sec2_detail[]" id="sec2_detail" value="" class="form-control" placeholder="Link">
                                            </td>
                                            <td>
                                                <input type="number" name="sec2_order_no[]" id="sec2_order_no" value="" class="form-control" placeholder="Order#">
                                            </td>
                                            <td class="text-center">
                                            </td>
                                        </tr>  
                                    <?php } ?>                  
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <h3> Section 2 </h3>
                    </div>
                    <div class="col-md-12">
                        <label for="section2_heading" class="control-label"> Heading  <span class="symbol required">*</span></label>
                        <input type="text" name="section2_heading" id="section2_heading" value="<?= $row['section2_heading'] ?>" class="form-control" required>
                    </div>
                    <br>
                    <div class="clearfix"></div>
                    
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        
                        <div class="form-group">
                            <div class="col-md-12">
                                <table class="table table-bordered newTable" id="newTable">
                                    <tr style="background-color: #eee">
                                        <th width="10%">Image</th>
                                        <th width="25%">Heading</th>
                                        <th>Link</th>
                                        <th width="10%">Order#</th>
                                        <th width="4%" class="text-center"><a href="javascript:void(0)" id="addNewRowTbl" class="addNewRowTbl"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
                                    </tr>
                                    <?php $sec3s = getMultiText('buy-sec2'); ?>
                                    <?php if (count($sec3s) > 0) { $sec3s_count = 1; ?>
                                    <?php foreach ($sec3s as $sec3) { ?>
                                        <tr>
                                            <td>
                                                Notes: Image dimention : 265px x 159px
                                                <div id="imgDiv">
                                                    <input type="file" name="sec3_image[]" accept="image/*" id="newImgInput" style="display: none;" />
                                                    <img src="<?php echo getImageSrc('./uploads/images/'.$sec3->image); ?>" style="width: 100%; cursor: pointer;" id="newImg"> 
                                                    <input type="hidden" name="sec3_pics[]" value="<?= $sec3->image; ?>"> 
                                                </div>
                                            </td>
                                            <td>
                                                <input type="text" name="sec3_title[]" id="sec3_title" value="<?= $sec3->title; ?>" class="form-control" placeholder="Heading">
                                            </td>
                                            <td>
                                                <input type="text" name="sec3_detail[]" id="sec3_detail" value="<?= $sec3->detail; ?>" class="form-control" placeholder="Link">
                                            </td>
                                            <td>
                                                <input type="number" name="sec3_order_no[]" id="sec3_order_no" value="<?= $sec3->order_no; ?>" class="form-control" placeholder="Order#">
                                            </td>
                                            <td class="text-center">
                                                <?php if ($sec3s_count > 1) { ?>
                                                    <a href="javascript:void(0)" id="delNewRowTbl" class="delNewRowTbl"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php $sec3s_count++; ?>
                                    <?php } ?>
                                    <?php }else{ ?>
                                        <tr>
                                            <td>
                                                Notes: Image dimention : 265px x 159px
                                                <div id="imgDiv">
                                                    <input type="file" name="sec3_image[]" accept="image/*" id="newImgInput" style="display: none;" />
                                                    <img src="<?php echo getImageSrc('./uploads/images/'); ?>" style="width: 100%; cursor: pointer;" id="newImg">
                                                </div>
                                            </td>
                                            <td>
                                                <input type="text" name="sec3_title[]" id="sec3_title" value="" class="form-control" placeholder="Heading">
                                            </td>
                                            <td>
                                                <input type="text" name="sec3_detail[]" id="sec3_detail" value="" class="form-control" placeholder="Link">
                                            </td>
                                            <td>
                                                <input type="number" name="sec3_order_no[]" id="sec3_order_no" value="" class="form-control" placeholder="Order#">
                                            </td>
                                            <td class="text-center">
                                            </td>
                                        </tr>  
                                    <?php } ?>                  
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <h3> Section 3</h3>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="section3_text" class="control-label"> Text  <span class="symbol required">*</span></label>
                                <textarea name="section3_text" id="section3_text" class="ckeditor"><?= $row['section3_text'] ?></textarea>
                            </div>
                            <div class="clearfix"></div> 
                             
                        </div>
                        
                    </div>
                    <hr>
                   
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