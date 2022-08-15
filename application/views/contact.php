
  <main>
    <section id="sBanner" style="background:url(<?= get_site_image_src("images", $site_content['image1'], 'thumb_'); ?>)">
      <div class="contain">
        <!-- <div class="main-content">
          <h2>Contact Us</h2>
          <h5>Home > Contact</h5>
        </div> -->
      </div>
    </section>

    <section id="contact-pg">
      <div class="contain">
        <div class="flex">
          <div class="col">
            <div class="inner">
              <h2><?=$site_content['section2_left_heading']?></h2>
              <p><?=$site_content['section2_left_tagline']?></p>
              <?php foreach($left_1 as $index => $row): ?>
                <p><strong><?=$row->title?>:</strong> <?=$row->detail?></p>
              <?php endforeach; ?>
              <div class="social-icons">
                <ul class="social flex">
                  <?php foreach($left_2 as $index => $row): ?>
                    <li><a href="<?=$row->title?>" target="_blank"><img src="<?= get_site_image_src("images", $row->image, ''); ?>" alt=""></a></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>
          </div>
          <div class="colr">
            <h2><?=$site_content['section2_right_heading']?></h2>
            <form action="" method="post" class="frmAjax" id="">
              <div class="form_row row">
                <div class="col-xs-6">
                  <div class="form_blk">
                    <h6><?=$site_content['first_field_heading']?> <sup>*</sup></h6>
                    <input type="text" name="name" id="name" class="txtBox">
                  </div>
                </div>
                <div class="col-xs-6">
                  <div class="form_blk">
                    <h6><?=$site_content['second_field_heading']?> <sup>*</sup></h6>
                    <input type="text" name="email" id="email" class="txtBox">
                  </div>
                </div>
                <div class="col-xs-6">
                  <div class="form_blk">
                    <h6><?=$site_content['third_field_heading']?> <sup>*</sup></h6>
                    <input type="text" name="phone" id="phone" class="txtBox">
                  </div>
                </div>
                <div class="col-xs-6">
                  <div class="form_blk">
                    <h6><?=$site_content['fourth_field_heading']?> <sup>*</sup></h6>
                    <input type="text" name="country" id="country" class="txtBox">
                  </div>
                </div>

                <div class="col-xs-12">
                  <div class="form_blk">
                    <h6><?=$site_content['fifth_field_heading']?> <sup>*</sup></h6>
                    <textarea class="txtBox" name="msg" id="msg"></textarea>
                  </div>
                </div>
              </div>
              <div class="bTn text-center">
                <button class="webBtn color-1"><?=$site_content['button_heading']?><i class="spinner hidden"></i></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- <section id="map">
      <div class="contain-fluid">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d255281.22544738487!2d103.70415903570171!3d1.3139961236575501!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da11238a8b9375%3A0x887869cf52abf5c4!2sSingapore!5e0!3m2!1sen!2snl!4v1656279195745!5m2!1sen!2snl"
          width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </section> -->
  </main>