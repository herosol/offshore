
  <main>
    <section id="sBanner" style="background:url(<?= get_site_image_src("images", $site_content['image1'], 'thumb_'); ?>)">
      <div class="contain">
      </div>
    </section>

    <section id="location1">
      <!-- <div class="image_bg6">
        <img src="images/sand3.png" alt="">
      </div> -->
      <div class="contain">
        <div class="content">
          <h2><?=$site_content['section2_heading']?></h2>
        </div>
        <div class="flex">
          <?php foreach($locations as $index => $row): ?>
            <div class="col">
              <a href="<?=base_url()?>location-detail/<?=doEncode($row->id)?>" class="inner">
                <div class="image">
                  <img src="<?= get_site_image_src("locations", $row->image, 'thumb_'); ?>" alt="">
                </div>
                <h3><?=$row->title?></h3>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  </main>