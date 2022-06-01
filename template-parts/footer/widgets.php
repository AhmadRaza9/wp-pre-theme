<?php
$footer_layout = '4,4,4,4';
$columns = explode(',', $footer_layout);
$footer_bg = 'dark';
$widgets_active = false;
foreach ($columns as $i => $column) {
    if (is_active_sidebar('footer-sidebar-' . ($i + 1))) {
        $widgets_active = true;
    }
}
?>
    <?php if ($widgets_active): ?>
        <div class="o-container">
            <div class="o-row o-row-4 <?php echo (count($columns) > 2) ? 'o-row-flex' : 'o-row-flex-start'; ?> ">
                <?php foreach ($columns as $i => $column) {?>
                    <div class="o-row__column o-row__column--span-12 o-row__column--span-<?php echo $column; ?>@medium">
                        <?php if (is_active_sidebar('footer-sidebar-' . ($i + 1))): ?>
                            <?php dynamic_sidebar('footer-sidebar-' . ($i + 1));?>
                        <?php endif;?>
                    </div>
                <?php }?>
            </div>
        </div>
    <?php endif;?>