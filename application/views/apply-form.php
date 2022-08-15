<!DOCTYPE html>
<html lang="en">

<head>
  <title>Apply Now - Offshore</title>
  <?php require_once('includes/site-master.php'); ?>
</head>

<body>
  <?php require_once('includes/header.php'); ?>
  <section id="sBanner" style="background-image: url('./images/job-detail.jpg');">
    <div class="contain">
      <div class="main-content">
        <h2>Apply Now</h2>
        <h5>Home > Apply</h5>
      </div>
    </div>
  </section>

  <section id="apply-form">
    <div class="image_bg5">
      <img src="images/sand3.png" alt="">
    </div>
    <div class="contain">
      <div class="inner">
        <form method="post" action="">
          <div class="content">
            <h2>Job Title</h2>
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
                <input type="email" name="" id="" class="txtBox">
              </div>
            </div>
            <div class="col-xs-12">
              <div class="form_blk">
                <h6>Pone No</h6>
                <input type="text" name="" id="" class="txtBox">
              </div>
            </div>
            <div class="col-xs-12">
              <div class="form_blk">
                <h6>Upload CV</h6>
                <input type="file" id="selectedFile" style="display: none;">
                <input type="button" value="Choose Document" onclick="document.getElementById('selectedFile').click();"
                  class="file-btn">
              </div>
            </div>
          </div>
          <div class="bTn text-center">
            <button class="webBtn color-1">Submit </button>
          </div>
        </form>
      </div>
    </div>
  </section>
  <?php require_once('includes/footer.php'); ?>
</body>

</html>