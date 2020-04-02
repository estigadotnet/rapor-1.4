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

// ambil data tahun ajaran
$q = "select * from t002_tahunajaran";
$r_ta = ExecuteRows($q);

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

	// check data default setting pada tabel t205_default
	// berdasarkan userid yang login
	$user_id = CurrentUserInfo("EmployeeID");
	$q = "select count(User_ID) from t205_default where User_ID = ".$user_id."";
	$data_count = ExecuteScalar($q); //echo "data_count: " . $data_count;
	if ($data_count == 0) {
	}
	else {
		$q = "select * from t205_default where User_ID = ".$user_id.""; //echo $q;
		$r_user = ExecuteRows($q);
		foreach($r_user as $r2) {
			foreach($r2 as $key => $value) {
				if ($r2["Keterangan"] == "Sekolah") {
					$_SESSION["sekolah_id"] = $r2["Nilai"];
				}
				if ($r2["Keterangan"] == "Tahun Ajaran") {
					$_SESSION["tahunajaran_id"] = $r2["Nilai"];
				}
			}
		}
	}
	

	// checking session
	if (!isset($_SESSION["sekolah_id"])) {
		$_SESSION["sekolah_id"] = "0";
	}
	if (!isset($_SESSION["tahunajaran_id"])) {
		$_SESSION["tahunajaran_id"] = "0";
	}

	// check session & variable
	if (
		(!isset($_GET["x_sekolah_id"]) and $_SESSION["sekolah_id"] == "0")
		or
		(isset($_GET["x_sekolah_id"]) and $_GET["x_sekolah_id"] == "0")
		or
		(!isset($_GET["x_tahunajaran_id"]) and $_SESSION["tahunajaran_id"] == "0")
		or
		(isset($_GET["x_tahunajaran_id"]) and $_GET["x_tahunajaran_id"] == "0")
		)
		{
		$show_combo = 1;
	}
	else {
		if (isset($_GET["x_sekolah_id"])) {
			$_SESSION["sekolah_id"] = $_GET["x_sekolah_id"];
		}
		if (isset($_GET["x_tahunajaran_id"])) {
			$_SESSION["tahunajaran_id"] = $_GET["x_tahunajaran_id"];
		}
	}

	if ($_SESSION["sekolah_id"] <> "0" and $_SESSION["tahunajaran_id"] <> "0") {

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

		// ambil detail tahun ajaran
		$tahun_ajaran = "Belum ada Data Tahun Ajaran yang terpilih !";
		foreach($r_ta as $r2) {
			foreach($r2 as $key => $value) {
				//echo "key = " . $key . ", value = " . $value .";<br/>";
				if ($r2["id"] == $_SESSION["tahunajaran_id"]) {
					//echo "Sekolah: " . $r2["Nama"];
					$tahun_ajaran = $r2["Mulai"] . " / " . $r2["Selesai"];
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
		?>
		<table border="0">
			<tr><td>Sekolah</td><td>:</td><td><?php echo $sekolah_nama;?></td></tr>
			<tr><td>Tahun Ajaran</td><td>:</td><td><?php echo $tahun_ajaran;?></td></tr>
			<tr><td>Username</td><td>:</td><td><?php echo CurrentUserInfo("Username");?></td></tr>
			<tr><td>Hak Akses</td><td>:</td><td><?php echo $hak_akses;?></td></tr>
		</table>
		<?php
	}

	if ($show_combo == 1) {
		?>
		<form action="c201_home.php" method="get">
			<!-- sekolah_id -->
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
			<!-- tahunajaran_id -->
			<div id="r_tahunajaran_id" class="form-group row">
				<label for="x_tahunajaran_id" class="col-sm-2 col-form-label ew-label">Tahun Ajaran<i data-phrase="FieldRequiredIndicator" class="fas fa-asterisk ew-required" data-caption=""></i></label>
				<div class="col-sm-10">
					<div>
						<span>
							<div class="input-group">
								<select class="custom-select ew-custom-select" id="x_tahunajaran_id" name="x_tahunajaran_id">
									<option value="0">Please select</option>		
									<option value="1">2019/2020</option>
									<option value="2">2020/2021</option>
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