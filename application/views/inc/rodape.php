
	<!-- Vendor -->

	<script src="<?= base_url("assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js");?>"></script>
	<script src="<?= base_url("assets/vendor/bootstrap/js/bootstrap.js");?>"></script>
	<script src="<?= base_url("assets/vendor/nanoscroller/nanoscroller.js");?>"></script>
	<script src="<?= base_url("assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js");?>"></script>
	<script src="<?= base_url("assets/vendor/magnific-popup/magnific-popup.js");?>"></script>
	<script src="<?= base_url("assets/vendor/jquery-placeholder/jquery.placeholder.js");?>"></script>
	<script src="<?= base_url("assets/vendor/select2/select2.min.js");?>"></script>

	<!-- Theme Base, Components and Settings -->
	<script src="<?= base_url("assets/javascripts/theme.js");?>"></script>

	<!-- Datatable -->
	
	<link rel="stylesheet" href="<?= base_url("assets/vendor/jquery-datatables-bs3/assets/css/datatables.css");?>" />
	<script src="<?= base_url("assets/vendor/jquery-datatables/media/js/jquery.dataTables.js");?>"></script>
	<script src="<?= base_url("assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js");?>"></script>
	<script src="<?= base_url("assets/vendor/jquery-datatables-bs3/assets/js/datatables.js");?>"></script>

	<!-- SweetAlert -->
	<script src="https://unpkg.com/sweetalert2@7.15.1/dist/sweetalert2.all.js"></script>
	
	<!-- Theme Custom -->
	<script src="<?= base_url("assets/javascripts/theme.custom.js");?>"></script>
	
	<!-- Theme Initialization Files -->
	<script src="<?= base_url("assets/javascripts/theme.init.js");?>"></script>
	<script src="<?= base_url("assets/javascripts/main.js"); ?>"></script>

	<?php if(isset($_SESSION["msg_ok"])){ ?>
		<script>swal('Bom trabalho','<?= $_SESSION["msg_ok"];?>','success')</script>
		<?php $_SESSION["msg_ok"] = NULL; ?>
	<?php }	?>
	<?php if(isset($_SESSION["msg_error"])){ ?>
		<script>swal('Good job!','<?= $_SESSION["msg_error"];?>','error')</script>
		<?php $_SESSION["msg_error"] = NULL; ?>
	<?php }	?>
</body>