<?php
$site_info = get_theme_mod('_themename_site_info');
$footer_info_bg = _themename_sanitize_footer_bg(get_theme_mod('_themename_footer_info_bg'));

?>
<?php if ($site_info) {?>
<div class="c-footer--<?php echo $footer_info_bg; ?> c-site-info">
    <div class="o-container">
        <div class="o-row-simple">
            <div class="o-row__column o-row__column--span-12 c-site-info__text">
               <?php
$allowed = array('a' => array(
    'href' => array(),
    'title' => array(),
));

    echo wp_kses($site_info, $allowed);
    ?>
            </div>
        </div>
    </div>
</div>
<?php }?>