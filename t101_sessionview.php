<?php
namespace PHPMaker2020\p_rapor_1_4;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start();

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$t101_session_view = new t101_session_view();

// Run the page
$t101_session_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_session_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t101_session_view->isExport()) { ?>
<script>
var ft101_sessionview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft101_sessionview = currentForm = new ew.Form("ft101_sessionview", "view");
	loadjs.done("ft101_sessionview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t101_session_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t101_session_view->ExportOptions->render("body") ?>
<?php $t101_session_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t101_session_view->showPageHeader(); ?>
<?php
$t101_session_view->showMessage();
?>
<form name="ft101_sessionview" id="ft101_sessionview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_session">
<input type="hidden" name="modal" value="<?php echo (int)$t101_session_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t101_session_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $t101_session_view->TableLeftColumnClass ?>"><span id="elh_t101_session_id"><?php echo $t101_session_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $t101_session_view->id->cellAttributes() ?>>
<span id="el_t101_session_id">
<span<?php echo $t101_session_view->id->viewAttributes() ?>><?php echo $t101_session_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_session_view->sekolah_id->Visible) { // sekolah_id ?>
	<tr id="r_sekolah_id">
		<td class="<?php echo $t101_session_view->TableLeftColumnClass ?>"><span id="elh_t101_session_sekolah_id"><?php echo $t101_session_view->sekolah_id->caption() ?></span></td>
		<td data-name="sekolah_id" <?php echo $t101_session_view->sekolah_id->cellAttributes() ?>>
<span id="el_t101_session_sekolah_id">
<span<?php echo $t101_session_view->sekolah_id->viewAttributes() ?>><?php echo $t101_session_view->sekolah_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_session_view->user_id->Visible) { // user_id ?>
	<tr id="r_user_id">
		<td class="<?php echo $t101_session_view->TableLeftColumnClass ?>"><span id="elh_t101_session_user_id"><?php echo $t101_session_view->user_id->caption() ?></span></td>
		<td data-name="user_id" <?php echo $t101_session_view->user_id->cellAttributes() ?>>
<span id="el_t101_session_user_id">
<span<?php echo $t101_session_view->user_id->viewAttributes() ?>><?php echo $t101_session_view->user_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_session_view->tanggal_jam->Visible) { // tanggal_jam ?>
	<tr id="r_tanggal_jam">
		<td class="<?php echo $t101_session_view->TableLeftColumnClass ?>"><span id="elh_t101_session_tanggal_jam"><?php echo $t101_session_view->tanggal_jam->caption() ?></span></td>
		<td data-name="tanggal_jam" <?php echo $t101_session_view->tanggal_jam->cellAttributes() ?>>
<span id="el_t101_session_tanggal_jam">
<span<?php echo $t101_session_view->tanggal_jam->viewAttributes() ?>><?php echo $t101_session_view->tanggal_jam->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_session_view->session_value->Visible) { // session_value ?>
	<tr id="r_session_value">
		<td class="<?php echo $t101_session_view->TableLeftColumnClass ?>"><span id="elh_t101_session_session_value"><?php echo $t101_session_view->session_value->caption() ?></span></td>
		<td data-name="session_value" <?php echo $t101_session_view->session_value->cellAttributes() ?>>
<span id="el_t101_session_session_value">
<span<?php echo $t101_session_view->session_value->viewAttributes() ?>><?php echo $t101_session_view->session_value->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t101_session_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t101_session_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$t101_session_view->terminate();
?>