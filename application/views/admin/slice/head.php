<!DOCTYPE html>
<html lang="en">
    <head>
        <!--Head Start-->
		<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>CM | Brimsol</title>
    
        <!-- Bootstrap framework -->
            <link rel="stylesheet" href="<?php echo base_url(STYLE_ADMIN_DIR);?>/bootstrap.min.css" />
            <link rel="stylesheet" href="<?php echo base_url(STYLE_ADMIN_DIR);?>/bootstrap-responsive.min.css" />
            <?php foreach($css_files as $file):?>
			<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
			<?php endforeach; ?>
        <!-- gebo blue theme-->
            <link rel="stylesheet" href="<?php echo base_url(STYLE_ADMIN_DIR);?>/blue.css" id="link_theme" />
        <!-- breadcrumbs-->
            <link rel="stylesheet" href="<?php echo base_url(LIB_ADMIN_DIR);?>/jBreadcrumbs/css/BreadCrumb.css" />
        <!-- tooltips-->
            <link rel="stylesheet" href="<?php echo base_url(LIB_ADMIN_DIR);?>/qtip2/jquery.qtip.min.css" />
        <!-- colorbox -->
            <link rel="stylesheet" href="<?php echo base_url(LIB_ADMIN_DIR);?>/colorbox/colorbox.css" />    
        <!-- code prettify -->
            <link rel="stylesheet" href="<?php echo base_url(LIB_ADMIN_DIR);?>/google-code-prettify/prettify.css" />    
        <!-- notifications -->
            <link rel="stylesheet" href="<?php echo base_url(LIB_ADMIN_DIR);?>/sticky/sticky.css" />    
        <!-- splashy icons -->
            <link rel="stylesheet" href="img/splashy/splashy.css" />
		<!-- flags -->
            <link rel="stylesheet" href="img/flags/flags.css" />	
		<!-- calendar -->
            <link rel="stylesheet" href="<?php echo base_url(LIB_ADMIN_DIR);?>/fullcalendar/fullcalendar_gebo.css" />
            
        <!-- main styles -->
            <link rel="stylesheet" href="<?php echo base_url(STYLE_ADMIN_DIR);?>/style.css" />
			
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />
	
        <!-- Favicon -->
            <link rel="shortcut icon" href="favicon.ico" />
		
        <!--[if lte IE 8]>
            <link rel="stylesheet" href="css/ie.css" />
            <script src="js/ie/html5.js"></script>
			<script src="js/ie/respond.min.js"></script>
			<script src="lib/flot/excanvas.min.js"></script>
        <![endif]-->
		
		<script>
			//* hide all elements & show preloader
			//document.documentElement.className += 'js';
		</script>
		<!--Head End-->
    </head>
	<body>