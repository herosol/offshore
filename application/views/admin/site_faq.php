<?= getBredcrum(ADMIN, array('#' => 'FAQ Page')); ?>
<?= showMsg(); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <h2 class="no-margin"><i class="entypo-window"></i> Update <strong>FAQ Page</strong></h2>
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
                <label for="field-1" class="col-sm-2 control-label "></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary btn-lg col-md-3 pull-right"><i class="fa fa-save"></i> Save</button>
                </div>
            </div>
        </form>
    </div>
</div>