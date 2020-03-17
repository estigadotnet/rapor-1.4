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
$t101_session_list = new t101_session_list();

// Run the page
$t101_session_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_session_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t101_session_list->isExport()) { ?>
<script>
var ft101_sessionlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft101_sessionlist = currentForm = new ew.Form("ft101_sessionlist", "list");
	ft101_sessionlist.formKeyCountName = '<?php echo $t101_session_list->FormKeyCountName ?>';
	loadjs.done("ft101_sessionlist");
});
var ft101_sessionlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft101_sessionlistsrch = currentSearchForm = new ew.Form("ft101_sessionlistsrch");

	// Dynamic selection lists
	// Filters

	ft101_sessionlistsrch.filterList = <?php echo $t101_session_list->getFilterList() ?>;
	loadjs.done("ft101_sessionlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t101_session_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t101_session_list->TotalRecords > 0 && $t101_session_list->ExportOptions->visible()) { ?>
<?php $t101_session_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t101_session_list->ImportOptions->visible()) { ?>
<?php $t101_session_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t101_session_list->SearchOptions->visible()) { ?>
<?php $t101_session_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t101_session_list->FilterOptions->visible()) { ?>
<?php $t101_session_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t101_session_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t101_session_list->isExport() && !$t101_session->CurrentAction) { ?>
<form name="ft101_sessionlistsrch" id="ft101_sessionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ft101_sessionlistsrch-search-panel" class="<?php echo $t101_session_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t101_session">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $t101_session_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($t101_session_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($t101_session_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t101_session_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t101_session_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t101_session_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t101_session_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t101_session_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $t101_session_list->showPageHeader(); ?>
<?php
$t101_session_list->showMessage();
?>
<?php if ($t101_session_list->TotalRecords > 0 || $t101_session->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t101_session_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t101_session">
<form name="ft101_sessionlist" id="ft101_sessionlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_session">
<div id="gmp_t101_session" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t101_session_list->TotalRecords > 0 || $t101_session_list->isGridEdit()) { ?>
<table id="tbl_t101_sessionlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t101_session->RowType = ROWTYPE_HEADER;

// Render list options
$t101_session_list->renderListOptions();

// Render list options (header, left)
$t101_session_list->ListOptions->render("header", "left");
?>
<?php if ($t101_session_list->id->Visible) { // id ?>
	<?php if ($t101_session_list->SortUrl($t101_session_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $t101_session_list->id->headerCellClass() ?>"><div id="elh_t101_session_id" class="t101_session_id"><div class="ew-table-header-caption"><?php echo $t101_session_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $t101_session_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t101_session_list->SortUrl($t101_session_list->id) ?>', 2);"><div id="elh_t101_session_id" class="t101_session_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_session_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_session_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t101_session_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_session_list->sekolah_id->Visible) { // sekolah_id ?>
	<?php if ($t101_session_list->SortUrl($t101_session_list->sekolah_id) == "") { ?>
		<th data-name="sekolah_id" class="<?php echo $t101_session_list->sekolah_id->headerCellClass() ?>"><div id="elh_t101_session_sekolah_id" class="t101_session_sekolah_id"><div class="ew-table-header-caption"><?php echo $t101_session_list->sekolah_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sekolah_id" class="<?php echo $t101_session_list->sekolah_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t101_session_list->SortUrl($t101_session_list->sekolah_id) ?>', 2);"><div id="elh_t101_session_sekolah_id" class="t101_session_sekolah_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_session_list->sekolah_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_session_list->sekolah_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t101_session_list->sekolah_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_session_list->user_id->Visible) { // user_id ?>
	<?php if ($t101_session_list->SortUrl($t101_session_list->user_id) == "") { ?>
		<th data-name="user_id" class="<?php echo $t101_session_list->user_id->headerCellClass() ?>"><div id="elh_t101_session_user_id" class="t101_session_user_id"><div class="ew-table-header-caption"><?php echo $t101_session_list->user_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="user_id" class="<?php echo $t101_session_list->user_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t101_session_list->SortUrl($t101_session_list->user_id) ?>', 2);"><div id="elh_t101_session_user_id" class="t101_session_user_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_session_list->user_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_session_list->user_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t101_session_list->user_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_session_list->tanggal_jam->Visible) { // tanggal_jam ?>
	<?php if ($t101_session_list->SortUrl($t101_session_list->tanggal_jam) == "") { ?>
		<th data-name="tanggal_jam" class="<?php echo $t101_session_list->tanggal_jam->headerCellClass() ?>"><div id="elh_t101_session_tanggal_jam" class="t101_session_tanggal_jam"><div class="ew-table-header-caption"><?php echo $t101_session_list->tanggal_jam->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tanggal_jam" class="<?php echo $t101_session_list->tanggal_jam->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t101_session_list->SortUrl($t101_session_list->tanggal_jam) ?>', 2);"><div id="elh_t101_session_tanggal_jam" class="t101_session_tanggal_jam">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_session_list->tanggal_jam->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_session_list->tanggal_jam->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t101_session_list->tanggal_jam->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_session_list->session_value->Visible) { // session_value ?>
	<?php if ($t101_session_list->SortUrl($t101_session_list->session_value) == "") { ?>
		<th data-name="session_value" class="<?php echo $t101_session_list->session_value->headerCellClass() ?>"><div id="elh_t101_session_session_value" class="t101_session_session_value"><div class="ew-table-header-caption"><?php echo $t101_session_list->session_value->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="session_value" class="<?php echo $t101_session_list->session_value->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t101_session_list->SortUrl($t101_session_list->session_value) ?>', 2);"><div id="elh_t101_session_session_value" class="t101_session_session_value">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_session_list->session_value->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t101_session_list->session_value->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t101_session_list->session_value->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t101_session_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t101_session_list->ExportAll && $t101_session_list->isExport()) {
	$t101_session_list->StopRecord = $t101_session_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t101_session_list->TotalRecords > $t101_session_list->StartRecord + $t101_session_list->DisplayRecords - 1)
		$t101_session_list->StopRecord = $t101_session_list->StartRecord + $t101_session_list->DisplayRecords - 1;
	else
		$t101_session_list->StopRecord = $t101_session_list->TotalRecords;
}
$t101_session_list->RecordCount = $t101_session_list->StartRecord - 1;
if ($t101_session_list->Recordset && !$t101_session_list->Recordset->EOF) {
	$t101_session_list->Recordset->moveFirst();
	$selectLimit = $t101_session_list->UseSelectLimit;
	if (!$selectLimit && $t101_session_list->StartRecord > 1)
		$t101_session_list->Recordset->move($t101_session_list->StartRecord - 1);
} elseif (!$t101_session->AllowAddDeleteRow && $t101_session_list->StopRecord == 0) {
	$t101_session_list->StopRecord = $t101_session->GridAddRowCount;
}

// Initialize aggregate
$t101_session->RowType = ROWTYPE_AGGREGATEINIT;
$t101_session->resetAttributes();
$t101_session_list->renderRow();
while ($t101_session_list->RecordCount < $t101_session_list->StopRecord) {
	$t101_session_list->RecordCount++;
	if ($t101_session_list->RecordCount >= $t101_session_list->StartRecord) {
		$t101_session_list->RowCount++;

		// Set up key count
		$t101_session_list->KeyCount = $t101_session_list->RowIndex;

		// Init row class and style
		$t101_session->resetAttributes();
		$t101_session->CssClass = "";
		if ($t101_session_list->isGridAdd()) {
		} else {
			$t101_session_list->loadRowValues($t101_session_list->Recordset); // Load row values
		}
		$t101_session->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t101_session->RowAttrs->merge(["data-rowindex" => $t101_session_list->RowCount, "id" => "r" . $t101_session_list->RowCount . "_t101_session", "data-rowtype" => $t101_session->RowType]);

		// Render row
		$t101_session_list->renderRow();

		// Render list options
		$t101_session_list->renderListOptions();
?>
	<tr <?php echo $t101_session->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t101_session_list->ListOptions->render("body", "left", $t101_session_list->RowCount);
?>
	<?php if ($t101_session_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $t101_session_list->id->cellAttributes() ?>>
<span id="el<?php echo $t101_session_list->RowCount ?>_t101_session_id">
<span<?php echo $t101_session_list->id->viewAttributes() ?>><?php echo $t101_session_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t101_session_list->sekolah_id->Visible) { // sekolah_id ?>
		<td data-name="sekolah_id" <?php echo $t101_session_list->sekolah_id->cellAttributes() ?>>
<span id="el<?php echo $t101_session_list->RowCount ?>_t101_session_sekolah_id">
<span<?php echo $t101_session_list->sekolah_id->viewAttributes() ?>><?php echo $t101_session_list->sekolah_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t101_session_list->user_id->Visible) { // user_id ?>
		<td data-name="user_id" <?php echo $t101_session_list->user_id->cellAttributes() ?>>
<span id="el<?php echo $t101_session_list->RowCount ?>_t101_session_user_id">
<span<?php echo $t101_session_list->user_id->viewAttributes() ?>><?php echo $t101_session_list->user_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t101_session_list->tanggal_jam->Visible) { // tanggal_jam ?>
		<td data-name="tanggal_jam" <?php echo $t101_session_list->tanggal_jam->cellAttributes() ?>>
<span id="el<?php echo $t101_session_list->RowCount ?>_t101_session_tanggal_jam">
<span<?php echo $t101_session_list->tanggal_jam->viewAttributes() ?>><?php echo $t101_session_list->tanggal_jam->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t101_session_list->session_value->Visible) { // session_value ?>
		<td data-name="session_value" <?php echo $t101_session_list->session_value->cellAttributes() ?>>
<span id="el<?php echo $t101_session_list->RowCount ?>_t101_session_session_value">
<span<?php echo $t101_session_list->session_value->viewAttributes() ?>><?php echo $t101_session_list->session_value->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t101_session_list->ListOptions->render("body", "right", $t101_session_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$t101_session_list->isGridAdd())
		$t101_session_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$t101_session->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t101_session_list->Recordset)
	$t101_session_list->Recordset->Close();
?>
<?php if (!$t101_session_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t101_session_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t101_session_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t101_session_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t101_session_list->TotalRecords == 0 && !$t101_session->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t101_session_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t101_session_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t101_session_list->isExport()) { ?>
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
$t101_session_list->terminate();
?>