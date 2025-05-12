<?php 
$menu_principal = RDTheme_Helper::nav_menu_args(); ?>
<div class="menu-bottom py-2">
    <div class="container-lg">
        <div id="site-navigation" class="main-navigation">
           <?php wp_nav_menu($menu_principal); ?>
        </div>
    </div>
</div>