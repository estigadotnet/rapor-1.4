<?php
namespace PHPMaker2020\p_rapor_1_4;

// Menu Language
if ($Language && function_exists(PROJECT_NAMESPACE . "Config") && $Language->LanguageFolder == Config("LANGUAGE_FOLDER")) {
	$MenuRelativePath = "";
	$MenuLanguage = &$Language;
} else { // Compat reports
	$LANGUAGE_FOLDER = "../lang/";
	$MenuRelativePath = "../";
	$MenuLanguage = new Language();
}

// Navbar menu
$topMenu = new Menu("navbar", TRUE, TRUE);
$topMenu->addMenuItem(6, "mi_c201_home", $MenuLanguage->MenuPhrase("6", "MenuText"), $MenuRelativePath . "c201_home.php", -1, "", AllowListMenu('{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}c201_home.php'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(7, "mci_Setup", $MenuLanguage->MenuPhrase("7", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(1, "mi_t001_sekolah", $MenuLanguage->MenuPhrase("1", "MenuText"), $MenuRelativePath . "t001_sekolahlist.php", 7, "", AllowListMenu('{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t001_sekolah'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(8, "mci_Setting", $MenuLanguage->MenuPhrase("8", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(2, "mi_t201_employees", $MenuLanguage->MenuPhrase("2", "MenuText"), $MenuRelativePath . "t201_employeeslist.php", 8, "", AllowListMenu('{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t201_employees'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(3, "mi_t202_userlevels", $MenuLanguage->MenuPhrase("3", "MenuText"), $MenuRelativePath . "t202_userlevelslist.php", 8, "", AllowListMenu('{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t202_userlevels'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(4, "mi_t203_userlevelpermissions", $MenuLanguage->MenuPhrase("4", "MenuText"), $MenuRelativePath . "t203_userlevelpermissionslist.php", 8, "", AllowListMenu('{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t203_userlevelpermissions'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(5, "mi_t204_audittrail", $MenuLanguage->MenuPhrase("5", "MenuText"), $MenuRelativePath . "t204_audittraillist.php", 8, "", AllowListMenu('{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t204_audittrail'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(9, "mi_t101_session", $MenuLanguage->MenuPhrase("9", "MenuText"), $MenuRelativePath . "t101_sessionlist.php", 8, "", AllowListMenu('{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t101_session'), FALSE, FALSE, "", "", TRUE);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", TRUE, FALSE);
$sideMenu->addMenuItem(6, "mi_c201_home", $MenuLanguage->MenuPhrase("6", "MenuText"), $MenuRelativePath . "c201_home.php", -1, "", AllowListMenu('{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}c201_home.php'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(7, "mci_Setup", $MenuLanguage->MenuPhrase("7", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(1, "mi_t001_sekolah", $MenuLanguage->MenuPhrase("1", "MenuText"), $MenuRelativePath . "t001_sekolahlist.php", 7, "", AllowListMenu('{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t001_sekolah'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(8, "mci_Setting", $MenuLanguage->MenuPhrase("8", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(2, "mi_t201_employees", $MenuLanguage->MenuPhrase("2", "MenuText"), $MenuRelativePath . "t201_employeeslist.php", 8, "", AllowListMenu('{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t201_employees'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(3, "mi_t202_userlevels", $MenuLanguage->MenuPhrase("3", "MenuText"), $MenuRelativePath . "t202_userlevelslist.php", 8, "", AllowListMenu('{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t202_userlevels'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(4, "mi_t203_userlevelpermissions", $MenuLanguage->MenuPhrase("4", "MenuText"), $MenuRelativePath . "t203_userlevelpermissionslist.php", 8, "", AllowListMenu('{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t203_userlevelpermissions'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(5, "mi_t204_audittrail", $MenuLanguage->MenuPhrase("5", "MenuText"), $MenuRelativePath . "t204_audittraillist.php", 8, "", AllowListMenu('{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t204_audittrail'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(9, "mi_t101_session", $MenuLanguage->MenuPhrase("9", "MenuText"), $MenuRelativePath . "t101_sessionlist.php", 8, "", AllowListMenu('{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t101_session'), FALSE, FALSE, "", "", TRUE);
echo $sideMenu->toScript();
?>