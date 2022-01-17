<?php
namespace Originalen\Model;
require 'Element.php';
require 'Sheet.php';
require($_SERVER['DOCUMENT_ROOT'].'/code/main.php');

class Preview 
{
    function previewRender() {
        require($_SERVER['DOCUMENT_ROOT'].'/code/main.php');
        $element = new Element($elementSizeY, $elementSizeX);
        $sheet = new Sheet($sheetSizeY, $sheetSizeX, $gutterSize, $sheetMargin);
        
        // returns an array with 3 variables; determines amount of elements on x and y axis + amount of elements.
        $fit = $sheet->calculateFit($elementSizeY, $elementSizeX, $sheetSizeY, $sheetSizeX, $gutterSize, $sheetMargin);

        $orientation = array_keys($fit)[0];
        if($orientation == 'elementHeightOnSheetHeight') {
            $sheetWidth = $sheet->sheetWidth;
            $sheetHeight = $sheet->sheetHeight;
            $rows = $element->elementHeight;
            $columns = $element->elementWidth;
            $elementWidth = $element->elementWidth;
            $elementHeight = $element->elementHeight;
        } else if ($orientation == 'elementHeightOnSheetWidth') {
            $sheetWidth = $sheet->sheetWidth;
            $sheetHeight = $sheet->sheetHeight;
            $rows = $element->elementWidth;
            $columns = $element->elementHeight;
            $elementWidth = $element->elementHeight;
            $elementHeight = $element->elementWidth;
        } else if($orientation == 'elementWidthOnSheetHeight') {
            $sheetWidth = $sheet->sheetWidth;
            $sheetHeight = $sheet->sheetHeight;
            $rows = $element->elementWidth;
            $columns = $element->elementHeight;
            $elementWidth = $element->elementHeight;
            $elementHeight = $element->elementWidth;
        } else if($orientation == 'elementWidthOnSheetWidth') {
            $sheetWidth = $sheet->sheetWidth;
            $sheetHeight = $sheet->sheetHeight;
            $rows = $element->elementHeight;
            $columns = $element->elementWidth;
            $elementWidth = $element->elementWidth;
            $elementHeight = $element->elementHeight;
        }

        echo '<aside class="d-flex flex-column">';
        echo '<h2 class="text-primary">Preview</h2>';
        echo
            "<div class='sheet' style='
                width:$sheetWidth" . "px;" . "
                height:$sheetHeight" . "px;" . "
                padding:$sheetMargin" . "px;" . "
                grid-template-columns: repeat( auto-fill, minmax($columns" . "px, 1fr) );" . "
                grid-template-rows: repeat( auto-fill, minmax($rows" . "px, 1fr) );" . "
                grid-gap:$gutterSize" . "px;" .
            "'>";
            // set $i to amount of elements from the calculateFit function
            $amount = $fit['amount'];
            $i = $amount;
            // for each element, make a div with the set sizes
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
        echo '</aside>';
    }
}

$preview = new Preview();