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

if (!empty($PAGE->theme->settings->tagline)) {
    $tagline = '<p>'.$PAGE->theme->settings->tagline.'</p>';
} else {
    $tagline = '<!-- There was no custom tagline set -->';
}
if (!empty($PAGE->theme->settings->logo)) {
    $logourl = $PAGE->theme->settings->logo;
}

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes() ?>>
<head>
    <title><?php echo $PAGE->title ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme')?>" />
    <meta name="description" content="<?php p(strip_tags(format_text($SITE->summary, FORMAT_HTML))) ?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
    <script type="text/javascript" src="<?php echo $CFG->wwwroot?>/theme/arialist/layout/prefixfree.min.js"></script>
</head>

<body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses.' '.join(' ', $bodyclasses)) ?>">
<?php echo $OUTPUT->standard_top_of_body_html() ?>

<?php if ($hascustommenu) { ?>
<div id="custommenu"><?php echo $custommenu; ?></div>
<?php } ?>

<div id="page">

    <div id="wrapper" class="clearfix">

<!-- START OF HEADER -->

        <div id="page-header">
            <div id="page-header-wrapper" class="wrapper clearfix">

                <div id="header-left">
                    <img src="<?php echo $OUTPUT->pix_url('logo-amaca-vertical', 'theme')?>" alt="AMACA - UCEVA"/>
                </div>
                <div class="headermenu">
                    <?php
                        echo $OUTPUT->login_info();
                        echo $OUTPUT->lang_menu();
                        echo $PAGE->headingmenu;
                    ?>

        <a href="http://www.uceva.edu.co/" title="UCEVA Unidad Cenral del Valle del Cauca" target="_blank" >
                <img src="<?php echo $OUTPUT->pix_url('uceva-logo', 'theme')?>" alt="UCEVA Unidad Cenral del Valle del Cauca" />
        </a>

                </div>
            </div>
        </div>

<!-- END OF HEADER -->

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

    </div> <!-- END #wrapper -->

<!-- START OF FOOTER -->
    <div id="page-footer" class="wrapper">
            
        <div id="logo-footer"><a href="http://www.uceva.edu.co/" title="UCEVA Unidad Cenral del Valle del Cauca" target="_blank" >
          <img src="<?php echo $OUTPUT->pix_url('uceva-logo-blanco', 'theme')?>" alt="UCEVA Unidad Cenral del Valle del Cauca" />
        </a></div>
        
        <div class="contacto_info">
        Unidad Central del Valle del Cauca<br>
		Carrera 27 A No. 48-144 Kilómetro 1 Salida Sur<br>
		Tuluá - Colombia<br>
		Teléfono: 2242202 ext.162  Fax: 2259051<br>
		E-mail: <a href="mailto:bienestar@uceva.edu.co" target="_blank">bienestar@uceva.edu.co</a></div>
		</div>

<!-- END OF FOOTER -->

</div> <!-- END #page -->

<?php echo $OUTPUT->standard_end_of_body_html() ?>
</body>
</html>