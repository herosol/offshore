<?php if ($this->uri->segment(3) == 'manage'): ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Add/Update HOCL')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-list"></i> Add/Update <strong>HOCL</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?= site_url(ADMIN . '/hocl'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>
        </div>
    </div>
    <div>
        <hr>
        <div class="row col-md-12">
            <form action="" name="frmTestimonial" role="form" class="form-horizontal blog-form" method="post" enctype="multipart/form-data">
                <div class="col-md-12" style="padding: 0px 0px 0px 31px">
                    <div class="row">
                        <div class="col-md-12" style="">   
                            <div class="panel panel-default">
                                <div class="panel-heading" style="padding: 5.5px 10px"><i class="fa fa-eye" aria-hidden="true"></i> Display Options</div>
                                <div class="panel-body" style="padding: 15.5px 0px">
                                    <div class="col-md-7">
                                        <h5>Active</h5>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="btn-group" id="status" data-toggle="buttons">
                                            <label class="btn btn-default btn-on btn-sm <?= ($row->status == 1) ? 'active' : ''; ?>">
                                            <input type="radio" value="1" name="status" <?= ($row->status == 1) ? 'checked="checked"' : ''; ?>><i class="fa fa-check" aria-hidden="true"></i></label>
                                          
                                            <label class="btn btn-default btn-off btn-sm <?= ($row->status == 0) ? 'active' : ''; ?>">
                                            <input type="radio" value="0" name="status" <?= ($row->status == 0) ? 'checked="checked"' : ''; ?>><i class="fa fa-times" aria-hidden="true"></i></label>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="meta_title" class="control-label"> Meta Title <span class="symbol required">*</span></label>
                                    <textarea name="meta_title" id="meta_title" class="form-control" rows="5" required=""><?= $row->meta_title ?></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="meta_description" class="control-label"> Meta Description <span class="symbol required">*</span></label>
                                    <textarea name="meta_description" id="meta_description" class="form-control" rows="5" required=""><?= $row->meta_description ?></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="meta_keywords" class="control-label"> Meta Keywords <span class="symbol required">*</span></label>
                                    <textarea name="meta_keywords" id="meta_keywords" class="form-control" rows="5" required=""><?= $row->meta_keywords ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label">  Title</label>
                                    <input type="text" name="title" value="<?php if (isset($row->title)) echo $row->title; ?>" class="form-control" style="height: 25%; font-size: 25px" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Bullet List</label>
                                    <textarea name="bullet_list" class="form-control ckeditor" required><?php if (isset($row->bullet_list)) echo $row->bullet_list; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Details</label>
                                    <textarea name="details" class="form-control ckeditor" required><?php if (isset($row->details)) echo $row->details; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control ckeditor" required><?php if (isset($row->description)) echo $row->description; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                   
                    <div class="form-group">
                        <div class = "col-md-12">
                            <div class="panel panel-primary" data-collapsed="0">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        Image <br>Notes: Image dimention : 385px x 269px
                                    </div>
                                    <div class="panel-options">
                                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                            <img src="<?= get_site_image_src("hocl", $row->image)?>" alt="--">
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
    <script type="text/javascript">
    
    
    jQuery(document).on('click','.featuredStickerPic',function(e){
        var id = jQuery(this).data('id');
        var p_id = <?= $this->uri->segment('4') ?>;
        var btn = jQuery(this);
        btn.parent('.stickerPicBox').find('btn-info').removeClass();
        jQuery.ajax({
            url:base_url+'admin/hocl/change_featured_img',
            data:{id:id,p_id:p_id},
            method:'POST',
            dataType:'JSON',
            error:function(er){
                console.log(er)
            },
            success:function(sc){
                console.log(sc);
                if(sc.status==1){
                    window.location.reload('<?= current_url()?>') ;
                }
            }
        })
    })
    jQuery(document).on('click','.deleteStickerPic',function(e){
        var id = jQuery(this).data('id');
        var p_id = <?= $this->uri->segment('4') ?>;
        var btn = jQuery(this);
        btn.parent('.stickerPicBox').find('btn-info').removeClass();
        jQuery.ajax({
            url:base_url+'admin/hocl/delete_image',
            data:{id:id,p_id:p_id},
            method:'POST',
            dataType:'JSON',
            error:function(er){
                console.log(er)
            },
            success:function(sc){
                console.log(sc);
                if(sc.status==1){
                    window.location.reload('<?= current_url()?>') ;
                }
            }
        })
    })
</script>
<?php else: ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Manage HOCL')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-list"></i> Manage <strong>HOCL</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?= site_url(ADMIN . '/hocl/manage'); ?>" class="btn btn-lg btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>
        </div>
    </div>
    <table class="table table-bordered datatable" id="table-1">
        <thead>
            <tr>
                <th width="5%" class="text-center">Sr#</th>
                <th width="10%">Photo</th>
                <th>Title</th>
                <th>Details</th>
                <th>Status</th>
                <th width="12%" class="text-center">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($rows) > 0): $count = 0; ?>
                <?php foreach ($rows as $row): ?>
                    <tr class="odd gradeX">
                        <td class="text-center"><?= ++$count; ?></td>
                        <td class="text-center">
                            <div class="icoRound">
                                <img src = "<?= get_site_image_src("hocl", $row->image)?>" width = "100">
                            </div>
                        </td>
                        <td><b><?= $row->title; ?></b></td>
                        <td><?= short_text($row->details); ?></td>
                        <td><?php echo getStatus($row->status); ?></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Action <span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-primary" role="menu">
                                    <li><a href="<?= site_url(ADMIN.'/hocl/manage/'.$row->id); ?>">Edit</a></li>
                                    <li><a href="<?= site_url(ADMIN.'/hocl/delete/'.$row->id); ?>" onclick="return confirm('Are you sure?');">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
<?php endif; ?>