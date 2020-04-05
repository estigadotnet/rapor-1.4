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
$topMenu->addMenuItem(12, "mi_c202_home", $MenuLanguage->MenuPhrase("12", "MenuText"), $MenuRelativePath . "c202_home.php", -1, "", AllowListMenu('{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}c202_home.php'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(7, "mci_Setup", $MenuLanguage->MenuPhrase("7", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(1, "mi_t001_sekolah", $MenuLanguage->MenuPhrase("1", "MenuText"), $MenuRelativePath . "t001_sekolahlist.php", 7, "", AllowListMenu('{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t001_sekolah'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(13, "mi_t003_kelas", $MenuLanguage->MenuPhrase("13", "MenuText"), $MenuRelativePath . "t003_kelaslist.php", 7, "", AllowListMenu('{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t003_kelas'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(14, "mi_t004_semester", $MenuLanguage->MenuPhrase("14", "MenuText"), $MenuRelativePath . "t004_semesterlist.php", 7, "", AllowListMenu('{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t004_semester'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(10, "mi_t002_tahunajaran", $MenuLanguage->MenuPhrase("10", "MenuText"), $MenuRelativePath . "t002_tahunajaranlist.php", 7, "", AllowListMenu('{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t002_tahunajaran'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(8, "mci_Setting", $MenuLanguage->MenuPhrase("8", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(11, "mi_t205_default", $MenuLanguage->MenuPhrase("11", "MenuText"), $MenuRelativePath . "t205_defaultlist.php", 8, "", AllowListMenu('{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t205_default'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(2, "mi_t201_employees", $MenuLanguage->MenuPhrase("2", "MenuText"), $MenuRelativePath . "t201_employeeslist.php", 8, "", AllowListMenu('{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t201_employees'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(3, "mi_t202_userlevels", $MenuLanguage->MenuPhrase("3", "MenuText"), $MenuRelativePath . "t202_userlevelslist.php", 8, "", AllowListMenu('{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t202_userlevels'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(5, "mi_t204_audittrail", $MenuLanguage->MenuPhrase("5", "MenuText"), $MenuRelativePath . "t204_audittraillist.php", 8, "", AllowListMenu('{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t204_audittrail'), FALSE, FALSE, "", "", TRUE);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", TRUE, FALSE);
$sideMenu->addMenuItem(12, "mi_c202_home", $MenuLanguage->MenuPhrase("12", "MenuText"), $MenuRelativePath . "c202_home.php", -1, "", AllowListMenu('{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}c202_home.php'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(7, "mci_Setup", $MenuLanguage->MenuPhrase("7", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(1, "mi_t001_sekolah", $MenuLanguage->MenuPhrase("1", "MenuText"), $MenuRelativePath . "t001_sekolahlist.php", 7, "", AllowListMenu('{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t001_sekolah'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(13, "mi_t003_kelas", $MenuLanguage->MenuPhrase("13", "MenuText"), $MenuRelativePath . "t003_kelaslist.php", 7, "", AllowListMenu('{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t003_kelas'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(14, "mi_t004_semester", $MenuLanguage->MenuPhrase("14", "MenuText"), $MenuRelativePath . "t004_semesterlist.php", 7, "", AllowListMenu('{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t004_semester'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(10, "mi_t002_tahunajaran", $MenuLanguage->MenuPhrase("10", "MenuText"), $MenuRelativePath . "t002_tahunajaranlist.php", 7, "", AllowListMenu('{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t002_tahunajaran'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(8, "mci_Setting", $MenuLanguage->MenuPhrase("8", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(11, "mi_t205_default", $MenuLanguage->MenuPhrase("11", "MenuText"), $MenuRelativePath . "t205_defaultlist.php", 8, "", AllowListMenu('{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t205_default'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(2, "mi_t201_employees", $MenuLanguage->MenuPhrase("2", "MenuText"), $MenuRelativePath . "t201_employeeslist.php", 8, "", AllowListMenu('{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t201_employees'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(3, "mi_t202_userlevels", $MenuLanguage->MenuPhrase("3", "MenuText"), $MenuRelativePath . "t202_userlevelslist.php", 8, "", AllowListMenu('{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t202_userlevels'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(5, "mi_t204_audittrail", $MenuLanguage->MenuPhrase("5", "MenuText"), $MenuRelativePath . "t204_audittraillist.php", 8, "", AllowListMenu('{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t204_audittrail'), FALSE, FALSE, "", "", TRUE);
echo $sideMenu->toScript();
?>