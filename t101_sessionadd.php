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
$t101_session_add = new t101_session_add();

// Run the page
$t101_session_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_session_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft101_sessionadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	ft101_sessionadd = currentForm = new ew.Form("ft101_sessionadd", "add");

	// Validate form
	ft101_sessionadd.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "F")
			return true;
		var elm, felm, uelm, addcnt = 0;
		var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
		var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
		var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
		var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
		for (var i = startcnt; i <= rowcnt; i++) {
			var infix = ($k[0]) ? String(i) : "";
			$fobj.data("rowindex", infix);
			<?php if ($t101_session_add->sekolah_id->Required) { ?>
				elm = this.getElements("x" + infix + "_sekolah_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_session_add->sekolah_id->caption(), $t101_session_add->sekolah_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_session_add->user_id->Required) { ?>
				elm = this.getElements("x" + infix + "_user_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_session_add->user_id->caption(), $t101_session_add->user_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_user_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t101_session_add->user_id->errorMessage()) ?>");
			<?php if ($t101_session_add->tanggal_jam->Required) { ?>
				elm = this.getElements("x" + infix + "_tanggal_jam");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_session_add->tanggal_jam->caption(), $t101_session_add->tanggal_jam->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tanggal_jam");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t101_session_add->tanggal_jam->errorMessage()) ?>");
			<?php if ($t101_session_add->session_value->Required) { ?>
				elm = this.getElements("x" + infix + "_session_value");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_session_add->session_value->caption(), $t101_session_add->session_value->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}

		// Process detail forms
		var dfs = $fobj.find("input[name='detailpage']").get();
		for (var i = 0; i < dfs.length; i++) {
			var df = dfs[i], val = df.value;
			if (val && ew.forms[val])
				if (!ew.forms[val].validate())
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	ft101_sessionadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft101_sessionadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft101_sessionadd.lists["x_sekolah_id"] = <?php echo $t101_session_add->sekolah_id->Lookup->toClientList($t101_session_add) ?>;
	ft101_sessionadd.lists["x_sekolah_id"].options = <?php echo JsonEncode($t101_session_add->sekolah_id->lookupOptions()) ?>;
	loadjs.done("ft101_sessionadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t101_session_add->showPageHeader(); ?>
<?php
$t101_session_add->showMessage();
?>
<form name="ft101_sessionadd" id="ft101_sessionadd" class="<?php echo $t101_session_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_session">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t101_session_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($t101_session_add->sekolah_id->Visible) { // sekolah_id ?>
	<div id="r_sekolah_id" class="form-group row">
		<label id="elh_t101_session_sekolah_id" for="x_sekolah_id" class="<?php echo $t101_session_add->LeftColumnClass ?>"><?php echo $t101_session_add->sekolah_id->caption() ?><?php echo $t101_session_add->sekolah_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_session_add->RightColumnClass ?>"><div <?php echo $t101_session_add->sekolah_id->cellAttributes() ?>>
<span id="el_t101_session_sekolah_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_session" data-field="x_sekolah_id" data-value-separator="<?php echo $t101_session_add->sekolah_id->displayValueSeparatorAttribute() ?>" id="x_sekolah_id" name="x_sekolah_id"<?php echo $t101_session_add->sekolah_id->editAttributes() ?>>
			<?php echo $t101_session_add->sekolah_id->selectOptionListHtml("x_sekolah_id") ?>
		</select>
</div>
<?php echo $t101_session_add->sekolah_id->Lookup->getParamTag($t101_session_add, "p_x_sekolah_id") ?>
</span>
<?php echo $t101_session_add->sekolah_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_session_add->user_id->Visible) { // user_id ?>
	<div id="r_user_id" class="form-group row">
		<label id="elh_t101_session_user_id" for="x_user_id" class="<?php echo $t101_session_add->LeftColumnClass ?>"><?php echo $t101_session_add->user_id->caption() ?><?php echo $t101_session_add->user_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_session_add->RightColumnClass ?>"><div <?php echo $t101_session_add->user_id->cellAttributes() ?>>
<span id="el_t101_session_user_id">
<input type="text" data-table="t101_session" data-field="x_user_id" name="x_user_id" id="x_user_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t101_session_add->user_id->getPlaceHolder()) ?>" value="<?php echo $t101_session_add->user_id->EditValue ?>"<?php echo $t101_session_add->user_id->editAttributes() ?>>
</span>
<?php echo $t101_session_add->user_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_session_add->tanggal_jam->Visible) { // tanggal_jam ?>
	<div id="r_tanggal_jam" class="form-group row">
		<label id="elh_t101_session_tanggal_jam" for="x_tanggal_jam" class="<?php echo $t101_session_add->LeftColumnClass ?>"><?php echo $t101_session_add->tanggal_jam->caption() ?><?php echo $t101_session_add->tanggal_jam->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_session_add->RightColumnClass ?>"><div <?php echo $t101_session_add->tanggal_jam->cellAttributes() ?>>
<span id="el_t101_session_tanggal_jam">
<input type="text" data-table="t101_session" data-field="x_tanggal_jam" name="x_tanggal_jam" id="x_tanggal_jam" maxlength="19" placeholder="<?php echo HtmlEncode($t101_session_add->tanggal_jam->getPlaceHolder()) ?>" value="<?php echo $t101_session_add->tanggal_jam->EditValue ?>"<?php echo $t101_session_add->tanggal_jam->editAttributes() ?>>
<?php if (!$t101_session_add->tanggal_jam->ReadOnly && !$t101_session_add->tanggal_jam->Disabled && !isset($t101_session_add->tanggal_jam->EditAttrs["readonly"]) && !isset($t101_session_add->tanggal_jam->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft101_sessionadd", "datetimepicker"], function() {
	ew.createDateTimePicker("ft101_sessionadd", "x_tanggal_jam", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $t101_session_add->tanggal_jam->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_session_add->session_value->Visible) { // session_value ?>
	<div id="r_session_value" class="form-group row">
		<label id="elh_t101_session_session_value" for="x_session_value" class="<?php echo $t101_session_add->LeftColumnClass ?>"><?php echo $t101_session_add->session_value->caption() ?><?php echo $t101_session_add->session_value->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_session_add->RightColumnClass ?>"><div <?php echo $t101_session_add->session_value->cellAttributes() ?>>
<span id="el_t101_session_session_value">
<input type="text" data-table="t101_session" data-field="x_session_value" name="x_session_value" id="x_session_value" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($t101_session_add->session_value->getPlaceHolder()) ?>" value="<?php echo $t101_session_add->session_value->EditValue ?>"<?php echo $t101_session_add->session_value->editAttributes() ?>>
</span>
<?php echo $t101_session_add->session_value->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t101_session_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t101_session_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t101_session_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t101_session_add->showPageFooter();
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
$t101_session_add->terminate();
?>