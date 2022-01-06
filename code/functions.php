<?php
require('main.php');

function calculateFit($elementSizeX, $elementSizeY, $gutterSize, $sheetMargin, $sheetSizeX, $sheetSizeY)
{
    $elementMaxSizeX = $elementSizeX + $gutterSize;
    $elementMaxSizeY = $elementSizeY + $gutterSize;

    $sheetMaxSizeX = ($sheetSizeX - $sheetMargin);
    $sheetMaxSizeY = ($sheetSizeY - $sheetMargin);

    $elementsXperSheetY = floor($sheetMaxSizeY / $elementMaxSizeX);
    $elementsYperSheetX = floor($sheetMaxSizeX / $elementMaxSizeY);
    $elementsYperSheetY = floor($sheetMaxSizeY / $elementMaxSizeY);
    $elementsXperSheetX = floor($sheetMaxSizeX / $elementMaxSizeX);

    $array = compact('elementsXperSheetX', 'elementsXperSheetY', 'elementsYperSheetX', 'elementsYperSheetY');
    return $array;
}

function sheetPreview($elementSizeX, $elementSizeY, $gutterSize, $sheetMargin, $sheetSizeX, $sheetSizeY)
{
    $sheet = calculateFit($elementSizeX, $elementSizeY, $gutterSize, $sheetMargin, $sheetSizeX, $sheetSizeY);

    $value = max($sheet);
    $key = array_search($value, $sheet);
    $i = ($value);

    $orientation = $key;
    switch ($orientation) {
        case 'elementsXperSheetY':
            echo 'xy';
            break;
        case 'elementsXperSheetX':
            echo 'xx';
            break;
        case 'elementsYperSheetY':
            echo 'yy';
            break;
        case 'elementsYperSheetX':
            echo 'yx';
            break;
    }
    
    echo
        "<div class='sheet' style='
            width:$sheetSizeX" . "px;" . "
            height:$sheetSizeY" . "px;" . "
            padding:$sheetMargin" . "px;" . "
            grid-template-columns: repeat( auto-fill, minmax($elementSizeX" . "px, 1fr) );" . "
            grid-template-rows: repeat( auto-fill, minmax($elementSizeY" . "px, 1fr) );" . "
            grid-gap:$gutterSize" . "px;" .
        "'>";
    
        for ($i; $i >= 1; $i--) {
        echo
            "<div style='
                width:$elementSizeX" . "px;" . "
                height:$elementSizeY" . "px;" .
            "'>
            </div>";
    }
    echo '</div>';

    echo '<pre>';
    var_dump($sheet);
    echo '</pre>';
}
