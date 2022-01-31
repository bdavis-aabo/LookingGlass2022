  <footer class="footer red-bg">
    <section class="footer-contents" id="contact">
      <div class="footer-contact">
        <?php echo do_shortcode('[contact-form-7 id="5" title="Footer Contact Form"]') ?>
      </div>

      <div class="footer-directions-container">
        <?php if(is_active_sidebar('footer-directions')): dynamic_sidebar('footer-directions'); endif; ?>
      </div>
    </section>
    <section class="footer-message wood-bg">
      <h3 class="white-txt">A forward-looking Colorado Ranch Community</h3>
      <p class="copyright">&copy; <?php echo date('Y') . ' '; bloginfo('name'); ?>. All Rights Reserved.<br/>
      	All pricing, product specifications, amenities, landscaping and timing is subject to change without prior notice.
        <img src="<?php bloginfo('template_directory') ?>/assets/images/eho-icon.png" alt="Equal Housing Opportunity" class="img-fluid" />
      </p>
    </section>
  </footer>

  <?php wp_footer(); ?>

  <?php if(is_page('location')): ?>
    <script type="text/javascript" src="<?php bloginfo('template_directory') ?>/assets/js/map.min.js"></script>
  <?php endif; ?>
</body>
</html>
