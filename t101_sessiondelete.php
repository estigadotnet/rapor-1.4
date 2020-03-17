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
$t101_session_delete = new t101_session_delete();

// Run the page
$t101_session_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_session_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft101_sessiondelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft101_sessiondelete = currentForm = new ew.Form("ft101_sessiondelete", "delete");
	loadjs.done("ft101_sessiondelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t101_session_delete->showPageHeader(); ?>
<?php
$t101_session_delete->showMessage();
?>
<form name="ft101_sessiondelete" id="ft101_sessiondelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_session">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t101_session_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t101_session_delete->id->Visible) { // id ?>
		<th class="<?php echo $t101_session_delete->id->headerCellClass() ?>"><span id="elh_t101_session_id" class="t101_session_id"><?php echo $t101_session_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($t101_session_delete->sekolah_id->Visible) { // sekolah_id ?>
		<th class="<?php echo $t101_session_delete->sekolah_id->headerCellClass() ?>"><span id="elh_t101_session_sekolah_id" class="t101_session_sekolah_id"><?php echo $t101_session_delete->sekolah_id->caption() ?></span></th>
<?php } ?>
<?php if ($t101_session_delete->user_id->Visible) { // user_id ?>
		<th class="<?php echo $t101_session_delete->user_id->headerCellClass() ?>"><span id="elh_t101_session_user_id" class="t101_session_user_id"><?php echo $t101_session_delete->user_id->caption() ?></span></th>
<?php } ?>
<?php if ($t101_session_delete->tanggal_jam->Visible) { // tanggal_jam ?>
		<th class="<?php echo $t101_session_delete->tanggal_jam->headerCellClass() ?>"><span id="elh_t101_session_tanggal_jam" class="t101_session_tanggal_jam"><?php echo $t101_session_delete->tanggal_jam->caption() ?></span></th>
<?php } ?>
<?php if ($t101_session_delete->session_value->Visible) { // session_value ?>
		<th class="<?php echo $t101_session_delete->session_value->headerCellClass() ?>"><span id="elh_t101_session_session_value" class="t101_session_session_value"><?php echo $t101_session_delete->session_value->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t101_session_delete->RecordCount = 0;
$i = 0;
while (!$t101_session_delete->Recordset->EOF) {
	$t101_session_delete->RecordCount++;
	$t101_session_delete->RowCount++;

	// Set row properties
	$t101_session->resetAttributes();
	$t101_session->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t101_session_delete->loadRowValues($t101_session_delete->Recordset);

	// Render row
	$t101_session_delete->renderRow();
?>
	<tr <?php echo $t101_session->rowAttributes() ?>>
<?php if ($t101_session_delete->id->Visible) { // id ?>
		<td <?php echo $t101_session_delete->id->cellAttributes() ?>>
<span id="el<?php echo $t101_session_delete->RowCount ?>_t101_session_id" class="t101_session_id">
<span<?php echo $t101_session_delete->id->viewAttributes() ?>><?php echo $t101_session_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_session_delete->sekolah_id->Visible) { // sekolah_id ?>
		<td <?php echo $t101_session_delete->sekolah_id->cellAttributes() ?>>
<span id="el<?php echo $t101_session_delete->RowCount ?>_t101_session_sekolah_id" class="t101_session_sekolah_id">
<span<?php echo $t101_session_delete->sekolah_id->viewAttributes() ?>><?php echo $t101_session_delete->sekolah_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_session_delete->user_id->Visible) { // user_id ?>
		<td <?php echo $t101_session_delete->user_id->cellAttributes() ?>>
<span id="el<?php echo $t101_session_delete->RowCount ?>_t101_session_user_id" class="t101_session_user_id">
<span<?php echo $t101_session_delete->user_id->viewAttributes() ?>><?php echo $t101_session_delete->user_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_session_delete->tanggal_jam->Visible) { // tanggal_jam ?>
		<td <?php echo $t101_session_delete->tanggal_jam->cellAttributes() ?>>
<span id="el<?php echo $t101_session_delete->RowCount ?>_t101_session_tanggal_jam" class="t101_session_tanggal_jam">
<span<?php echo $t101_session_delete->tanggal_jam->viewAttributes() ?>><?php echo $t101_session_delete->tanggal_jam->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_session_delete->session_value->Visible) { // session_value ?>
		<td <?php echo $t101_session_delete->session_value->cellAttributes() ?>>
<span id="el<?php echo $t101_session_delete->RowCount ?>_t101_session_session_value" class="t101_session_session_value">
<span<?php echo $t101_session_delete->session_value->viewAttributes() ?>><?php echo $t101_session_delete->session_value->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t101_session_delete->Recordset->moveNext();
}
$t101_session_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t101_session_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t101_session_delete->showPageFooter();
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
$t101_session_delete->terminate();
?>