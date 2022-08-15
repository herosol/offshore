<header class="ease">
  <div class="contain">
    <div class="logo ease">
      <a href="<?=base_url()?>">
          <img src="<?= SITE_IMAGES.'/images/'.$site_settings->site_logo ?>" alt="<?=$site_settings->site_name?>">
      </a>
    </div>
    <div class="toggle"><span></span></div>
    <nav class="ease">
      <ul id="nav">
        <li class=" <?php if($page == "index" || $page == "") { echo 'active'; } ?>">
          <a href="<?=base_url()?>">Home</a>
        </li>
        <li class=" <?php if ($page == "jobs") { echo 'active'; } ?>">
          <a href="<?=base_url()?>jobs">Jobs</a>
        </li>
        <li class=" <?php if ($page == "location") { echo 'active'; } ?>">
          <a href="<?=base_url()?>locations">Locations</a>
        </li>
        <li class=" <?php if ($page == "") { echo 'active'; } ?>">
          <a href="<?=base_url()?>contact-us" class="webBtn color-1 sm-btn">Contact Us</a>
        </li>
      </ul>
    </nav>
    <div class="clearfix"></div>
  </div>
</header>
<!-- header -->