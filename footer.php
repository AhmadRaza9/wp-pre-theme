</div>
<!-- Container Ends Here -->
<?php $footer_bg = 'dark';?>

    <footer class="footer c-footer c-footer--<?php echo $footer_bg; ?>">
        <?php get_template_part('template-parts/footer/widgets');?>
        <?php get_template_part('template-parts/footer/info');?>
    </footer>
<?php wp_footer()?>
</body>
</html>
