<div class="sidebar-menu fixed">
    <div class="sidebar-menu-inner ps-container ps-active-y">
        <header class="logo-env">
            <!-- logo -->
            <div class="logo">
                <a href="<?=site_url(ADMIN.'/dashboard')?>">
                    <img src="<?= SITE_IMAGES.'/images/'.$adminsite_setting->site_logo ?>" width="120" alt="">
                </a>
            </div>
            <!-- logo collapse icon -->
            <div class="sidebar-collapse">
                <a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                    <i class="entypo-menu"></i>
                </a>
            </div>
            <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
            <div class="sidebar-mobile-menu visible-xs">
                <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
                    <i class="entypo-menu"></i>
                </a>
            </div>
        </header>
        <ul id="main-menu" class="main-menu">
            <li class="opened <?= ($this->uri->segment(2) == 'dashboard') ? 'active' : '' ?>">
                <a href="<?= site_url(ADMIN.'/dashboard') ?>">
                    <i class="entypo-gauge"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>

           
            <!-- <li class="<?= ($this->uri->segment(2) == 'products') ? ' opened  active' : '' ?>">
                <a href="<?php echo base_url(ADMIN . '/products'); ?>">
                    <i class="fa fa-shopping-cart"></i>
                    <span class="title">Products</span>
                </a>
            </li> -->
            <!-- <li class="<?= ($this->uri->segment(2) == 'case_studies') ? ' opened  active' : '' ?>">
                <a href="<?php echo base_url(ADMIN . '/case_studies'); ?>">
                    <i class="fa fa-tasks"></i>
                    <span class="title">Case Studies</span>
                </a>
            </li> -->
            <!-- <li class="<?= ($this->uri->segment(2) == 'hocl') ? ' opened  active' : '' ?>">
                <a href="<?php echo base_url(ADMIN . '/hocl'); ?>">
                    <i class="fa fa-leaf"></i>
                    <span class="title">HOCL</span>
                </a>
            </li> -->
            <!-- <li class="<?= ($this->uri->segment(2) == 'testimonials') ? ' opened  active' : '' ?>">
                <a href="<?php echo base_url(ADMIN . '/testimonials'); ?>">
                    <i class="fa fa-quote-left"></i>
                    <span class="title">Testimonials</span>
                </a>
            </li>
            <li class="<?= ($this->uri->segment(2) == 'team') ? ' opened  active' : '' ?>">
                <a href="<?php echo base_url(ADMIN . '/team'); ?>">
                    <i class="fa fa-user"></i>
                    <span class="title">Team</span>
                </a>
            </li>
            <li class=" <?= ($this->uri->segment('2') == 'faq' ) ? ' opened  active' : '' ?>">
                    <a href="<?= site_url(ADMIN.'/faq') ?>">
                        <i class="fa fa-question"></i>
                        <span class="title">FAQs</span>
                    </a>
            </li>
            <li class=" <?= ($this->uri->segment('2') == 'resources' ) ? ' opened  active' : '' ?>">
                    <a href="<?= site_url(ADMIN.'/resources') ?>">
                        <i class="entypo-camera"></i>
                        <span class="title">Resources</span>
                    </a>
            </li> -->
            <!-- <li class="<?= ($this->uri->segment(2) == 'partners') ? ' opened  active' : '' ?>">
                <a href="<?php echo base_url(ADMIN . '/partners'); ?>">
                    <i class="fa fa-user"></i>
                    <span class="title">Partners</span>
                </a>
            </li> -->
            
           
                <li class=" <?= ($this->uri->segment(2) == 'section' || $this->uri->segment(3) == 'home' || $this->uri->segment(3) == 'about' || $this->uri->segment(3) == 'blog' || $this->uri->segment(3) == 'faq' || $this->uri->segment(3) == 'news' || $this->uri->segment(3) == 'loan_forms' || $this->uri->segment(3) == 'contact') ? ' opened  active' : '' ?>">
                    <a href="<?=base_url(ADMIN.'/section')?>">
                        <i class="fa fa-file  "></i>
                        <span class="title">Manage Pages Content</span>
                    </a>
                </li>
                <!-- <li class=" <?= ($this->uri->segment(2) == 'footer-content') ? ' opened  active' : '' ?>">
                    <a href="<?=base_url(ADMIN.'/footer-content')?>">
                        <i class="fa fa-file  "></i>
                        <span class="title">Manage Footer Content</span>
                    </a>
                </li> -->
            <li class=" <?= ($this->uri->segment(2) == 'job_categories' || $this->uri->segment(2) == 'jobs' || $this->uri->segment(2) == 'practice_area' || $this->uri->segment(2) == 'experience_levels') ? ' opened  active' : '' ?>">
                <a href="javascript:void(0)">
                    <i class="entypo-doc-text"></i>
                    <span class="title">Manage Jobs Listing</span>
                </a>
                <ul>
                    <li class=" <?= ($this->uri->segment(2) == 'job_categories') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/job_categories') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Job Types</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(2) == 'practice_area') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/practice_area') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Job Practice Areas</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(2) == 'experience_levels') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/experience_levels') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Job Experience Levels</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(2) == 'jobs') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/jobs') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Jobs</span>
                        </a>
                    </li>
                </ul>
            </li>
            
            
            <li class="opened <?= ($this->uri->segment(2) == 'contact') ? 'active' : '' ?>">
                <a href="<?= site_url(ADMIN) ?>/contact">
                    <i class="fa fa-envelope"></i>
                    <span class="title">Contact Messages <?=total_rows('contact')?></span>
                </a>
            </li>

            
            <li class="opened <?= ($this->uri->segment(2) == 'settings' && $this->uri->segment(3) == '') ? 'active' : '' ?>">
                <a href="<?= site_url(ADMIN.'/settings') ?>">
                    <i class="fa fa-cogs"></i>
                    <span class="title">Site Settings</span>
                </a>
            </li>
            
            <!-- <li class="opened <?= ($this->uri->segment(2) == 'sub-admin') ? 'active' : '' ?>">
                <a href="<?= site_url(ADMIN.'/sub-admin') ?>">
                    <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                    <span class="title">Sub Admin</span>
                </a>
            </li> -->
            <li class="opened">
                <a href="<?= site_url(ADMIN.'/settings/change') ?>">
                    <i class="fa fa-lock"></i>
                    <span class="title">Change Password</span>
                </a>
            </li>
        </ul>
    </div>
</div>