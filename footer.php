</div>
<!-- Container Ends Here -->

<?php
$footer_layout = '3,3,3,3';
$columns = explode(',', $footer_layout);
$footer_bg = 'dark';
?>

<footer class="footer c-footer c-footer--<?php echo $footer_bg; ?>">
    <div class="o-container">
        <div class="o-row o-row-4">
            <?php foreach ($columns as $i => $column) {?>
                <div class="o-row__column o-row__column--span-12 o-row__column--span-<?php echo $column; ?>@medium"></div>
            <?php }?>
        </div>
    </div>
</footer>
<?php wp_footer()?>
</body>
</html>
