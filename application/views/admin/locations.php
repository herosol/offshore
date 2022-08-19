<?php if ($this->uri->segment(3) == 'manage'): ?>
    <?php echo showMsg(); ?>
    <?php echo getBredcrum(ADMIN, array('#' => 'Add/Update Locations')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-list"></i> Add/Update <strong>Locations</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?php echo base_url(ADMIN . '/locations'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>
        </div>
    </div>
    <div>
        <hr>
        <div class="row col-md-12">
            <form action="" name="frmNewsletter" role="form" class="form-horizontal blog-form" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="panel panel-default">
                                <div class="panel-heading col-md-12" style="padding: 5.5px 10px"><i class="fa fa-eye" aria-hidden="true"></i> Display Options</div>
                                <div class="panel-body" style="padding: 15.5px 0px">                    

                                    <div class="col-md-7">
                                        <h5>Active</h5>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="btn-group" id="status" data-toggle="buttons">
                                            <label class="btn btn-default btn-on btn-sm <?php if($row->status == 1){echo 'active';}?>">
                                            <input type="radio" value="1" name="status"<?php if($row->status == 1){echo 'checked';}?>><i class="fa fa-check" aria-hidden="true"></i></label>
                                          
                                            <label class="btn btn-default btn-off btn-sm <?php if($row->status == 0){echo 'active';}?>">
                                            <input type="radio" value="0" name="status" <?php if($row->status == 0){echo 'checked';}?>><i class="fa fa-times" aria-hidden="true"></i></label>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="">
                                <div class="panel-heading col-md-12">
                                    <div class="panel-title"><h3>Meta Information</h3></div>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label"> Meta Title</label>
                                                <input type="text" name="meta_title" value="<?=$row->meta_title?>" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label"> Meta Keywords</label>
                                                <input type="text" name="meta_keywords" value="<?=$row->meta_keywords?>" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">  Meta Description</label>
                                                <textarea  rows="8" class="form-control" name="meta_description" required><?=$row->meta_description?></textarea>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="clearfix"></div>
                                    
                                </div>
                                <div class="panel-heading col-md-12">
                                    <div class="panel-title"><h3>Location Basic Information</h3></div>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label"> Title</label>
                                                <input type="text" name="title" value="<?=$row->title?>" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="panel panel-primary" data-collapsed="0">
                                                    <div class="panel-heading">
                                                        <div class="panel-title">
                                                            Thumbnail
                                                        </div>
                                                        <div class="panel-options">
                                                            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                                <img src="<?= !empty($row->image) ? get_site_image_src("locations/", $row->image) : base_url('assets/images/no-image.svg')  ?>" alt="--">
                                                            </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                            <div>
                                                                <span class="btn btn-white btn-file">
                                                                    <span class="fileinput-new">Select image</span>
                                                                    <span class="fileinput-exists">Change</span>
                                                                    <input type="file" name="image" accept="image/*" <?php if(empty($row->image)){echo 'required=""';}?>>
                                                                </span>
                                                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="clearfix"></div>
                                </div>

                                <div class="panel-heading col-md-12">
                                    <div class="panel-title"><h3>Location Detail Page</h3></div>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <div class="form-group">
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
                                                                <img src="<?= !empty($row->banner1) ? get_site_image_src("locations/", $row->banner1) : base_url('assets/images/no-image.svg')  ?>" alt="--">
                                                            </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                            <div>
                                                                <span class="btn btn-white btn-file">
                                                                    <span class="fileinput-new">Select image</span>
                                                                    <span class="fileinput-exists">Change</span>
                                                                    <input type="file" name="banner1" accept="image/*" <?php if(empty($row->banner1)){echo 'required=""';}?>>
                                                                </span>
                                                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                                <div class="col-md-6">
                                                    <div class="panel panel-primary" data-collapsed="0">
                                                        <div class="panel-heading">
                                                            <div class="panel-title">
                                                                Left Image
                                                            </div>
                                                            <div class="panel-options">
                                                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                                    <img src="<?= !empty($row->sec1_image) ? get_site_image_src("locations/", $row->sec1_image) : base_url('assets/images/no-image.svg') ?>" alt="--">
                                                                </div>
                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                                <div>
                                                                    <span class="btn btn-white btn-file">
                                                                        <span class="fileinput-new">Select image</span>
                                                                        <span class="fileinput-exists">Change</span>
                                                                        <input type="file" name="sec1_image" accept="image/*" <?php if(empty($row->sec1_image)){echo 'required=""';}?>>
                                                                    </span>
                                                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <label for="sec1_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                                                            <input type="text" name="sec1_heading" id="sec1_heading" value="<?= $row->sec1_heading ?>" class="form-control" required>
                                                        </div>
                                                        <div class="clearfix"></div>                            
                                                        <div class="col-md-12">
                                                            <label for="sec1_detail" class="control-label">  Detail <span class="symbol required">*</span></label>
                                                            <textarea name="sec1_detail" rows="3" class="form-control ckeditor"><?= $row->sec1_detail ?></textarea>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="panel panel-primary" data-collapsed="0">
                                                    <div class="panel-heading">
                                                        <div class="panel-title">
                                                            Mid Banner Image
                                                        </div>
                                                        <div class="panel-options">
                                                            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                                <img src="<?= !empty($row->banner2) ? get_site_image_src("locations/", $row->banner2) : base_url('assets/images/no-image.svg')  ?>" alt="--">
                                                            </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                            <div>
                                                                <span class="btn btn-white btn-file">
                                                                    <span class="fileinput-new">Select image</span>
                                                                    <span class="fileinput-exists">Change</span>
                                                                    <input type="file" name="banner2" accept="image/*" <?php if(empty($row->banner2)){echo 'required=""';}?>>
                                                                </span>
                                                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <label for="sec2_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                                                            <input type="text" name="sec2_heading" id="sec2_heading" value="<?= $row->sec2_heading ?>" class="form-control" required>
                                                        </div>
                                                        <div class="clearfix"></div>                            
                                                        <div class="col-md-12">
                                                            <label for="sec2_detail" class="control-label">  Detail <span class="symbol required">*</span></label>
                                                            <textarea name="sec2_detail" rows="3" class="form-control ckeditor"><?= $row->sec2_detail ?></textarea>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="panel panel-primary" data-collapsed="0">
                                                        <div class="panel-heading">
                                                            <div class="panel-title">
                                                                Left Image
                                                            </div>
                                                            <div class="panel-options">
                                                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                                    <img src="<?= !empty($row->sec2_image) ? get_site_image_src("locations/", $row->sec2_image) : base_url('assets/images/no-image.svg') ?>" alt="--">
                                                                </div>
                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                                <div>
                                                                    <span class="btn btn-white btn-file">
                                                                        <span class="fileinput-new">Select image</span>
                                                                        <span class="fileinput-exists">Change</span>
                                                                        <input type="file" name="sec2_image" accept="image/*" <?php if(empty($row->sec2_image)){echo 'required=""';}?>>
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
                                            <div class="col-md-12">
                                                <table class="table table-bordered newTable" id="newTable">
                                                    <tr style="background-color: #eee">
                                                        <th width="10%">Image</th>
                                                        <th width="10%">Order#</th>
                                                        <th width="4%" class="text-center"><a href="javascript:void(0)" id="addNewRowTbl" class="addNewRowTbl"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
                                                    </tr>
                                                    <?php 
                                                    if(empty($this->uri->segment('4')))
                                                    {
                                                        $sec2_left_2s = [];
                                                    }
                                                    else
                                                    {
                                                        $sec2_left_2s = getMultiText($this->uri->segment('4'));
                                                    }
                                                    ?>
                                                    <?php if (count($sec2_left_2s) > 0) { $sec2_left_2s_count = 1; ?>
                                                    <?php foreach ($sec2_left_2s as $sec2_left_2) { ?>
                                                        <tr>
                                                            <td>
                                                                <div id="imgDiv">
                                                                    <input type="file" name="sec2_left_2_image[]" accept="image/*" id="newImgInput" style="display: none;" />
                                                                    <img src="<?php echo getImageSrc('./uploads/locations/'.$sec2_left_2->image); ?>" style="width: 50%; cursor: pointer;" id="newImg"> 
                                                                    <input type="hidden" name="sec2_left_2_pics[]" value="<?= $sec2_left_2->image; ?>"> 
                                                                </div>
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
                                                                    <img src="<?php echo getImageSrc('./uploads/locations/'); ?>" style="width: 50%; cursor: pointer;" id="newImg">
                                                                </div>
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
                            </div>                            
                        </div>
                    </div>

                    
                </div>
                <div class="col-md-12">                
                    <hr class="hr-short">
                    <div class="form-group text-right">
                            <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-lg col-md-3 pull-right"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
<?php else: ?>
    <?php echo showMsg(); ?>
    <?php echo getBredcrum(ADMIN, array('#' => 'Manage Locations')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-list"></i> Manage <strong>Locations</strong></h2>
        </div>
         <div class="col-md-6 text-right">
            <a href="<?= base_url(ADMIN . '/locations/manage'); ?>" class="btn btn-lg btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>
        </div>
    </div>
    <table class="table table-bordered datatable" id="table-1">
        <thead>
            <tr>
                <th width="5%" class="text-center">Sr#</th>
                <th>Image</th>
                <th width="20%">Title</th>
                <th>status</th>
                <th width="15%">created date</th>
                <th width="12%" class="text-center">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($locations) > 0): $count = 0; ?>
                <?php foreach ($locations as $blog):  ?>                    
                    <tr class="odd gradeX">
                        <td class="text-center"><?= ++$count; ?></td>
                        <td>
                            <?php
                                if(empty($blog->image)){
                            ?>
                                    <img src="<?=base_url();?>adminassets/images/no_image.jpg" class="step_img" style="width: 100px">
                            <?php
                                }
                                else{
                            ?>
                                    <img src="<?=get_site_image_src("locations", $blog->image, 'thumb_')?>" class="step_img" style="width: 100px">
                            <?php
                                }
                            ?>
                        </td>
                        <td><b><?= short_text($blog->title,40); ?></b></td>
                        <td><b><?=get_active_status($blog->status)?></b></td>
                       <td><b><?= format_date($blog->created_date,'M d Y h:i:s A'); ?></b></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Action <span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-primary" role="menu">
                                    <li><a href="<?= base_url(ADMIN); ?>/locations/manage/<?= $blog->id; ?>">Edit</a></li>
                                    <?php if(access(10)):?>
                                        <li><a href="<?= base_url(ADMIN); ?>/locations/delete/<?= $blog->id; ?>" onclick="return confirm('Are you sure?');">Delete</a></li>
                                    <?php endif?>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
<?php endif; ?>
<script src="<?= base_url('adminassets/js/jquery-3.4.1.js'); ?>"></script>
<script type="text/javascript">
    $(document).on('click', '.add_recipe', function(e) {
        e.preventDefault();
          $ad = $(".recipe_clone:first").clone();
          $ad.find("input").val("");
          $ad.find("textarea").html("");
          var i=0;      
          $('.recipe_container').append($ad);
          $(".remove_recipe").each(function(){
            console.log($(this));
                $(this).click(function(e){
                    e.preventDefault(); 
                    $(this).parent().remove();
                });
          });
     });
    $('.add_new_cat').click(function(e){
        $(".category_new").toggle();
    });
    jQuery(document).on('change', '#imgInput', function () {

                var preview = jQuery(this).closest("#imgDiv").find("#newImg");
                console.log(preview);
                var oFReader = new FileReader();
                oFReader.readAsDataURL(jQuery(this)[0].files[0]);
                oFReader.addEventListener("load", function () {
                    preview.attr('src',oFReader.result);
                }, false);
    });
    $(document).on('click', '#add_category', function (event) {
            event.preventDefault();
            var cat_name=$("#cat_name").val();
            console.log("<?php echo base_url('admin/locations/add_category'); ?>");
            $.ajax({
                    url: "<?php echo base_url('admin/locations/add_category'); ?>",
                    data: {cat_name:cat_name },
                    type: "post",
                    async: false,
                    dataType: 'json',
                    success: function(response){
                        console.log(response);
                        if(response.status==true){
                            $(".site_categories").append('<li><input type="radio" name="categories" value="'+response.cat_id+'" checked="checked"> <span>'+cat_name+'</span></li>');
                            $('.category_new').hide();
                            $('#cat_name').val("");
                        }
                        
                      },
                      error: function(response)
                   {
                    console.log(response);
                   }
          });
        });
</script>