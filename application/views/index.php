
  <main>

    <section id="banner" class="flexBox" style="background:url(<?= get_site_image_src("images", $site_content['image1'], 'thumb_'); ?>)">
      <div class="flexDv">
        <div class="contain">
          <div class="main-content">
            <h1><?=$site_content['banner_heading1']?><br>
                <?=$site_content['banner_heading2']?><br>
                <?=$site_content['banner_heading3']?><br>
            </h1>
          </div>
        </div>
      </div>
    </section>

    <section id="about">
      <div class="image_bg1">
        <img src="<?=base_url()?>assets/images/leaves.png" alt="">
      </div>
      <div class="contain">
        <div class="flex">
          <div class="colr">
            <div class="inner-content">
              <h2><?=$site_content['section2_heading']?></h2>
              <?=$site_content['section2_detail']?>
            </div>
          </div>
          <div class="col">

            <div class="image">
              <img src="<?= get_site_image_src("images", $site_content['image2'], 'thumb_'); ?>" alt="">
            </div>

          </div>
        </div>
      </div>
    </section>

    <section id="do">
      <div class="image_bg5">
        <img src="<?=base_url()?>assets/images/sand3.png" alt="">
      </div>
      <div class="contain">
        <!-- <div class="heading">
          <h2>What We Do?</h2>
        </div> -->
        <div class="flex">
          <?php for($i=1; $i<=3; $i++): ?>
            <div class="col">
              <div class="inner">
                <div class="icon">
                  <img src="<?= get_site_image_src("images", $site_content['image'.($i+5)], 'thumb_'); ?>" alt="">
                </div>
                <div class="text">
                  <h3><?=$site_content['section3_heading'.$i]?></h3>
                  <p><?=$site_content['section3_text'.$i]?></p>
                </div>
              </div>
            </div>
          <?php endfor; ?>
        </div>
      </div>
    </section>

    <section id="video" class="flexBox" style="background:url(<?= get_site_image_src("images", $site_content['image9'], 'thumb_'); ?>)">
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

    <section id="bio">
      <!-- <div class="image_bg">
        <img src="images/sand.png" alt="">
      </div> -->
      <div class="contain">
        <div class="flex">
          <div class="col">
            <div class="image">
              <img src="<?= get_site_image_src("images", $site_content['image10'], 'thumb_'); ?>" alt="">
            </div>
          </div>
          <div class="colr">
            <div class="inner-content">
              <h2><?=$site_content['section5_heading']?></h2>
              <?=$site_content['section5_detail']?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="featured-video">
      <div class="image_bg6">
        <img src="<?=base_url()?>assets/images/sand3.png" alt="">
      </div>
      <div class="contain">
        <div class="flex">
          <div class="col">
            <div class="inner">
              <h2><?=$site_content['section6_heading']?></h2>
            </div>
          </div>
          <div class="colr">
            <div class="flex">

              <?php foreach($videos as $index => $video): ?>
                <div class="col1">
                  <div class="inner">
                    <div class="image">
                      <img src="<?= get_site_image_src("images", $video->image, 'thumb_'); ?>">
                      <a class="playIcon popBtn"
                         data-popup="video"
                         data-link="<?=$video->txt1?>"
                      >
                      <i class="fa fa-play"></i></a>
                      <div class="title">
                        <h5><?=$video->title?></h5>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>