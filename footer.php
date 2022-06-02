</div>
<!-- Container Ends Here -->
<?php $footer_bg = get_theme_mod('_themename_footer_bg');?>

    <footer class="footer c-footer c-footer--<?php echo $footer_bg; ?>" id="footer" role="contentinfo">
        <?php get_template_part('template-parts/footer/widgets');?>
        <?php get_template_part('template-parts/footer/info');?>
    </footer>
<?php wp_footer()?>
</body>
</html>
