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
$t205_default_delete = new t205_default_delete();

// Run the page
$t205_default_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t205_default_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft205_defaultdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft205_defaultdelete = currentForm = new ew.Form("ft205_defaultdelete", "delete");
	loadjs.done("ft205_defaultdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t205_default_delete->showPageHeader(); ?>
<?php
$t205_default_delete->showMessage();
?>
<form name="ft205_defaultdelete" id="ft205_defaultdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t205_default">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t205_default_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t205_default_delete->User_ID->Visible) { // User_ID ?>
		<th class="<?php echo $t205_default_delete->User_ID->headerCellClass() ?>"><span id="elh_t205_default_User_ID" class="t205_default_User_ID"><?php echo $t205_default_delete->User_ID->caption() ?></span></th>
<?php } ?>
<?php if ($t205_default_delete->Field_ID->Visible) { // Field_ID ?>
		<th class="<?php echo $t205_default_delete->Field_ID->headerCellClass() ?>"><span id="elh_t205_default_Field_ID" class="t205_default_Field_ID"><?php echo $t205_default_delete->Field_ID->caption() ?></span></th>
<?php } ?>
<?php if ($t205_default_delete->Nilai->Visible) { // Nilai ?>
		<th class="<?php echo $t205_default_delete->Nilai->headerCellClass() ?>"><span id="elh_t205_default_Nilai" class="t205_default_Nilai"><?php echo $t205_default_delete->Nilai->caption() ?></span></th>
<?php } ?>
<?php if ($t205_default_delete->Keterangan->Visible) { // Keterangan ?>
		<th class="<?php echo $t205_default_delete->Keterangan->headerCellClass() ?>"><span id="elh_t205_default_Keterangan" class="t205_default_Keterangan"><?php echo $t205_default_delete->Keterangan->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t205_default_delete->RecordCount = 0;
$i = 0;
while (!$t205_default_delete->Recordset->EOF) {
	$t205_default_delete->RecordCount++;
	$t205_default_delete->RowCount++;

	// Set row properties
	$t205_default->resetAttributes();
	$t205_default->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t205_default_delete->loadRowValues($t205_default_delete->Recordset);

	// Render row
	$t205_default_delete->renderRow();
?>
	<tr <?php echo $t205_default->rowAttributes() ?>>
<?php if ($t205_default_delete->User_ID->Visible) { // User_ID ?>
		<td <?php echo $t205_default_delete->User_ID->cellAttributes() ?>>
<span id="el<?php echo $t205_default_delete->RowCount ?>_t205_default_User_ID" class="t205_default_User_ID">
<span<?php echo $t205_default_delete->User_ID->viewAttributes() ?>><?php echo $t205_default_delete->User_ID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t205_default_delete->Field_ID->Visible) { // Field_ID ?>
		<td <?php echo $t205_default_delete->Field_ID->cellAttributes() ?>>
<span id="el<?php echo $t205_default_delete->RowCount ?>_t205_default_Field_ID" class="t205_default_Field_ID">
<span<?php echo $t205_default_delete->Field_ID->viewAttributes() ?>><?php echo $t205_default_delete->Field_ID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t205_default_delete->Nilai->Visible) { // Nilai ?>
		<td <?php echo $t205_default_delete->Nilai->cellAttributes() ?>>
<span id="el<?php echo $t205_default_delete->RowCount ?>_t205_default_Nilai" class="t205_default_Nilai">
<span<?php echo $t205_default_delete->Nilai->viewAttributes() ?>><?php echo $t205_default_delete->Nilai->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t205_default_delete->Keterangan->Visible) { // Keterangan ?>
		<td <?php echo $t205_default_delete->Keterangan->cellAttributes() ?>>
<span id="el<?php echo $t205_default_delete->RowCount ?>_t205_default_Keterangan" class="t205_default_Keterangan">
<span<?php echo $t205_default_delete->Keterangan->viewAttributes() ?>><?php echo $t205_default_delete->Keterangan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t205_default_delete->Recordset->moveNext();
}
$t205_default_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t205_default_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t205_default_delete->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$t205_default_delete->terminate();
?>