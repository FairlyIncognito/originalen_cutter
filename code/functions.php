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

function sheetPreview($elementSizeX, $elementSizeY, $gutterSize, $sheetMargin, $sheetSizeX, $sheetSizeY) {
    $fit = calculateFit($elementSizeX, $elementSizeY, $gutterSize, $sheetMargin, $sheetSizeX, $sheetSizeY);

    echo $fit;
}