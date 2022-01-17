<?php
// error reporting
error_reporting(-1);
ini_set('display_errors', 'On');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $elementSizeX = htmlspecialchars($_POST['elementSizeX']);
    $elementSizeY = htmlspecialchars($_POST['elementSizeY']);
    $gutterSize = htmlspecialchars($_POST['gutterSize']);
    $sheetMargin = htmlspecialchars($_POST['sheetMargin']);

    if (isset($_POST['sheetSizeX'])) {
        $sheetSizeX = htmlspecialchars($_POST['sheetSizeX']);
    }
    if (isset($_POST['sheetSizeY'])) {
        $sheetSizeY = htmlspecialchars($_POST['sheetSizeY']);
    }
    if (isset($_POST['sheetSize'])) {
        $sheetSize = htmlspecialchars($_POST['sheetSize']);

        if ($sheetSize === "sra") {
            $sheetSizeX = 320;
            $sheetSizeY = 450;
        } elseif ($sheetSize === "a3") {
            $sheetSizeX = 297;
            $sheetSizeY = 420;
        } elseif ($sheetSize === "a4") {
            $sheetSizeX = 210;
            $sheetSizeY = 297;
        }
    }
}