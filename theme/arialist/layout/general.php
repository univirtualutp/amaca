<?php

$hasheading = ($PAGE->heading);
$hasnavbar = (empty($PAGE->layout_options['nonavbar']) && $PAGE->has_navbar());
$hasfooter = (empty($PAGE->layout_options['nofooter']));
$hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);
$showsidepost = ($hassidepost && !$PAGE->blocks->region_completely_docked('side-post', $OUTPUT));

$custommenu = $OUTPUT->custom_menu();
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));

$bodyclasses = array();
if ($showsidepost) {
    $bodyclasses[] = 'side-post-only';
} else if (!$showsidepost) {
    $bodyclasses[] = 'content-only';
}
if ($hascustommenu) {
    $bodyclasses[] = 'has-custom-menu';
}

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes() ?>>
<head>
    <title><?php echo $PAGE->title ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme')?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
    <script type="text/javascript" src="<?php echo $CFG->wwwroot?>/theme/arialist/layout/prefixfree.min.js"></script>
</head>

<body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses.' '.join(' ', $bodyclasses)) ?>">
<?php echo $OUTPUT->standard_top_of_body_html() ?>

<?php if ($hascustommenu) { ?>
<div id="custommenu"><?php echo $custommenu; ?></div>
<?php } ?>

<div id="page">

    <?php if ($hasheading || $hasnavbar) { ?>
       <div id="wrapper" class="clearfix">

<!-- START OF HEADER -->

            <div id="page-header" class="inside">
                <div id="page-header-wrapper" class="wrapper clearfix">
                    <?php if ($hasheading) { ?>
                        <div id="header-left">
                            <img src="<?php echo $OUTPUT->pix_url('logo-amaca-vertical', 'theme')?>" alt="AMACA - UCEVA"/>
                        </div>
                        <div class="headermenu"><?php
                            echo $OUTPUT->login_info();
                                if (!empty($PAGE->layout_options['langmenu'])) {
                                    echo $OUTPUT->lang_menu();
                                }
                            echo $PAGE->headingmenu ?>
        <a href="http://www.uceva.edu.co/" title="UCEVA Unidad Cenral del Valle del Cauca" target="_blank" >
                <img src="<?php echo $OUTPUT->pix_url('uceva-logo', 'theme')?>" alt="UCEVA Unidad Cenral del Valle del Cauca" />
        </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php if ($hasnavbar) { ?>
                <div class="navbar">
                    <div class="wrapper clearfix">
                        <div class="breadcrumb"><?php echo $OUTPUT->navbar(); ?></div>
                        <div class="navbutton"> <?php echo $PAGE->button; ?></div>
                    </div>
                </div>
            <?php } ?>

<!-- END OF HEADER -->

    <?php } ?>


<!-- START OF CONTENT -->

        <div id="page-content-wrapper" class="wrapper clearfix">
            <div id="page-content">
                <div id="region-main-box">
                    <div id="region-post-box">

                        <div id="region-main-wrap">
                            <div id="region-main">
                                <div class="region-content">
                                    <?php echo $OUTPUT->main_content() ?>
                                </div>
                            </div>
                        </div>

                        <?php if ($hassidepost) { ?>
                        <div id="region-post" class="block-region">
                            <div class="region-content">
                                <?php echo $OUTPUT->blocks_for_region('side-post') ?>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>

<!-- END OF CONTENT -->

    <?php if ($hasheading || $hasnavbar) { ?>
        </div>
    <?php } ?>

<!-- START OF FOOTER -->

        <?php if ($hasfooter) { ?>
            <div id="page-footer" class="wrapper">
            
        <div id="logo-footer"><a href="http://www.uceva.edu.co/" title="UCEVA Unidad Cenral del Valle del Cauca" target="_blank" >
          <img src="<?php echo $OUTPUT->pix_url('uceva-logo-blanco', 'theme')?>" alt="UCEVA Unidad Cenral del Valle del Cauca" />
        </a></div>
        
        <div class="contacto_info">Unidad Central del Valle del Cauca<br>
          Carrera 27 A No. 48-144 Kilómetro 1 Salida Sur Tuluá - Colombia<br>
          Teléfono: 2242202 ext. 162  Fax: 2259051<br>
          E-mail: <a href="mailto:bienestar@uceva.edu.co" target="_blank">bienestar@uceva.edu.co</a></div>
</div>
        <?php } ?>

</div>
<?php echo $OUTPUT->standard_end_of_body_html() ?>
</body>
</html>