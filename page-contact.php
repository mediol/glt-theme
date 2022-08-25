<?php
/*
Template Name: Contact us
*/
?>

<?php get_header('home'); ?>

<!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="map-form">
		<iframe style="border:0; width: 100%; height: 100%;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3565.457937324889!2d-80.05782468496024!3d26.665832883234582!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d8d790e0510ea9%3A0x9764ada799f38442!2s5303%20S%20Dixie%20Hwy%2C%20West%20Palm%20Beach%2C%20FL%2033405!5e0!3m2!1sen!2sus!4v1644598321566!5m2!1sen!2sus" frameborder="0" allowfullscreen=""></iframe>
    </div>
    <div class="contact-form">
      <div class="contact-form-inner">
        <h2><?php echo get_the_title(); ?></h2>
        <?php echo do_shortcode( '[contact-form-7 id="71" title="Contact-Us-form"]' ); ?>
      </div>
    </div>


  </section>
<!-- End Contact Section -->

<?php get_footer(); ?>