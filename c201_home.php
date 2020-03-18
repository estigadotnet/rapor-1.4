<?php
namespace PHPMaker2020\p_rapor_1_4;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start();
?>
<?php include_once "autoload.php"; ?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$c201_home = new c201_home();

// Run the page
$c201_home->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php"; ?>
<!--
<div id="r_sekolah_id" class="form-group row">
	<label id="elh_t101_session_sekolah_id" for="x_sekolah_id" class="col-sm-2 col-form-label ew-label">sekolah id<i data-phrase="FieldRequiredIndicator" class="fas fa-asterisk ew-required" data-caption=""></i></label>
	<div class="col-sm-10">
		<div>
			<span id="el_t101_session_sekolah_id">
				<div class="input-group">
					<select class="custom-select ew-custom-select" data-table="t101_session" data-field="x_sekolah_id" data-value-separator=", " id="x_sekolah_id" name="x_sekolah_id">
						<option value="">Please select</option>		
						<option value="1">MINU Karakter Bojonegoro</option>
					</select>
				</div>
			</span>
		</div>
	</div>
</div>
-->

<?php
//echo "CurrentUserName() : " . CurrentUserName() . "<br/>";
//echo "CurrentUserID()   : " . CurrentUserID() . "<br/>";
//echo "CurrentUserLevel(): " . CurrentUserLevel() . "<br/>";
//echo "Field [Username]  : " . CurrentUserInfo("Username") . "<br/>";
//echo "Field [EmployeeID]: " . CurrentUserInfo("EmployeeID") . "<br/>";

if (IsLoggedIn()) {

	if (!isset($_SESSION["UserID"])) {
		$_SESSION["UserID"] = "";
	}

	if ($_SESSION["UserID"] == "") {
		$_SESSION["UserID"] = CurrentUserID();
	?>

<div id="r_sekolah_id" class="form-group row">
	<label id="elh_t101_session_sekolah_id" for="x_sekolah_id" class="col-sm-2 col-form-label ew-label">sekolah id<i data-phrase="FieldRequiredIndicator" class="fas fa-asterisk ew-required" data-caption=""></i></label>
	<div class="col-sm-10">
		<div>
			<span id="el_t101_session_sekolah_id">
				<div class="input-group">
					<select class="custom-select ew-custom-select" data-table="t101_session" data-field="x_sekolah_id" data-value-separator=", " id="x_sekolah_id" name="x_sekolah_id">
						<option value="">Please select</option>		
						<option value="1">MINU Karakter Bojonegoro</option>
					</select>
				</div>
			</span>
		</div>
	</div>
</div>

<div class="col-sm-10 offset-sm-2">
	<!-- buttons offset -->
	<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit">Add</button>
	<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="http://localhost:8080/rapor-1.4/t101_sessionlist.php">Cancel</button>
</div>

	<?php
	}
	else {
	}

}

?>


<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$c201_home->terminate();
?>