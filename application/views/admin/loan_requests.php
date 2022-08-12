<?php if ($this->uri->segment(3) == 'manage'): ?>
    <?php echo getBredcrum(ADMIN, array('#' => 'View Loan Request')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-chat "></i> Loan Request </h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?php echo base_url('admin/loan_requests'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>
        </div>
    </div>
    <div>
        <div class="clearfix"></div>
        <div class="panel-body">

            <div class="row">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td width="10%"><strong>Name : </strong></td>
                            <td><?php echo ucwords($row->name); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Email : </strong></td>
                            <td><?php echo $row->email; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Address : </strong></td>
                            <td><?php echo $row->country; ?>,<?php echo $row->state; ?>,<?php echo $row->city; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Message : </strong></td>
                            <td><?php echo $row->msg; ?></td>
                        </tr>
                    </tbody>
                </table>
                
                
               
            </div>
            <br>
            <br>
            <br>
        </div>
        <div class="clearfix"></div>
    </div>
<?php else: ?>
    <?php echo showMsg(); ?>
    <?php echo getBredcrum(ADMIN, array("#" => "Loa Requests")); ?>

    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-chat" aria-hidden="true"></i> Manage <strong> Loan Requests</strong></h2>
        </div>
        <div class="col-md-6 text-right">
    <!--            <a href="<?php echo base_url('admin/what/manage'); ?>" class="btn btn-lg btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>-->
        </div>
    </div>
    <br>
    <table class="table table-bordered datatable" id="table-1">
        <thead>
            <tr>
                <th width="5%" class="text-center">Sr#</th>
                <th width="" class="text-center">Name</th>
                <th width="" class="text-center">Email</th>
                <th width="" class="text-center">Message</th>
                <th width="" class="text-center">Date</th>
                <th width="" class="text-center">Status</th>
                <th width="" class="text-center">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($rows) > 0): $count = 0; ?>
                <?php foreach ($rows as $row): ?>
                    <?php $time = strtotime($row->created_date); ?>
                    <tr  class="odd gradeX status_tr">
                        <td class="text-center"><?php echo ++$count; ?></td>
                        <td class="text-center"><?= ucwords($row->name); ?></td>
                        <td class="text-center"><?= $row->email ?></td>
                        <td class="text-center"><?= substr($row->msg,0,70) ?>...</td>
                        <td class="text-center"><?php echo date("D, d M Y", $time); ?></td>
                        <td class="text-center"><?= $row->status == '1' ? '<strong class="text-success">Read</strong>' : '<strong class="text-danger">UnRead</strong>'; ?></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary" data-toggle="dropdown"> Action <span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-primary" role="menu" style="right:0 !important;left:inherit">
                                    <li><a href="<?php echo base_url(); ?>admin/loan_requests/manage/<?php echo $row->id; ?>/<?php echo $row->slug; ?>">View</a></li>
                                    <li><a href="<?php echo base_url(); ?>admin/loan_requests/delete/<?php echo $row->id; ?>" onclick="return confirm('Are you sure?');">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>


<?php endif; ?>