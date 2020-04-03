<!--
Header style 3
-->
<div class="td-header-wrap td-header-style-3">
    <div class="td-top-menu-full">
        <div class="td-header-row td-header-top-menu td-make-full">
            <?php td_api_top_bar_template::_helper_show_top_bar() ?>
        </div>
    </div>

    <div class="td-header-container">
        <div class="td-header-row td-header-header">
            <div class="td-header-sp-logo">
                <?php require_once('logo-h1.php');?>
            </div>
            <div class="td-header-sp-rec">
                <?php require_once('ads.php'); ?>
            </div>
        </div>

        <div class="td-header-menu-wrap">
            <div class="td-header-row td-header-main-menu">
                <?php require_once('header-menu.php');?>
            </div>
        </div>
    </div>
</div>