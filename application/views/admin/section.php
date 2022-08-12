<?php echo getBredcrum('',array('#' => 'Manage Pages / Page Sections')); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <h2 class="no-margin"><i class="fa fa-bars"></i> <strong>Pages / Page Sections</strong></h2>
    </div>
    <div class="col-md-6 text-right">
        <!-- <ul class="list-inline links-list pull-right">
            <li class="dropdown language-selector">
                <span style="font-size: 16px;font-weight:bold">Change Language: </span>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true" aria-expanded="true"> 
                    <img src="<?= ($this->session->userdata('admin_lang')=='eng') ? base_url('assets/images/flag-en.svg') : base_url('assets/images/flag-de.svg')  ?>" width="20" height="20"> 
                </a>
                <ul class="dropdown-menu pull-right">
                    <li class="<?=($this->session->userdata('admin_lang')=='eng') ? 'active' : ''?>"> 
                        <a href="<?=base_url(ADMIN."/index/selectLang/eng")?>"> 
                            <img src="<?= base_url('assets/images/flag-en.svg'); ?>" width="20" height="20"> 
                            <span>English</span> 
                        </a> 
                    </li>
                    <li class="<?=($this->session->userdata('admin_lang')=='gr') ? 'active' : ''?>"> 
                        <a href="<?=base_url(ADMIN."/index/selectLang/gr")?>"> 
                            <img src="<?= base_url('assets/images/flag-de.svg'); ?>" width="20" height="20"> 
                            <span>German</span> 
                        </a> 
                    </li>
                </ul>
            </li>
        </ul> -->
    </div>
</div>

<br>
<table class="table table-bordered datatable" id="table-1">
    <thead>
        <tr>
           
            <th width="2%" class="text-center">Sr#</th>
            <th width="20%" class="text-left">Name (Page/Page Section)</th>
            <th width="20%" class="text-left">Type</th>
            <th width="10%" class="text-center">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <tr  class="odd gradeX status_tr">
            <td class="text-center"><strong>1</strong></td>
            <td class="text-left"><strong>Home</strong></td>
            <td class="text-left">Page</td>
            <td class="text-center">
                <div class="btn-group">
                    <a href="<?= base_url(ADMIN) ?>/sitecontent/home" class="btn btn-primary"> <i class="glyphicon glyphicon-edit" style="color: #fff" aria-hidden="true"></i> Edit Page </a>
                </div>
            </td>
        </tr>
        <tr  class="odd gradeX status_tr">
            <td class="text-center"><strong>2</strong></td>
            <td class="text-left"><strong>Jobs</strong></td>
            <td class="text-left">Page</td>
            <td class="text-center">
                <div class="btn-group">
                    <a href="<?= base_url(ADMIN) ?>/sitecontent/jobs" class="btn btn-primary"> <i class="glyphicon glyphicon-edit" style="color: #fff" aria-hidden="true"></i> Edit Page </a>
                </div>
            </td>
        </tr>
        <tr  class="odd gradeX status_tr">
            <td class="text-center"><strong>3</strong></td>
            <td class="text-left"><strong>Locations</strong></td>
            <td class="text-left">Page</td>
            <td class="text-center">
                <div class="btn-group">
                    <a href="<?= base_url(ADMIN) ?>/sitecontent/locations" class="btn btn-primary"> <i class="glyphicon glyphicon-edit" style="color: #fff" aria-hidden="true"></i> Edit Page </a>
                </div>
            </td>
        </tr>
        <tr  class="odd gradeX status_tr">
            <td class="text-center"><strong>4</strong></td>
            <td class="text-left"><strong>Contact</strong></td>
            <td class="text-left">Page</td>
            <td class="text-center">
                <div class="btn-group">
                    <a href="<?= base_url(ADMIN) ?>/sitecontent/contact" class="btn btn-primary"> <i class="glyphicon glyphicon-edit" style="color: #fff" aria-hidden="true"></i> Edit Page </a>
                </div>
            </td>
        </tr>
    </tbody>
</table>
<br>
<br>
<br>
