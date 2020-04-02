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
$user_id = CurrentUserID();

echo $user_id;
?>

<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$c202_home->terminate();
?>