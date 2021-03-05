<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
<title>PHP FILEKEZELÉS</title>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <form enctype="multipart/form-data" action="process.php" method="post" class="form-group text-center p-5 bg-dark text-light">
            
                <label for="">Adat</label>
                <input type="text" name="adat" class="form-control mb-3">

                <label for="">Módosítandó/törlendő adat</label>
                <input type="text" name="ujadat" class="form-control mb-3">

                <button type="submit" name="beir" class="btn btn-success form-control mb-1">Beír</button>
                <button type="submit" name="modosit" class="btn btn-primary form-control mb-1">Módosít</button>
                <button type="submit" name="torol" class="btn btn-danger form-control mb-1">Töröl</button>
            </form>
        </div>
    </div>

</body>
</html>