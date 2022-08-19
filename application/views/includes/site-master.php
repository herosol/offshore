<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <?php
        $page_title = empty($site_content['page_title']) ? $page_title." - ".$site_settings->site_name : $site_content['page_title'] . ' - ' . $site_settings->site_name;
        $meta_description = empty($site_content['meta_description']) ? $meta_description : $site_content['meta_description'];
        $meta_title = empty($site_content['meta_title']) ? $meta_title : $site_content['meta_title'];
        $meta_keywords = empty($site_content['meta_keywords']) ? $meta_keywords : $site_content['meta_keywords'];
        $meta_image = empty($site_content['meta_image']) ? SITE_IMAGES . '/images/' . $site_settings->site_thumb . '?v-' . $site_settings->site_version : $site_content['meta_image'];
        ?>
        <meta name="title" content="<?= $page_title ?>">
        <meta name="description" content="<?= $meta_description ?>">
        <meta name="keywords" content="<?= $meta_keywords ?>">
        <meta property="og:type" content="website">
        <meta property="og:url" content="<?= currentURL() ?>">
        <meta property="og:title" content="<?= $meta_title ?>">
        <meta property="og:description" content="<?= $meta_description ?>">
        <meta property="og:image" content="<?= $meta_image ?>">
        <meta property="twitter:card" content="thumbnail">
        <meta property="twitter:url" content="<?= currentURL() ?>">
        <meta property="twitter:title" content="<?= $meta_title ?>">
        <meta property="twitter:description" content="<?= $meta_description ?>">
        <meta property="twitter:image" content="<?= $meta_image ?>">

        <!-- Css files -->
        <!-- Bootstrap Css -->
        <link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
        <!-- owl carousel -->
        <link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/css/owl.carousel.min.css">
        <link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/css/owl.theme.default.min.css">
        <!--  fonts css   -->
        <link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/css/all.css">
        <link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/css/font-icon.min.css">
        <!-- Main Css -->
        <link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/css/main.css?v=49">
        <!-- Media-Query Css -->
        <link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/css/responsive.css?v=49">
        <!-- Favicon -->
        <link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/css/aos.css">
        <link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/css/toastr.min.css">

        <title><?= $page_title  ?></title>
        <link type="image/png" rel="icon" href="<?= SITE_IMAGES . '/images/' . $site_settings->site_icon . '?v-' . $site_settings->site_version ?>">
        <!-- JS Files -->
        <script type="text/javascript">
            var base_url = "<?= base_url() ?>";
            let page_name="<?=$this->uri->segment(1)?>";
        </script>
        <body>
          <?php
              if($page_404!=true){
                $this->load->view('includes/header');
              }		    
          ?>
          <?php echo showMsg(); ?>
              <?php $this->load->view($pageView); ?>
          <?php
          if($page_404!=true)
            $this->load->view('includes/footer');
          ?>
        </body>
        <script>
          $(document).on('click', '.searchCall', function(e) 
          {
            showProducts();
          });

          var xhr = new window.XMLHttpRequest();
          var ajaxSearch = false;

          function showProducts() 
          {
              if(xhr && xhr.readyState != 4) {
                  xhr.abort();
              }
              if(ajaxSearch)
                  return;

              let formData = $("#job-search-form").serializeArray();
              $.ajax({
                  url: '<?=base_url('page/search_jobs')?>',
                  type: "POST",
                  data: $.param(formData),
                  success: function (rs) {
                      let data = JSON.parse(rs);
                      $('#jobs-listing').html(data.html);
                  },
                  error: function (data) {
                      console.log(data);
                  },
                  complete: function (data) {
                      ajaxSearch = false;
                  },
                  xhr : function(){
                      return xhr;
                  }
              }); 
          }
          // END SEARCH BLOCK

          $("#selectedFile").on("change", function(e){
            $('#file-name').html(e.target.files[0].name);
          })
        </script>
</html>