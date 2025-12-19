<?php
declare(strict_types=1);


$currentPage = $_SERVER['SCRIPT_NAME'];
if (!isset($_SESSION["visited_pages"])) {
    $_SESSION["visited_pages"] = [];
}

$_SESSION["visited_pages"][] = $currentPage;
?>
