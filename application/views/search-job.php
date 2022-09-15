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
            <h5><?= get_jurisdiction_name($j->jurisdiction) ?></h5>
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