<?php /* Template Name: UserManual */ ?>

<?php get_header(); ?>

<!-- bradcam_area_start -->

<div class="bradcam_area utoflat_bg">
  <h3>Website Documentation</h3>
</div>
<!-- bradcam_area_end -->

<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="section_title mb-80 text-center">
                <br><br>
                <h3><span>How to Use</span></h3>
            </div>
        </div>

    </div>

    <div class="col-md-12"><?php echo get_the_content(); ?></div>

</div>

<div class="bottom-line">&nbsp;</div>

<?php get_footer(); ?>