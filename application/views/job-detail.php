<main>
    <section id="sBanner" style="background:url(<?= get_site_image_src("images", $site_content['image1'], 'thumb_'); ?>)">
      <div class="contain">
      </div>
    </section>

    <section id="job-detail">
      <div class="contain">
        <div class="flex">
          <div class="col">
            <div class="inner">
              <h2><?=$job->title?></h2>
              <h3>DESCRIPTION</h3>
              <?=$job->description?>
            </div>
            <div class="apply-form">
              <div class="inner">
                <div class="image_bg6">
                  <img src="<?=base_url()?>assets/images/sand3.png" alt="">
                </div>
                <form method="post" action="" id="job-enquire-form" class="frmAjax">
                  <div class="content">
                    <h2>Enquire About This Job</h2>
                  </div>
                  <div class="form_row row">
                    <div class="col-xs-12">
                      <div class="form_blk">
                        <h6>Name</h6>
                        <input type="text" name="name" id="name" class="txtBox">
                      </div>
                    </div>
                    <div class="col-xs-12">
                      <div class="form_blk">
                        <h6>Email</h6>
                        <input type="email" name="email" id="email" class="txtBox">
                      </div>
                    </div>
                    <div class="col-xs-12">
                      <div class="form_blk">
                        <h6>Phone No</h6>
                        <input type="text" name="phone" id="phone" class="txtBox">
                      </div>
                    </div>
                    <div class="col-xs-12">
                      <div class="form_blk">
                        <h6>Message</h6>
                        <textarea class="txtBox" name="msg" id="msg" placeholder="Your Message Here.."
                          spellcheck="false"></textarea>
                      </div>
                    </div>
                    <div class="col-xs-12">
                      <div class="form_blk">
                        <h6>Upload CV</h6>
                        <input type="file" id="selectedFile" name="cv" style="display: none;">
                        <input type="button" value="Choose Document"
                          onclick="document.getElementById('selectedFile').click();" class="file-btn">
                        <span id="file-name"></span>
                      </div>
                    </div>
                  </div>
                  <div class="bTn text-center">
                    <button type="submit" class="webBtn color-1">Submit <i class="spinner hidden"></i></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="colr">
            <div class="outer1">
              <div class="content">
                <h2>Details</h2>
              </div>
              <div class="border">

              <div class="inner1">
                  <div class="col1">
                    <h3>
                      Practice Area</h3>
                  </div>
                  <div class="col2">
                    <h3><?= get_prac_area($job->practice_area_id) ?></h3>
                  </div>
                </div>

                <div class="inner1">
                  <div class="col1">
                    <h3>
                      Jursidiction</h3>
                  </div>
                  <div class="col2">
                    <h3><?= get_jurisdiction_name($job->jurisdiction) ?></h3>
                  </div>
                </div>

                <div class="inner1">
                  <div class="col1">
                    <h3>
                      Job Type</h3>
                  </div>
                  <div class="col2">
                    <h3><?= get_job_cat($job->job_cat) ?></h3>
                  </div>
                </div>



                <div class="inner1">
                  <div class="col1">
                    <h3>
                      Salary/Level</h3>
                  </div>
                  <div class="col2">
                    <h3><?= $job->salary?></h3>
                  </div>
                </div>


                <div class="inner1">
                  <div class="col1">
                    <h3>
                      Date Added</h3>
                  </div>
                  <div class="col2">
                    <h3><?= format_date($job->created_date,'M d Y'); ?></h3>
                  </div>
                </div>



              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>