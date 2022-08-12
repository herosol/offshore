<?php if ($this->uri->segment(3) == 'manage'): ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Add/Update Resource')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-list"></i> Add/Update <strong>Resource</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?= site_url(ADMIN . '/resources'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>
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
                                <div class="col-md-12">
                                    <label class="control-label">  Title</label>
                                    <input type="text" name="title" value="<?php if (isset($row->title)) echo $row->title; ?>" class="form-control" style="height: 25%; font-size: 25px" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="control-label" for="type"> Type <span class="symbol required">*</span></label>
                            <select name="type" id="type" class="form-control">
                                <option value="video" <?php
                                if (isset($row->type) && 'video' == $row->type) {
                                    echo 'selected';
                                }
                                ?>>Video</option>
                                <option value="pdf" <?php
                                if (isset($row->type) && 'pdf' == $row->type) {
                                    echo 'selected';
                                }
                                ?>>PDF</option>
                            </select>
                        </div>
                    </div>
                   <hr>
                    <div class="form-group <?=(!empty($row->type)) ? ($row->type=='pdf' ? 'hidden' : '') : '' ?>" id="video_type">
                        <div class = "col-md-6">
                            
                            <div class="panel panel-primary" data-collapsed="0">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        Video Poster <br>Notes: Image dimention : 350px x 196px
                                    </div>
                                    <div class="panel-options">
                                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                            <img src="<?= get_site_image_src("resources", $row->image)?>" alt="--">
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="panel panel-primary" data-collapsed="0">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            Video  <br> Maximum Video Size: 20MB
                                        </div>
                                        <div class="panel-options">
                                            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <video loop="" muted="" autoplay="" width="100%" height="150" controls>
                                            <source src="<?=get_site_video('resources',$row->video)?>" type="video/mp4">
                                        </video>
                                        <a class="file-input-wrapper btn  file2 inline btn btn-white" style="height:44px;">
                                            <input type="file" name="video" accept="video/*" class="form-control file2 inline btn btn-white" data-label="<i class='fa fa-upload'></i> Upload Video" style="left: 7.9375px; top: 6px;">
                                        </a>
                                        <input type="hidden" name="video" id="video" value="<?= $row->video; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                    <div class="row  <?=(!empty($row->type)) ? ($row->type=='video' ? 'hidden' : '') : 'hidden' ?>" id="file_type">
                        <div class="col-md-12 margin-bottom-10">
                            <input type="file" name="file" id="file" class="form-control file2 inline btn btn-primary" multiple data-label="<i class='fa fa-upload'></i> Upload PDF" />
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class = "col-md-6">
                                    <div class="panel panel-primary" data-collapsed="0">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                PDF Thumbnail <br>Notes: Image dimention : 350px x 196px
                                            </div>
                                            <div class="panel-options">
                                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                    <img src="<?= get_site_image_src("resources", $row->image)?>" alt="--">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                                <div>
                                                    <span class="btn btn-white btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="pdf_image" accept="image/*">
                                                    </span>
                                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if (!empty($row->file)) {
                                        ?>
                                        <div class="col-md-12 margin-bottom-10">
                                            <div class="stickerPicBox">
                                                <a href="<?=base_url('uploads/resources/'.$row->file)?>" target="_blank" style="font-size: 25px;"><i class="fa fa-file"></i> </a>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                ?>
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
    
    jQuery(document).on('change','#type',function(e){
        let type=jQuery(this).val();
        if(type=='pdf'){
            jQuery("#video_type").addClass("hidden");
            jQuery("#file_type").removeClass("hidden");
        }
        else if(type=='video'){
            jQuery("#file_type").addClass("hidden");
            jQuery("#video_type").removeClass("hidden");
        }
    });
</script>
<?php else: ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Manage Resources')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-list"></i> Manage <strong>Resources</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?= site_url(ADMIN . '/resources/manage'); ?>" class="btn btn-lg btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>
        </div>
    </div>
    <table class="table table-bordered datatable" id="table-1">
        <thead>
            <tr>
                <th width="5%" class="text-center">Sr#</th>
                <th>Title</th>
                <th>Type</th>
                <th>Status</th>
                <th width="12%" class="text-center">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($rows) > 0): $count = 0; ?>
                <?php foreach ($rows as $row): ?>
                    <tr class="odd gradeX">
                        <td class="text-center"><?= ++$count; ?></td>
                        <td><b><?= $row->title; ?></b></td>
                        <td><b><?= ucfirst($row->type) ?></b></td>
                        <td><?php echo getStatus($row->status); ?></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Action <span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-primary" role="menu">
                                    <li><a href="<?= site_url(ADMIN.'/resources/manage/'.$row->id); ?>">Edit</a></li>
                                    <li><a href="<?= site_url(ADMIN.'/resources/delete/'.$row->id); ?>" onclick="return confirm('Are you sure?');">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
<?php endif; ?>