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
$t205_default_list = new t205_default_list();

// Run the page
$t205_default_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t205_default_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t205_default_list->isExport()) { ?>
<script>
var ft205_defaultlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft205_defaultlist = currentForm = new ew.Form("ft205_defaultlist", "list");
	ft205_defaultlist.formKeyCountName = '<?php echo $t205_default_list->FormKeyCountName ?>';
	loadjs.done("ft205_defaultlist");
});
var ft205_defaultlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft205_defaultlistsrch = currentSearchForm = new ew.Form("ft205_defaultlistsrch");

	// Dynamic selection lists
	// Filters

	ft205_defaultlistsrch.filterList = <?php echo $t205_default_list->getFilterList() ?>;
	loadjs.done("ft205_defaultlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t205_default_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t205_default_list->TotalRecords > 0 && $t205_default_list->ExportOptions->visible()) { ?>
<?php $t205_default_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t205_default_list->ImportOptions->visible()) { ?>
<?php $t205_default_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t205_default_list->SearchOptions->visible()) { ?>
<?php $t205_default_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t205_default_list->FilterOptions->visible()) { ?>
<?php $t205_default_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t205_default_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t205_default_list->isExport() && !$t205_default->CurrentAction) { ?>
<form name="ft205_defaultlistsrch" id="ft205_defaultlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ft205_defaultlistsrch-search-panel" class="<?php echo $t205_default_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t205_default">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $t205_default_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($t205_default_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($t205_default_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t205_default_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t205_default_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t205_default_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t205_default_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t205_default_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $t205_default_list->showPageHeader(); ?>
<?php
$t205_default_list->showMessage();
?>
<?php if ($t205_default_list->TotalRecords > 0 || $t205_default->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t205_default_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t205_default">
<form name="ft205_defaultlist" id="ft205_defaultlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t205_default">
<div id="gmp_t205_default" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t205_default_list->TotalRecords > 0 || $t205_default_list->isGridEdit()) { ?>
<table id="tbl_t205_defaultlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t205_default->RowType = ROWTYPE_HEADER;

// Render list options
$t205_default_list->renderListOptions();

// Render list options (header, left)
$t205_default_list->ListOptions->render("header", "left");
?>
<?php if ($t205_default_list->User_ID->Visible) { // User_ID ?>
	<?php if ($t205_default_list->SortUrl($t205_default_list->User_ID) == "") { ?>
		<th data-name="User_ID" class="<?php echo $t205_default_list->User_ID->headerCellClass() ?>"><div id="elh_t205_default_User_ID" class="t205_default_User_ID"><div class="ew-table-header-caption"><?php echo $t205_default_list->User_ID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="User_ID" class="<?php echo $t205_default_list->User_ID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t205_default_list->SortUrl($t205_default_list->User_ID) ?>', 2);"><div id="elh_t205_default_User_ID" class="t205_default_User_ID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t205_default_list->User_ID->caption() ?></span><span class="ew-table-header-sort"><?php if ($t205_default_list->User_ID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t205_default_list->User_ID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t205_default_list->Field_ID->Visible) { // Field_ID ?>
	<?php if ($t205_default_list->SortUrl($t205_default_list->Field_ID) == "") { ?>
		<th data-name="Field_ID" class="<?php echo $t205_default_list->Field_ID->headerCellClass() ?>"><div id="elh_t205_default_Field_ID" class="t205_default_Field_ID"><div class="ew-table-header-caption"><?php echo $t205_default_list->Field_ID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Field_ID" class="<?php echo $t205_default_list->Field_ID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t205_default_list->SortUrl($t205_default_list->Field_ID) ?>', 2);"><div id="elh_t205_default_Field_ID" class="t205_default_Field_ID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t205_default_list->Field_ID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t205_default_list->Field_ID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t205_default_list->Field_ID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t205_default_list->Nilai->Visible) { // Nilai ?>
	<?php if ($t205_default_list->SortUrl($t205_default_list->Nilai) == "") { ?>
		<th data-name="Nilai" class="<?php echo $t205_default_list->Nilai->headerCellClass() ?>"><div id="elh_t205_default_Nilai" class="t205_default_Nilai"><div class="ew-table-header-caption"><?php echo $t205_default_list->Nilai->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nilai" class="<?php echo $t205_default_list->Nilai->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t205_default_list->SortUrl($t205_default_list->Nilai) ?>', 2);"><div id="elh_t205_default_Nilai" class="t205_default_Nilai">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t205_default_list->Nilai->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t205_default_list->Nilai->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t205_default_list->Nilai->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t205_default_list->Keterangan->Visible) { // Keterangan ?>
	<?php if ($t205_default_list->SortUrl($t205_default_list->Keterangan) == "") { ?>
		<th data-name="Keterangan" class="<?php echo $t205_default_list->Keterangan->headerCellClass() ?>"><div id="elh_t205_default_Keterangan" class="t205_default_Keterangan"><div class="ew-table-header-caption"><?php echo $t205_default_list->Keterangan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Keterangan" class="<?php echo $t205_default_list->Keterangan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t205_default_list->SortUrl($t205_default_list->Keterangan) ?>', 2);"><div id="elh_t205_default_Keterangan" class="t205_default_Keterangan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t205_default_list->Keterangan->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t205_default_list->Keterangan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t205_default_list->Keterangan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t205_default_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t205_default_list->ExportAll && $t205_default_list->isExport()) {
	$t205_default_list->StopRecord = $t205_default_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t205_default_list->TotalRecords > $t205_default_list->StartRecord + $t205_default_list->DisplayRecords - 1)
		$t205_default_list->StopRecord = $t205_default_list->StartRecord + $t205_default_list->DisplayRecords - 1;
	else
		$t205_default_list->StopRecord = $t205_default_list->TotalRecords;
}
$t205_default_list->RecordCount = $t205_default_list->StartRecord - 1;
if ($t205_default_list->Recordset && !$t205_default_list->Recordset->EOF) {
	$t205_default_list->Recordset->moveFirst();
	$selectLimit = $t205_default_list->UseSelectLimit;
	if (!$selectLimit && $t205_default_list->StartRecord > 1)
		$t205_default_list->Recordset->move($t205_default_list->StartRecord - 1);
} elseif (!$t205_default->AllowAddDeleteRow && $t205_default_list->StopRecord == 0) {
	$t205_default_list->StopRecord = $t205_default->GridAddRowCount;
}

// Initialize aggregate
$t205_default->RowType = ROWTYPE_AGGREGATEINIT;
$t205_default->resetAttributes();
$t205_default_list->renderRow();
while ($t205_default_list->RecordCount < $t205_default_list->StopRecord) {
	$t205_default_list->RecordCount++;
	if ($t205_default_list->RecordCount >= $t205_default_list->StartRecord) {
		$t205_default_list->RowCount++;

		// Set up key count
		$t205_default_list->KeyCount = $t205_default_list->RowIndex;

		// Init row class and style
		$t205_default->resetAttributes();
		$t205_default->CssClass = "";
		if ($t205_default_list->isGridAdd()) {
		} else {
			$t205_default_list->loadRowValues($t205_default_list->Recordset); // Load row values
		}
		$t205_default->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t205_default->RowAttrs->merge(["data-rowindex" => $t205_default_list->RowCount, "id" => "r" . $t205_default_list->RowCount . "_t205_default", "data-rowtype" => $t205_default->RowType]);

		// Render row
		$t205_default_list->renderRow();

		// Render list options
		$t205_default_list->renderListOptions();
?>
	<tr <?php echo $t205_default->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t205_default_list->ListOptions->render("body", "left", $t205_default_list->RowCount);
?>
	<?php if ($t205_default_list->User_ID->Visible) { // User_ID ?>
		<td data-name="User_ID" <?php echo $t205_default_list->User_ID->cellAttributes() ?>>
<span id="el<?php echo $t205_default_list->RowCount ?>_t205_default_User_ID">
<span<?php echo $t205_default_list->User_ID->viewAttributes() ?>><?php echo $t205_default_list->User_ID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t205_default_list->Field_ID->Visible) { // Field_ID ?>
		<td data-name="Field_ID" <?php echo $t205_default_list->Field_ID->cellAttributes() ?>>
<span id="el<?php echo $t205_default_list->RowCount ?>_t205_default_Field_ID">
<span<?php echo $t205_default_list->Field_ID->viewAttributes() ?>><?php echo $t205_default_list->Field_ID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t205_default_list->Nilai->Visible) { // Nilai ?>
		<td data-name="Nilai" <?php echo $t205_default_list->Nilai->cellAttributes() ?>>
<span id="el<?php echo $t205_default_list->RowCount ?>_t205_default_Nilai">
<span<?php echo $t205_default_list->Nilai->viewAttributes() ?>><?php echo $t205_default_list->Nilai->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t205_default_list->Keterangan->Visible) { // Keterangan ?>
		<td data-name="Keterangan" <?php echo $t205_default_list->Keterangan->cellAttributes() ?>>
<span id="el<?php echo $t205_default_list->RowCount ?>_t205_default_Keterangan">
<span<?php echo $t205_default_list->Keterangan->viewAttributes() ?>><?php echo $t205_default_list->Keterangan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t205_default_list->ListOptions->render("body", "right", $t205_default_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$t205_default_list->isGridAdd())
		$t205_default_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$t205_default->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t205_default_list->Recordset)
	$t205_default_list->Recordset->Close();
?>
<?php if (!$t205_default_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t205_default_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t205_default_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t205_default_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t205_default_list->TotalRecords == 0 && !$t205_default->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t205_default_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t205_default_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t205_default_list->isExport()) { ?>
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
$t205_default_list->terminate();
?>