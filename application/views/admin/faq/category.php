<?php if ($this->uri->segment(3) == 'manage_cat'): ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Add/Update FAQ Categories')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="fa fa-th-large"></i> Add/Update <strong>FAQ Category</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?= site_url(ADMIN . '/faq/categories'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>
        </div>
    </div>
    <div>
        <hr>
        <div class="row col-md-12">
            <form action=""  role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-md-8">
                        <label class="control-label" for="title"> Category Name</label>
                        <input type="text" name="name" id="name" value="<?php if (isset($row->name)) echo $row->name; ?>" class="form-control" required autofocus>
                    </div>
                    
                    
                    <div class="col-md-4">
                        <label class="control-label" for="recommended"> Recommended <span class="symbol required">*</span></label>
                        <select name="recommended" id="recommended" class="form-control">
                            <option value="1" <?php
                            if (isset($row->recommended) && '1' == $row->recommended) {
                                echo 'selected';
                            }
                            ?>>Yes</option>
                            <option value="0" <?php
                            if (isset($row->recommended) && '0' == $row->recommended) {
                                echo 'selected';
                            }
                            ?>>No</option>
                        </select>
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
    <script>
        (function($){
            $(function() {
                $(document).on('change', '#feature', function() {
                    if (this.value == '1')
                        $('.ftur').removeClass('hidden').find('input').prop('disabled', false);
                    else
                        $('.ftur').addClass('hidden').find('input').prop('disabled', true);
                });
            });
        }(jQuery));
    </script>
<?php else: ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Manage FAQ Categories')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="fa fa-th-large"></i> Manage <strong>FAQ Categories</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?= site_url(ADMIN . '/faq/manage_cat'); ?>" class="btn btn-lg btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>
        </div>
    </div>
    <table class="table table-bordered datatable" id="table-1">
        <thead>
            <tr>
                <th width="5%" class="text-center">Sr#</th>
                <th>Category Name</th>
                <th width="12%" class="text-center">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($rows) > 0): $count = 0; ?>
                <?php foreach ($rows as $row): ?>
                    <tr class="odd gradeX">
                        <td class="text-center"><?= ++$count; ?></td>
                        <td><?= $row->name; ?></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Action <span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-primary" role="menu">
                                    <li><a href="<?= site_url(ADMIN.'/faq/manage_cat/'.$row->id);?>">Edit</a></li>
                                    <li><a href="<?= site_url(ADMIN.'/faq/delete_cat/'.$row->id);?>" onclick="return confirm('Are you sure?');">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
<?php endif; ?>