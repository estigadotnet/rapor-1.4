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
$c202_home = new c202_home();

// Run the page
$c202_home->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php"; ?>
<?php

if (IsLoggedIn()) { // check apakah sudah berhasil login

	// posisi sudah berhasil login

	// step 1
	$user_id = CurrentUserID();

	// step 2
	$q = "select count(User_ID) from t205_default where User_ID = ".$user_id."";
	$data_count = ExecuteScalar($q); //echo "data_count: " . $data_count;

	// step 3
	// id
	$sekolah_id = 0;
	$kelas_id = 0;
	$semester_id = 0;
	$tahunajaran_id = 0;

	// value
	$sekolah_nama = "null";
	$kelas = "null";
	$semester = "null";
	$tahunajaran = "null";
	
	if ($data_count <> 0) {
		// sekolah
		$q = "select Nilai from t205_default where User_ID = ".$user_id." and Field_id = 'sekolah_id'";
		$sekolah_id = ExecuteScalar($q);
		$q = "select Nama from t001_sekolah where id = ".$sekolah_id."";
		$sekolah_nama = ExecuteScalar($q);

		// kelas
		$q = "select Nilai from t205_default where User_ID = ".$user_id." and Field_id = 'kelas_id'";
		$kelas_id = ExecuteScalar($q);
		$q = "select Kelas from t003_kelas where id = ".$kelas_id."";
		$kelas = ExecuteScalar($q);

		// semester
		$q = "select Nilai from t205_default where User_ID = ".$user_id." and Field_id = 'semester_id'";
		$semester_id = ExecuteScalar($q);
		$q = "select Semester from t004_semester where id = ".$semester_id."";
		$semester = ExecuteScalar($q);

		// tahun ajaran
		$q = "select Nilai from t205_default where User_ID = ".$user_id." and Field_id = 'tahunajaran_id'";
		$tahunajaran_id = ExecuteScalar($q);
		$q = "select concat(Mulai,'/',Selesai) from t002_tahunajaran where id = ".$tahunajaran_id."";
		$tahunajaran = ExecuteScalar($q);
	}

	//echo "<pre>";
	//echo "user_id       : ".$user_id."<br/>";
	//echo "data_count    : ".$data_count."<br/>";
	//echo "sekolah_id    : ".$sekolah_id."<br/>";
	//echo "tahunajaran_id: ".$tahunajaran_id."<br/>";
	//echo "username      : ".CurrentUserName()."<br/>";
	//echo "userlevel     : ".CurrentUserLevel()."<br/>";
	//echo "</pre>";
	?>
	<table border="0">
		<!-- <tr><td>user_id</td><td>:</td><td><?php echo $user_id;?></td></tr> -->
		<!-- <tr><td>data_count</td><td>:</td><td><?php echo $data_count;?></td></tr> -->
		<tr><td>Sekolah</td><td>:</td><td><?php echo $sekolah_nama;?></td></tr>
		<tr><td>Kelas</td><td>:</td><td><?php echo $kelas;?></td></tr>
		<tr><td>Semester</td><td>:</td><td><?php echo $semester;?></td></tr>
		<tr><td>Tahun Ajaran</td><td>:</td><td><?php echo $tahunajaran;?></td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>User Name</td><td>:</td><td><?php echo CurrentUserName();?></td></tr>
		<!-- <tr><td>user_level</td><td>:</td><td><?php echo CurrentUserLevel();?></td></tr> -->
	</table>
	<?php
} // end if (IsLoggedIn())
?>

<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$c202_home->terminate();
?>