
 <section id="sBanner" class="full" style="background:url(<?= get_site_image_src("locations", $location->banner1, 'thumb_'); ?>)">
    <div class="contain">
      <!-- <div class="main-content">
        <h2>Bermuda</h2>
      </div> -->
    </div>
  </section>

  <section id="about3">
    <!-- <div class="image_bg1">
      <img src="images/leaves.png" alt="">
    </div> -->
    <div class="contain">
      <div class="flex">

        <div class="col1">
          <div class="image">
            <img src="<?= get_site_image_src("locations", $location->sec1_image, 'thumb_'); ?>" alt="">
          </div>
        </div>

        <div class="colr">
          <div class="inner-content">
            <h2><?=$location->sec1_heading?></h2>
            <?=$location->sec1_detail?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="video1" class="flexBox" style="background:url(<?= get_site_image_src("locations", $location->banner2, 'thumb_'); ?>)">
    <div class="flexDv">
      <div class="contain">
        <!-- <div class="content text-center">
            <h1 class="heading">Best Day On The Beach</h1>
            <button type="button" class="playBtn popBtn" data-popup="video" data-store="gB58xnCcYp0"><img
                src="images/icon-play.svg" alt=""></button>
          </div> -->
      </div>
    </div>
  </section>

  <section id="about2">
    <!-- <div class="image_bg1">
      <img src="images/leaves.png" alt="">
    </div> -->
    <div class="contain">
      <div class="flex">

        <div class="colr">
          <div class="inner-content">
            <h2><?=$location->sec2_heading?></h2>
            <?=$location->sec2_detail?>
          </div>
        </div>

        <div class="col">
          <div class="image">
            <img src="<?= get_site_image_src("locations", $location->sec2_image, 'thumb_'); ?>" alt="">
          </div>
        </div>

      </div>
    </div>
  </section>

  <section id="thrice">
    <div class="contain">
      <div class="flex">
        <?php foreach($images as $index => $row): ?>
          <div class="col">
            <div class="image">
              <img src="<?= get_site_image_src("locations", $row->image, 'thumb_'); ?>" alt="">
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>