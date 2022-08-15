<section class="popup" data-popup="video">
  <div class="tableDv">
    <div class="tableCell">
      <div class="crosBtn"></div>
      <div class="contain">
        <div id="vidBlk" class="inside" id="link-place">
          <iframe id="videoContainer" width="100%" height="515" src="https://www.youtube.com/embed/VFQtSqChlsk" title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
          </video>
        </div>
      </div>
    </div>
  </div>
</section>

<footer style="background:url(<?= get_site_image_src("images", $site_settings->footer_background, 'thumb_'); ?>)">
  <div class="contain">
    <div class="inner">
      <ul class="f-menu">
        <li><a href="<?=base_url()?>">Home</a></li>
        <li><a href="<?=base_url()?>jobs">Jobs</a></li>
        <li><a href="<?=base_url()?>locations">Locations</a></li>
        <li><a href="<?=base_url()?>contact-us">Contact Us</a></li>
      </ul>
      <div class="footer-logo">
        <img src="<?= SITE_IMAGES.'/images/'.$site_settings->site_footer_logo ?>" alt="<?=$site_settings->site_name?>">
      </div>
      <div class="social-icons">
        <ul class="social flex">
          <!-- <li><a href="" target="_blank"><img src="images/social-facebook.svg" alt=""></a></li>
          <li><a href="" target="_blank"><img src="images/social-twitter.svg" alt=""></a></li>
          <li><a href="" target="_blank"><img src="images/social-instagram.svg" alt=""></a></li> -->
          <!-- <li><a href="" target="_blank"><img src="images/linkedin.svg" alt=""></a></li> -->
        </ul>
      </div>
      <div class="copyright relative">
        <div class="inner">
          <p><?=$site_settings->site_copyright?></p>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- footer -->


<!-- Main Js -->
<?php $this->load->view('includes/commonjs'); ?>