<?php
require('code/main.php');
include_once('code/functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
    <script src="/js/scripts.js"></script>
        
    <title>Originalen | Cut Tool</title>
</head>
<body>
    <main class="d-flex flex-column justify-content-center align-items-center">
        <h1 class="text-primary">Originalen Cut Tool</h1>
        
        <form method="POST" action="" class="d-flex flex-column w-25">
    
            <label for="elementSizeX">Bredde på element:</label>
            <input type="number" name="elementSizeX" placeholder="Bredde i mm" value="<?php echo isset($elementSizeX) ? $elementSizeX : '';?>">
            <label for="elementSizeY">Højde på element:</label>
            <input type="number" name="elementSizeY" placeholder="Højde i mm" value="<?php echo isset($elementSizeY) ? $elementSizeY: '';?>">

            <label for="gutterSize">Luft imellem:</label>
            <input type="number" name="gutterSize" value="6">

            <label for="sheetMargin">Margin til kant:</label>
            <input type="number" name="sheetMargin" value="5">

            <label for="sheetSize">Vælg størrelse:</label>
            <div>
                <input type="radio" name="sheetSize" id="sra" value="sra" checked onclick="javascript:customSizeCheck();">
                <label for="sra">SRA 320x450mm</label>                
            </div>
            <div>
                <input type="radio" name="sheetSize" id="a3" value="a3" onclick="javascript:customSizeCheck();">
                <label for="a3">A3 297x420mm</label>                
            </div>
            <div>
                <input type="radio" name="sheetSize" id="a4" value="a4" onclick="javascript:customSizeCheck();">
                <label for="a4">A4 210x297mm</label> 
            </div>

            <div>
                <input type="radio" name="sheetSize" id="customSize" onclick="javascript:customSizeCheck();" value="">
                <label for="customSize">Bestem størrelse</label>
                <div id="customSizeDiv">
                    <input type="text" name="sheetSizeX" id="sheetSizeX" placeholder="Bredde i mm">
                    <input type="text" name="sheetSizeY" id="sheetSizeY" placeholder="Højde i mm">
                </div>
            </div>
            
            <input type="submit" class="btn btn-primary" value="Beregn">
        </form>

        <figure class="figure mt-3">
            <img src="/assets/400x300.svg" class="figure img-fluid rounded">
            <figcaption class="figure-caption text-center">Placeholder</figcaption>
        </figure>

        <div id="elementsDiv">
            <?php
                sheetPreview($elementSizeX, $elementSizeY, $gutterSize, $sheetMargin, $sheetSizeX, $sheetSizeY)
            ?>
        </div>
    </main>
<!-- <script>
    var elementsXperSheetX = <?php echo json_encode($elementsXperSheetX, JSON_HEX_TAG); ?>;
    var elementsXperSheetY = <?php echo json_encode($elementsXperSheetY, JSON_HEX_TAG); ?>;
    var elementsYperSheetX = <?php echo json_encode($elementsYperSheetX, JSON_HEX_TAG); ?>;
    var elementsYperSheetY = <?php echo json_encode($elementsYperSheetY, JSON_HEX_TAG); ?>;

    var c = document.getElementById("sheetCanvas");
    var ctx = c.getContext("2d");
    ctx.beginPath();
    ctx.rect();
    ctx.stroke();
</script> -->
</body>
</html>