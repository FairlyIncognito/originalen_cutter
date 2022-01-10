<?php
require('main.php');

function calculateFit($elementSizeX, $elementSizeY, $gutterSize, $sheetMargin, $sheetSizeX, $sheetSizeY)
{
    $elementMaxSizeX = $elementSizeX + $gutterSize;
    $elementMaxSizeY = $elementSizeY + $gutterSize;

    $sheetMaxSizeX = ($sheetSizeX - $sheetMargin);
    $sheetMaxSizeY = ($sheetSizeY - $sheetMargin);

    // get whole numbers
    $elementsXperSheetY = floor($sheetMaxSizeY / $elementMaxSizeX);
    $elementsXperSheetX = floor($sheetMaxSizeX / $elementMaxSizeX);
    $elementsYperSheetY = floor($sheetMaxSizeY / $elementMaxSizeY);
    $elementsYperSheetX = floor($sheetMaxSizeX / $elementMaxSizeY);
    
    // return array of calculated values
    return $array = compact('elementsXperSheetX', 'elementsXperSheetY', 'elementsYperSheetX', 'elementsYperSheetY');
}

function sheetPreview($elementSizeX, $elementSizeY, $gutterSize, $sheetMargin, $sheetSizeX, $sheetSizeY)
{
    // call the calculateFit function
    $sheet = calculateFit($elementSizeX, $elementSizeY, $gutterSize, $sheetMargin, $sheetSizeX, $sheetSizeY);

    // find highest value in array and apply variables to the name and value
    $max = max($sheet);
    echo $orientation = array_search($max, $sheet);

    $sheetHeight = $sheetSizeY;
    $sheetWidth = $sheetSizeX;

    switch ($orientation) {
        case 'elementsXperSheetY':
            $columns = $elementSizeX;
            $rows = $elementSizeY;
            $elementHeight = $elementSizeY;
            $elementWidth = $elementSizeX;
            $orientationY = $sheet["elementsYperSheetY"];
            $orientationX = $sheet["elementsXperSheetX"];
            break;
        case 'elementsXperSheetX':
            $columns = $elementSizeY;
            $rows = $elementSizeX;
            $elementHeight = $elementSizeX;
            $elementWidth = $elementSizeY;
            $orientationY = $sheet["elementsYperSheetX"];
            $orientationX = $sheet["elementsXperSheetY"];
            break;
        case 'elementsYperSheetY':
            $columns = $elementSizeY;
            $rows = $elementSizeX;
            $elementHeight = $elementSizeX;
            $elementWidth = $elementSizeY;
            $orientationY = $sheet["elementsXperSheetY"];
            $orientationX = $sheet["elementsYperSheetX"];
            break;
        case 'elementsYperSheetX':
            $columns = $elementSizeX;
            $rows = $elementSizeY;
            $elementHeight = $elementSizeY;
            $elementWidth = $elementSizeX;
            $orientationY = $sheet["elementsXperSheetX"];
            $orientationX = $sheet["elementsYperSheetY"];
            break;
    }

    $amount = $orientationY * $orientationX;
    $i = $amount;
    
    echo
        "<div class='sheet' style='
            width:$sheetWidth" . "px;" . "
            height:$sheetHeight" . "px;" . "
            padding:$sheetMargin" . "px;" . "
            grid-template-columns: repeat( auto-fill, minmax($columns" . "px, 1fr) );" . "
            grid-template-rows: repeat( auto-fill, minmax($rows" . "px, 1fr) );" . "
            grid-gap:$gutterSize" . "px;" .
        "'>";
    
        for ($i; $i >= 1; $i--) {
        echo
            "<div style='
                width:$elementWidth" . "px;" . "
                height:$elementHeight" . "px;" .
            "'>
            </div>";
    }
    echo '</div>';

    echo "<p>Antal: $amount</p>";
}
