<?php
require 'code/main.php';
require 'Originalen/Model/Preview.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://kit.fontawesome.com/449a34927a.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/scripts.js"></script>
        
    <title>Originalen | Cut Tool</title>
</head>
<body>
    <main class="d-flex flex-row flex-wrap justify-content-around align-items-around">
        <section class="d-flex flex-column">
            <h1 class="text-primary">Originalen Cut Tool</h1>
            
            <form method="POST" action="" class="d-flex flex-column">
        
                <label for="elementSizeX">Bredde på element:</label>
                <input type="number" name="elementSizeX" required placeholder="Bredde i mm" value="<?php echo isset($elementSizeX) ? $elementSizeX : '';?>">
                <label for="elementSizeY">Højde på element:</label>
                <input type="number" name="elementSizeY" required placeholder="Højde i mm" value="<?php echo isset($elementSizeY) ? $elementSizeY: '';?>">

                <label for="gutterSize">Luft imellem:</label>
                <input type="number" name="gutterSize" required value="<?php echo isset($gutterSize) ? $gutterSize : '6';?>">

                <label for="sheetMargin">Margin til kant:</label>
                <input type="number" name="sheetMargin" required value="<?php echo isset($sheetMargin) ? $sheetMargin : '5';?>">

                <label for="sheetSize">Vælg størrelse:</label>
                <div>
                    <input type="radio" name="sheetSize" class="sheetSize" id="sra" value="sra" checked required onclick="javascript:customSizeCheck();">
                    <label for="sra">SRA 320x450mm</label>                
                </div>
                <div>
                    <input type="radio" name="sheetSize" class="sheetSize" id="a3" value="a3" onclick="javascript:customSizeCheck();">
                    <label for="a3">A3 297x420mm</label>                
                </div>
                <div>
                    <input type="radio" name="sheetSize" class="sheetSize" id="a4" value="a4" onclick="javascript:customSizeCheck();">
                    <label for="a4">A4 210x297mm</label> 
                </div>

                <div>
                    <input type="radio" name="sheetSize" class="sheetSize" id="customSize" onclick="javascript:customSizeCheck();" value="">
                    <label for="customSize">Bestem størrelse</label>
                    <div id="customSizeDiv">                        
                        <input type="text" name="sheetSizeX" id="sheetSizeX" placeholder="Bredde i mm" value="<?php echo isset($sheetSizeX) ? $sheetSizeX : '';?>">
                        <button onclick="javascript:toggleCustomValue();"><i class="fas fa-exchange-alt text-primary"></i></button>                        
                        <input type="text" name="sheetSizeY" id="sheetSizeY" placeholder="Højde i mm" value="<?php echo isset($sheetSizeY) ? $sheetSizeY : '';?>">
                    </div>
                </div>
                
                <input type="submit" class="btn btn-primary" value="Beregn">
            </form>
        </section>

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $preview->previewRender();
            } 
        ?>
    </main>
</body>
</html>