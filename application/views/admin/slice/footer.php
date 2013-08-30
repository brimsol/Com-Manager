<?php if(isset($js_files)){?>
<?php foreach($js_files as $file):?>
<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<?php }else{ ?>
<script src="<?php echo base_url(JS_ADMIN_DIR); ?>/jquery.min.js"></script>
<?php } ?>
<?php
if (isset($dropdown_setup)) {
	$this -> load -> view('admin/dependent_dropdown', $dropdown_setup);
}
?>
<!-- smart resize event -->
<script src="<?php echo base_url(JS_ADMIN_DIR); ?>/jquery.debouncedresize.min.js"></script>
<!-- hidden elements width/height -->
<script src="<?php echo base_url(JS_ADMIN_DIR); ?>/jquery.actual.min.js"></script>
<!-- js cookie plugin -->
<script src="<?php echo base_url(JS_ADMIN_DIR); ?>/jquery.cookie.min.js"></script>
<!-- main bootstrap js -->
<script src="<?php echo base_url(JS_ADMIN_DIR); ?>/bootstrap.min.js"></script>
<!-- tooltips -->
<script src="<?php echo base_url(LIB_ADMIN_DIR); ?>/qtip2/jquery.qtip.min.js"></script>
<!-- jBreadcrumbs -->
<script src="<?php echo base_url(LIB_ADMIN_DIR); ?>/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js"></script>
<!-- lightbox -->

<!-- fix for ios orientation change -->
<script src="<?php echo base_url(JS_ADMIN_DIR); ?>/ios-orientationchange-fix.js"></script>
<!-- scrollbar -->
<script src="<?php echo base_url(LIB_ADMIN_DIR); ?>/antiscroll/antiscroll.js"></script>
<script src="<?php echo base_url(LIB_ADMIN_DIR); ?>/antiscroll/jquery-mousewheel.js"></script>
<!-- common functions -->
<script src="<?php echo base_url(JS_ADMIN_DIR); ?>/gebo_common.js"></script>
<!-- touch events for jquery ui-->
<script src="<?php echo base_url(JS_ADMIN_DIR); ?>/forms/jquery.ui.touch-punch.min.js"></script>
<!-- multi-column layout -->
<script src="<?php echo base_url(JS_ADMIN_DIR); ?>/jquery.imagesloaded.min.js"></script>
<script src="<?php echo base_url(JS_ADMIN_DIR); ?>/jquery.wookmark.js"></script>
<!-- responsive table -->
<script src="<?php echo base_url(JS_ADMIN_DIR); ?>/jquery.mediaTable.min.js"></script>
<!-- small charts -->
<script src="<?php echo base_url(JS_ADMIN_DIR); ?>/jquery.peity.min.js"></script>
<!-- charts -->
<script src="<?php echo base_url(LIB_ADMIN_DIR); ?>/flot/jquery.flot.min.js"></script>
<script src="<?php echo base_url(LIB_ADMIN_DIR); ?>/flot/jquery.flot.resize.min.js"></script>
<script src="<?php echo base_url(LIB_ADMIN_DIR); ?>/flot/jquery.flot.pie.min.js"></script>
<!-- calendar -->
<script src="<?php echo base_url(LIB_ADMIN_DIR); ?>/fullcalendar/fullcalendar.min.js"></script>
<!-- sortable/filterable list -->
<script src="<?php echo base_url(LIB_ADMIN_DIR); ?>/list_js/list.min.js"></script>
<script src="<?php echo base_url(LIB_ADMIN_DIR); ?>/list_js/plugins/paging/list.paging.min.js"></script>
<!-- dashboard functions -->
<script src="<?php echo base_url(JS_ADMIN_DIR); ?>/gebo_dashboard.js"></script>

<script>
	$(document).ready(function() {
		//* show all elements & remove preloader
		setTimeout('$("html").removeClass("js")', 1000);
		alert('sdsd');
	}); 
</script>
</body>
</html> 