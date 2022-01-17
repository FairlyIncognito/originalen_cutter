<?php
namespace Originalen\Model;

class Sheet
{
    function __construct($sheetHeight, $sheetWidth, $sheetGap, $sheetMargin)
    {   
        $this->sheetHeight = $sheetHeight;  
        $this->sheetWidth = $sheetWidth;
        $this->sheetGap = $sheetGap;
        $this->sheetMargin = $sheetMargin;
    }
    
    function calculateFit($elementHeight, $elementWidth, $sheetHeight, $sheetWidth, $sheetGap, $sheetMargin)
    {
        $elementHeightAndGap = $elementHeight + $sheetGap;
        $elementWidthAndGap = $elementWidth + $sheetGap;

        $sheetHeightAndMargin = $sheetHeight - $sheetMargin;
        $sheetWidthAndMargin = $sheetWidth - $sheetMargin;

        $elementHeightOnSheetHeight = $sheetHeightAndMargin / $elementHeightAndGap;
        $elementHeightOnSheetWidth = $sheetWidthAndMargin / $elementHeightAndGap;
        $elementWidthOnSheetHeight = $sheetHeightAndMargin / $elementWidthAndGap;
        $elementWidthOnSheetWidth = $sheetWidthAndMargin / $elementWidthAndGap;

        $arrayElements = array();
        $arrayElements['elementHeightOnSheetHeight'] = floor($elementHeightOnSheetHeight);
        $arrayElements['elementHeightOnSheetWidth'] = floor($elementHeightOnSheetWidth);
        $arrayElements['elementWidthOnSheetHeight'] = floor($elementWidthOnSheetHeight);
        $arrayElements['elementWidthOnSheetWidth'] = floor($elementWidthOnSheetWidth);
        $max = max($arrayElements);
        $max = array_search($max, $arrayElements);

        if($max == 'elementHeightOnSheetHeight') {
            $array = array();
            $array['elementHeightOnSheetHeight'] = $arrayElements['elementHeightOnSheetHeight'];
            $array['elementWidthOnSheetWidth'] =  $arrayElements['elementWidthOnSheetWidth'];
            $array['amount'] = $array['elementHeightOnSheetHeight'] * $array['elementWidthOnSheetWidth'];
            return $array;
        } else if ($max == 'elementHeightOnSheetWidth') {
            $array = array();
            $array['elementHeightOnSheetWidth'] = $arrayElements['elementHeightOnSheetWidth'];
            $array['elementWidthOnSheetHeight'] =  $arrayElements['elementWidthOnSheetHeight'];
            $array['amount'] = $array['elementHeightOnSheetWidth'] * $array['elementWidthOnSheetHeight'];
            return $array;
        } else if($max == 'elementWidthOnSheetHeight') {
            $array = array();
            $array['elementWidthOnSheetHeight'] = $arrayElements['elementWidthOnSheetHeight'];
            $array['elementHeightOnSheetWidth'] =  $arrayElements['elementHeightOnSheetWidth'];
            $array['amount'] = $array['elementWidthOnSheetHeight'] * $array['elementHeightOnSheetWidth'];
            return $array;
        } else if($max == 'elementWidthOnSheetWidth') {
            $array = array();
            $array['elementWidthOnSheetWidth'] = $arrayElements['elementWidthOnSheetWidth'];
            $array['elementHeightOnSheetHeight'] =  $arrayElements['elementHeightOnSheetHeight'];
            $array['amount'] = $array['elementWidthOnSheetWidth'] * $array['elementHeightOnSheetHeight'];
            return $array;
        }
    }
}