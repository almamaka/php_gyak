<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
<title>PHP képméretezés felöltés közben</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <form enctype="multipart/form-data" action="upload.php" method="post" class="form-group text-center p-5 rounded">
                <label for="">Kép feltöltése méretezésre</label>
                <input class="form-control mb-3" type="file" name="file" id="">

                <button type="submit" class="btn btn-dark">Feltölt</button>

            </form>
        </div>
    </div>
</body>
</html>