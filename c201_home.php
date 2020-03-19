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

$show_combo = 0;

// check apakah user sudah pada posisi berhasil login
if (IsLoggedIn()) {

	//if (!isset($_SESSION["sekolah_id"])) {
	if (!isset($GLOBALS["sekolah_id"])) {
		//$_SESSION["sekolah_id"] = "";
		$GLOBALS["sekolah_id"] = "";
		echo "lewat";
	//}

	if (!isset($_GET["x_sekolah_id"])) {
		$show_combo = 1;
	}
	else {
		//$_SESSION["sekolah_id"] = $_GET["x_sekolah_id"];
		$GLOBALS["sekolah_id"] = $_GET["x_sekolah_id"];
		//echo "sekolah_id: " . $_SESSION["sekolah_id"];
		echo "sekolah_id: " . $GLOBALS["sekolah_id"];
	}
	}

	if ($show_combo == 1) {
		?>
		<form action="c201_home.php" method="get">
			<select name="x_sekolah_id">
				<option value="1">sekolah 1</option>
				<option value="2">sekolah 2</option>
			</select>
			<button type="submit">Submit</button>
		</form>
		<?php
	}

	//$_SESSION["sekolah_id"] = $_GET["x_sekolah_id"];
	//echo "sekolah_id: " . $_SESSION["sekolah_id"];

} // end if check, apakah user sudah pada posisi berhasil login

?>

<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$c201_home->terminate();
?>