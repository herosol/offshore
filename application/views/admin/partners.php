<?php if ($this->uri->segment(3) == 'manage'): ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Add/Update Partners')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-list"></i> Add/Update <strong>Partners</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?= base_url(ADMIN . '/partners'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>
        </div>
    </div>
    <div>
        <hr>
        <div class="row col-md-12">
            <form action="" name="frmGuide Categoreis" role="form" class="form-horizontal blog-form" method="post" enctype="multipart/form-data">
                 <div class="form-group">
                    <div class="col-md-8">
                        <label class="control-label" for="title"> Text</label>
                        <input type="text" name="alt" id="alt" value="<?php if (isset($row->alt)) echo $row->alt; ?>" class="form-control" autofocus required>
                    </div>
                    <div class="col-md-4">
                        <label class="control-label" for="status"> Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1" <?php
                            if (isset($row->status) && '1' == $row->status) {
                                echo 'selected';
                            }
                            ?>>Active</option>
                            <option value="0" <?php
                            if (isset($row->status) && '0' == $row->status) {
                                echo 'selected';
                            }
                            ?>>InActive</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                 <div class="col-md-12">
                    <div class="panel panel-primary" data-collapsed="0">
                      <div class="panel-heading">
                        <div class="panel-title">
                          Image <br>Notes: Image dimention : 200px x 90px
                        </div>
                        <div class="panel-options">
                          <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                        </div>
                      </div>
                      <div class="panel-body">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                          <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                            <img src="<?= !empty($row->image) ? get_site_image_src("partners", $row->image) : base_url('assets/images/no-image.svg') ?>" alt="--">
                          </div>
                          <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                          <div>
                            <span class="btn btn-black btn-file">
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
                	
              <hr>			
                <div class="form-group text-right">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-lg col-md-3 pull-right"><i class="fa fa-save"></i> Save</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
<?php else: ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Manage Partners')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-list"></i> Manage <strong>Partners</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?= base_url(ADMIN . '/partners/manage'); ?>" class="btn btn-lg btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>
        </div>
    </div>
    <table class="table table-bordered datatable" id="table-1">
        <thead>
            <tr>
                <th width="5%" class="text-center">Sr#</th>
                <th width="5%">Image</th>
                <th>Text</th>
                <th>Status</th>
                <th width="12%" class="text-center">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($rows) > 0): $count = 0; ?>
                <?php foreach ($rows as $row): ?>
                    <tr class="odd gradeX">
                        <td class="text-center"><?= ++$count; ?></td>
                        <td><img src="<?= !empty($row->image) ? get_site_image_src("partners", $row->image) : base_url('assets/images/no-image.svg') ?>" alt="--" class="image" width = "100"></td>
                        <td class="text-center"><?= $row->alt; ?></td>
                        <td class="text-center"><?= getStatus($row->status); ?></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Action <span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-primary" role="menu">
                                    <li><a href="<?= site_url(ADMIN.'/partners/manage/'.$row->id); ?>">Edit</a></li>
                                    <?php if(access(10)):?>
                                        <li><a href="<?= site_url(ADMIN.'/partners/delete/'.$row->id); ?>" onclick="return confirm('Are you sure?');">Delete</a></li>
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