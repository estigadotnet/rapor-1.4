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
$t205_default_view = new t205_default_view();

// Run the page
$t205_default_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t205_default_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t205_default_view->isExport()) { ?>
<script>
var ft205_defaultview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft205_defaultview = currentForm = new ew.Form("ft205_defaultview", "view");
	loadjs.done("ft205_defaultview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t205_default_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t205_default_view->ExportOptions->render("body") ?>
<?php $t205_default_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t205_default_view->showPageHeader(); ?>
<?php
$t205_default_view->showMessage();
?>
<form name="ft205_defaultview" id="ft205_defaultview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t205_default">
<input type="hidden" name="modal" value="<?php echo (int)$t205_default_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t205_default_view->User_ID->Visible) { // User_ID ?>
	<tr id="r_User_ID">
		<td class="<?php echo $t205_default_view->TableLeftColumnClass ?>"><span id="elh_t205_default_User_ID"><?php echo $t205_default_view->User_ID->caption() ?></span></td>
		<td data-name="User_ID" <?php echo $t205_default_view->User_ID->cellAttributes() ?>>
<span id="el_t205_default_User_ID">
<span<?php echo $t205_default_view->User_ID->viewAttributes() ?>><?php echo $t205_default_view->User_ID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t205_default_view->Field_ID->Visible) { // Field_ID ?>
	<tr id="r_Field_ID">
		<td class="<?php echo $t205_default_view->TableLeftColumnClass ?>"><span id="elh_t205_default_Field_ID"><?php echo $t205_default_view->Field_ID->caption() ?></span></td>
		<td data-name="Field_ID" <?php echo $t205_default_view->Field_ID->cellAttributes() ?>>
<span id="el_t205_default_Field_ID">
<span<?php echo $t205_default_view->Field_ID->viewAttributes() ?>><?php echo $t205_default_view->Field_ID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t205_default_view->Nilai->Visible) { // Nilai ?>
	<tr id="r_Nilai">
		<td class="<?php echo $t205_default_view->TableLeftColumnClass ?>"><span id="elh_t205_default_Nilai"><?php echo $t205_default_view->Nilai->caption() ?></span></td>
		<td data-name="Nilai" <?php echo $t205_default_view->Nilai->cellAttributes() ?>>
<span id="el_t205_default_Nilai">
<span<?php echo $t205_default_view->Nilai->viewAttributes() ?>><?php echo $t205_default_view->Nilai->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t205_default_view->Keterangan->Visible) { // Keterangan ?>
	<tr id="r_Keterangan">
		<td class="<?php echo $t205_default_view->TableLeftColumnClass ?>"><span id="elh_t205_default_Keterangan"><?php echo $t205_default_view->Keterangan->caption() ?></span></td>
		<td data-name="Keterangan" <?php echo $t205_default_view->Keterangan->cellAttributes() ?>>
<span id="el_t205_default_Keterangan">
<span<?php echo $t205_default_view->Keterangan->viewAttributes() ?>><?php echo $t205_default_view->Keterangan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t205_default_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t205_default_view->isExport()) { ?>
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
$t205_default_view->terminate();
?>