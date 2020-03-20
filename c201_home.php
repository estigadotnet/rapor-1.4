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
<?php

// ambil data sekolah
$q = "select * from t001_sekolah";
$r = ExecuteRows($q);
// var_dump($r);

// ambil data hak akses
$q = "select * from t202_userlevels";
$r_ul = ExecuteRows($q);
?>

<?php
//echo "CurrentUserName() : " . CurrentUserName() . "<br/>";
//echo "CurrentUserID()   : " . CurrentUserID() . "<br/>";
//echo "CurrentUserLevel(): " . CurrentUserLevel() . "<br/>";
//echo "Field [Username]  : " . CurrentUserInfo("Username") . "<br/>";
//echo "Field [EmployeeID]: " . CurrentUserInfo("EmployeeID") . "<br/>";
//echo "Field [UserLeve]: " . CurrentUserInfo("UserLevel") . "<br/>";

$userlevelid = CurrentUserInfo("UserLevel");
$show_combo = 0;

if (IsLoggedIn()) {

	if (!isset($_SESSION["sekolah_id"])) {
		$_SESSION["sekolah_id"] = "0";
	}

	if (
		(!isset($_GET["x_sekolah_id"]) and $_SESSION["sekolah_id"] == "0")
		or
		(isset($_GET["x_sekolah_id"]) and $_GET["x_sekolah_id"] == "0")
		) {

		$show_combo = 1;
	}
	else {
		if (isset($_GET["x_sekolah_id"])) {
			$_SESSION["sekolah_id"] = $_GET["x_sekolah_id"];
		}
	}

	if ($_SESSION["sekolah_id"] <> "0") {

		// ambil detail data sekolah
		$sekolah_nama = "Belum ada Data Sekolah yang terpilih !";
		foreach($r as $r2) {
			foreach($r2 as $key => $value) {
				//echo "key = " . $key . ", value = " . $value .";<br/>";
				if ($r2["id"] == $_SESSION["sekolah_id"]) {
					//echo "Sekolah: " . $r2["Nama"];
					$sekolah_nama = $r2["Nama"];
				}
			}
		}

		// ambil detail data userlevels
		$hak_akses = "Belum ada Hak Akses yang terpilih";
		foreach($r_ul as $r2) {
			foreach($r2 as $key => $value) {
				//echo "key = " . $key . ", value = " . $value .";<br/>";
				if ($r2["userlevelid"] == $userlevelid) {
					//echo "Sekolah: " . $r2["Nama"];
					$hak_akses = $r2["userlevelname"];
				}
			}
		}
		//echo "Sekolah: " . $_SESSION["sekolah_id"];
		//echo "Sekolah: " . $sekolah_nama . "<br/>";
		//echo "Username: " . CurrentUserInfo("Username") . "<br/>";
		//echo "Hak Akses: " . CurrentUserInfo("UserLevel") . "<br/>";
		//echo "Hak Akses: " . $hak_akses . "<br/>";
		?>
		<table border="0">
			<tr><td>Sekolah</td><td>:</td><td><?php echo $sekolah_nama;?></td></tr>
			<tr><td>Username</td><td>:</td><td><?php echo CurrentUserInfo("Username");?></td></tr>
			<tr><td>Hak Akses</td><td>:</td><td><?php echo $hak_akses;?></td></tr>
		</table>
		<?php
	}

	if ($show_combo == 1) {
		?>
		<form action="c201_home.php" method="get">
			<div id="r_sekolah_id" class="form-group row">
				<label id="elh_t101_session_sekolah_id" for="x_sekolah_id" class="col-sm-2 col-form-label ew-label">Sekolah<i data-phrase="FieldRequiredIndicator" class="fas fa-asterisk ew-required" data-caption=""></i></label>
				<div class="col-sm-10">
					<div>
						<span id="el_t101_session_sekolah_id">
							<div class="input-group">
								<select class="custom-select ew-custom-select" data-table="t101_session" data-field="x_sekolah_id" data-value-separator=", " id="x_sekolah_id" name="x_sekolah_id">
									<option value="0">Please select</option>		
									<option value="1">MINU Karakter Bojonegoro</option>
									<option value="2">MINU Unggulan Bojonegoro</option>
								</select>
							</div>
						</span>
					</div>
				</div>
			</div>
			<div class="col-sm-10 offset-sm-2">
				<!-- buttons offset -->
				<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit">Submit</button>
				<!-- <button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="http://localhost:8080/rapor-1.4/t101_sessionlist.php">Cancel</button> -->
			</div>
		</form>
		<?php
	}

}
?>

<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$c201_home->terminate();
?>