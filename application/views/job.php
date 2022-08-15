<main>
    <section id="sBanner" style="background:url(<?= get_site_image_src("images", $site_content['image1'], 'thumb_'); ?>)">
      <div class="contain">
        <!-- <div class="main-content">
          <h2>Job</h2>
          <h5>Home > Job</h5>
        </div> -->
      </div>
    </section>

    <section id="job-search">
      <div class="contain">
        <div class="inner">
          <form method="post">
            <div class="form_row row">
              <div class="col-xs-3">
                <div class="form_blk">
                  <select name="" id="" class="txtBox">
                    <option value="">Job Type</option>
                    <option value="">Buisness</option>
                    <option value="">Private</option>
                    <option value="">Company</option>
                  </select>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="form_blk">
                  <select name="" id="" class="txtBox">
                    <option value="">Practice Area</option>
                    <option value="">Banking Finance</option>
                    <option value="">Corporation</option>
                    <option value="">Business Marketing</option>
                  </select>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="form_blk">
                  <select name="" id="" class="txtBox">
                    <option value="">Experience Level</option>
                    <option value="">Expert level</option>
                    <option value="">Intermediate level</option>
                    <option value="">Entry Level</option>
                  </select>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="form_blk">
                  <a href="" class="txtBox search-btn">Search
                    <i class="fa-solid fa-magnifying-glass"></i>
                  </a>
                </div>
              </div>
              <!-- <a href="" class="search-btn webBtn color-1 sm-btn">Search
                <i class="fa-solid fa-magnifying-glass"></i>
              </a> -->
            </div>
            <!-- <div class="bTn">
              <a href="" class="webBtn color-1 sm-btn">Search</a>
            </div> -->
          </form>
        </div>
      </div>
    </section>

    <section id="position">
      <div class="contain">
        <div class="content">
          <h2><?=$site_content['section2_heading']?></h2>
        </div>
        <div class="inner-col">
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
                  <h5>Remote</h5>
                </div>
              </div>
              <div class="job_type">
                <div class="flex">
                  <!-- <div class="cntnt">
                    <h4>Martinez</h4>
                    <h6>United Sates</h6>
                  </div> -->
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