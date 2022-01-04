<?php
require('main.php');
function calculateFit($elementSizeX, $elementSizeY, $gutterSize, $sheetMargin, $sheetSizeX, $sheetSizeY)
{
    $elementMaxSizeX = $elementSizeX + $gutterSize;
    $elementMaxSizeY = $elementSizeY + $gutterSize;

    $sheetMaxSizeX = ($sheetSizeX - $sheetMargin);
    $sheetMaxSizeY = ($sheetSizeY - $sheetMargin);

    $elementsXperSheetX = $sheetMaxSizeX / $elementMaxSizeX;
    $elementsXperSheetY = $sheetMaxSizeY / $elementMaxSizeX;
    $elementsYperSheetX = $sheetMaxSizeX / $elementMaxSizeY;
    $elementsYperSheetY = $sheetMaxSizeY / $elementMaxSizeY;

    $array = compact('elementsXperSheetX', 'elementsXperSheetY', 'elementsYperSheetX', 'elementsYperSheetY');
    $value = max($array);
    $key = array_search($value, $array);
    return $key . " " . $value;
}

function calculateSheet($elementSizeX, $elementSizeY, $gutterSize, $sheetMargin, $sheetSizeX, $sheetSizeY)
{
    $fit = calculateFit($elementSizeX, $elementSizeY, $gutterSize, $sheetMargin, $sheetSizeX, $sheetSizeY);
    $fit = explode(' ', $fit);

    $elementOrientation = $fit[0];
    $elementAmount = floor($fit[1]);

    switch ($elementOrientation) {
        case "elementsXperSheetX":
            return "xx" . $elementAmount;
            break;
        case "elementsXperSheetY":
            return "xy" . $elementAmount;
            break;
        case "elementsYperSheetX":
            return "yx" . $elementAmount;
            break;
        case "elementsYperSheetY":
            return "yy" . $elementAmount;
            break;
    }
}

function sheetPreview($elementSizeX, $elementSizeY, $gutterSize, $sheetMargin, $sheetSizeX, $sheetSizeY) {
    echo calculateSheet($elementSizeX, $elementSizeY, $gutterSize, $sheetMargin, $sheetSizeX, $sheetSizeY);
}
