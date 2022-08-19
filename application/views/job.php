<main>
    <section id="sBanner" style="background:url(<?= get_site_image_src("images", $site_content['image1'], 'thumb_'); ?>)">
      <div class="contain">
      </div>
    </section>

    <section id="job-search">
      <div class="contain">
        <div class="inner">
          <form method="post" id="job-search-form">
            <div class="form_row row">
              <div class="col-xs-3">
                <div class="form_blk">
                  <select name="job_cat" id="job_cat" class="txtBox">
                    <option value="">Job Type</option>
                    <?php foreach($cats as $index => $row): ?>
                      <option value="<?=$row->id?>"><?= ucfirst($row->title) ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="form_blk">
                  <select name="practice_area_id" id="practice_area_id" class="txtBox">
                    <option value="">Practice Area</option>
                    <?php foreach($areas as $index => $row): ?>
                      <option value="<?=$row->id?>"><?= ucfirst($row->title) ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="form_blk">
                  <select name="experience_level_id" id="experience_level_id" class="txtBox">
                    <option value="">Experience Level</option>
                    <?php foreach($levels as $index => $row): ?>
                      <option value="<?=$row->id?>"><?= ucfirst($row->title) ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="form_blk">
                  <button type="button" class="txtBox search-btn searchCall">Search
                    <i class="fa-solid fa-magnifying-glass"></i>
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>

    <section id="position">
      <div class="contain">
        <div class="content">
          <h2><?=$site_content['section2_heading']?></h2>
        </div>
        <div class="inner-col" id="jobs-listing">
          <?php
            if(count($jobs) === 0):
            ?>
            <div class="col">
              <div class="inner">
                No record found.
              </div>
            </div>
            <?php 
            else:
              foreach($jobs as $index => $j):
            ?>
            <div class="col">
              <div class="inner">
                <div class="col1">
                  <div class="content">
                    <h4><?=$j->title?></h4>
                    <h5><?= ucfirst(str_replace('_',' ', $j->working_type)) ?></h5>
                  </div>
                </div>
                <div class="job_type">
                  <div class="flex">
                    <a href="<?=base_url()?>job-detail/<?=doEncode($j->id)?>" class="webBtn color-1 sm-btn">View and Apply</a>
                  </div>
                </div>
              </div>
            </div>
            <?php
              endforeach;
            endif;
            ?>
        </div>
      </div>
    </section>
  </main>
