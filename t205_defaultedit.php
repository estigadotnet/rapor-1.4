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
$t205_default_edit = new t205_default_edit();

// Run the page
$t205_default_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t205_default_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft205_defaultedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	ft205_defaultedit = currentForm = new ew.Form("ft205_defaultedit", "edit");

	// Validate form
	ft205_defaultedit.validate = function() {
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
			<?php if ($t205_default_edit->User_ID->Required) { ?>
				elm = this.getElements("x" + infix + "_User_ID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t205_default_edit->User_ID->caption(), $t205_default_edit->User_ID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t205_default_edit->Keterangan->Required) { ?>
				elm = this.getElements("x" + infix + "_Keterangan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t205_default_edit->Keterangan->caption(), $t205_default_edit->Keterangan->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t205_default_edit->Nilai->Required) { ?>
				elm = this.getElements("x" + infix + "_Nilai");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t205_default_edit->Nilai->caption(), $t205_default_edit->Nilai->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t205_default_edit->Field_ID->Required) { ?>
				elm = this.getElements("x" + infix + "_Field_ID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t205_default_edit->Field_ID->caption(), $t205_default_edit->Field_ID->RequiredErrorMessage)) ?>");
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
	ft205_defaultedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft205_defaultedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft205_defaultedit.lists["x_User_ID"] = <?php echo $t205_default_edit->User_ID->Lookup->toClientList($t205_default_edit) ?>;
	ft205_defaultedit.lists["x_User_ID"].options = <?php echo JsonEncode($t205_default_edit->User_ID->lookupOptions()) ?>;
	loadjs.done("ft205_defaultedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t205_default_edit->showPageHeader(); ?>
<?php
$t205_default_edit->showMessage();
?>
<form name="ft205_defaultedit" id="ft205_defaultedit" class="<?php echo $t205_default_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t205_default">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t205_default_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($t205_default_edit->User_ID->Visible) { // User_ID ?>
	<div id="r_User_ID" class="form-group row">
		<label id="elh_t205_default_User_ID" for="x_User_ID" class="<?php echo $t205_default_edit->LeftColumnClass ?>"><?php echo $t205_default_edit->User_ID->caption() ?><?php echo $t205_default_edit->User_ID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t205_default_edit->RightColumnClass ?>"><div <?php echo $t205_default_edit->User_ID->cellAttributes() ?>>
<span id="el_t205_default_User_ID">
<?php $t205_default_edit->User_ID->EditAttrs->prepend("onchange", "ew.updateOptions.call(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t205_default" data-field="x_User_ID" data-value-separator="<?php echo $t205_default_edit->User_ID->displayValueSeparatorAttribute() ?>" id="x_User_ID" name="x_User_ID"<?php echo $t205_default_edit->User_ID->editAttributes() ?>>
			<?php echo $t205_default_edit->User_ID->selectOptionListHtml("x_User_ID") ?>
		</select>
</div>
<?php echo $t205_default_edit->User_ID->Lookup->getParamTag($t205_default_edit, "p_x_User_ID") ?>
</span>
<?php echo $t205_default_edit->User_ID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t205_default_edit->Keterangan->Visible) { // Keterangan ?>
	<div id="r_Keterangan" class="form-group row">
		<label id="elh_t205_default_Keterangan" for="x_Keterangan" class="<?php echo $t205_default_edit->LeftColumnClass ?>"><?php echo $t205_default_edit->Keterangan->caption() ?><?php echo $t205_default_edit->Keterangan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t205_default_edit->RightColumnClass ?>"><div <?php echo $t205_default_edit->Keterangan->cellAttributes() ?>>
<span id="el_t205_default_Keterangan">
<input type="text" data-table="t205_default" data-field="x_Keterangan" name="x_Keterangan" id="x_Keterangan" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($t205_default_edit->Keterangan->getPlaceHolder()) ?>" value="<?php echo $t205_default_edit->Keterangan->EditValue ?>"<?php echo $t205_default_edit->Keterangan->editAttributes() ?>>
</span>
<?php echo $t205_default_edit->Keterangan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t205_default_edit->Nilai->Visible) { // Nilai ?>
	<div id="r_Nilai" class="form-group row">
		<label id="elh_t205_default_Nilai" for="x_Nilai" class="<?php echo $t205_default_edit->LeftColumnClass ?>"><?php echo $t205_default_edit->Nilai->caption() ?><?php echo $t205_default_edit->Nilai->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t205_default_edit->RightColumnClass ?>"><div <?php echo $t205_default_edit->Nilai->cellAttributes() ?>>
<span id="el_t205_default_Nilai">
<input type="text" data-table="t205_default" data-field="x_Nilai" name="x_Nilai" id="x_Nilai" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($t205_default_edit->Nilai->getPlaceHolder()) ?>" value="<?php echo $t205_default_edit->Nilai->EditValue ?>"<?php echo $t205_default_edit->Nilai->editAttributes() ?>>
</span>
<?php echo $t205_default_edit->Nilai->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t205_default_edit->Field_ID->Visible) { // Field_ID ?>
	<div id="r_Field_ID" class="form-group row">
		<label id="elh_t205_default_Field_ID" for="x_Field_ID" class="<?php echo $t205_default_edit->LeftColumnClass ?>"><?php echo $t205_default_edit->Field_ID->caption() ?><?php echo $t205_default_edit->Field_ID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t205_default_edit->RightColumnClass ?>"><div <?php echo $t205_default_edit->Field_ID->cellAttributes() ?>>
<span id="el_t205_default_Field_ID">
<input type="text" data-table="t205_default" data-field="x_Field_ID" name="x_Field_ID" id="x_Field_ID" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t205_default_edit->Field_ID->getPlaceHolder()) ?>" value="<?php echo $t205_default_edit->Field_ID->EditValue ?>"<?php echo $t205_default_edit->Field_ID->editAttributes() ?>>
</span>
<?php echo $t205_default_edit->Field_ID->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="t205_default" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t205_default_edit->id->CurrentValue) ?>">
<?php if (!$t205_default_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t205_default_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t205_default_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t205_default_edit->showPageFooter();
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
$t205_default_edit->terminate();
?>