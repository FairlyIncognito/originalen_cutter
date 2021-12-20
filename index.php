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
        <form method="POST" action="/code/functions.php" class="d-flex flex-column w-25">
            <label for="elementSizeX">Bredde på element:</label>
            <input type="number" name="elementSizeX">
            <label for="elementSizeY">Højde på element:</label>
            <input type="number" name="elementSizeY">

            <label for="gutterSize">Luft imellem:</label>
            <input type="number" name="gutterSize" value="6">

            <label for="sheetMargin">Margin til kant:</label>
            <input type="number" name="sheetMargin" value="5">

            <label for="sheetSize">Vælg størrelse:</label>
            <select name="sheetSize" id="sheetSize">
                <option value="sra">SRA 320mm x 450mm</option>
                <option value="a3">A3 297mm x 420mm</option>
                <option value="a4">A4 210mm x 297mm</option>
            </select>

            <button type="button" class="btn btn-primary">Beregn</button>
        </form>
    </main>
</body>
</html>