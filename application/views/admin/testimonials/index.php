<?php if ($this->uri->segment(3) == 'manage'): ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Add/Update Testimonial')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-list"></i> Add/Update <strong>Testimonial</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?= site_url(ADMIN . '/testimonials'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>
        </div>
    </div>
    <div>
        <hr>
        <div class="row col-md-12">
            <form action="" name="frmTestimonial" role="form" class="form-horizontal blog-form" method="post" enctype="multipart/form-data">
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
                <div class="form-group">
                    <div class="col-md-6">
                        <label class="control-label" for="name"> Name</label>
                        <input type="text" name="name" id="name" value="<?php if (isset($row->name)) echo $row->name; ?>" class="form-control" autofocus required>
                    </div>
                    <div class="col-md-6">
                        <label class="control-label" for="designation"> Designation</label>
                        <input type="text" name="designation" id="designation" value="<?php if (isset($row->designation)) echo $row->designation; ?>" class="form-control" autofocus required>
                    </div>
                    
                </div>
                
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="control-label" for="detail">  Detail</label>
                        <textarea name="detail" id="detail" rows="8" class="form-control ckeditor" required><?= $row->detail ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                        <div class = "col-md-12">
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
                                            <img src="<?= get_site_image_src("testimonials", $row->image)?>" alt="--">
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
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Manage Testimonials')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-list"></i> Manage <strong>Testimonials</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="javascript:document.getElementById('updateFormOrder').submit();" class="btn btn-lg btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Update</a>
            <a href="<?= site_url(ADMIN . '/testimonials/manage'); ?>" class="btn btn-lg btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>
        </div>
    </div>
<form name="updateFormOrder" id="updateFormOrder" action="<?php echo base_url('admin/testimonials/orderAll'); ?>" method="post">
    <table class="table table-bordered datatable" id="table-1">
        <thead>
            <tr>
                <th width="5%" class="text-center">Sr#</th>
                <th width="10%">Photo</th>
                <th>Testimonial</th>
                <th>Designation</th>
                <th>Status</th>
                <th width="10%">Order</th>
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
                                <img src = "<?= get_site_image_src('testimonials', $row->image, 'thumb_', true); ?>" height = "60">
                            </div>
                        </td>
                        <td><b><?= $row->name ?></b></br>&emsp;<?= short_text($row->detail); ?></td>
                        <td><b><?= $row->designation ?></b></td>
                        <td><?php echo getStatus($row->status); ?></td>
                        <td><input type="number" name="orderid<?=$row->id;?>" value="<?=$row->order_no;?>" class="form-control" size="10" /></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Action <span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-primary" role="menu">
                                    <li><a href="<?= site_url(ADMIN.'/testimonials/manage/'.$row->id); ?>">Edit</a></li>
                                    <li><a href="<?= site_url(ADMIN.'/testimonials/delete/'.$row->id); ?>" onclick="return confirm('Are you sure?');">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</form>
<?php endif; ?>