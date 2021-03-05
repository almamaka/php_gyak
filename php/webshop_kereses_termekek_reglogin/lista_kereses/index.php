<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
<title>Title</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" id="search" placeholder="Search" aria-label="Search">
    </form>
</nav>

<div style="position:relative; left: 80px;" class="col-md-5">
    <div id="result" class="list-group"></div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>

    $(function(){

        $("#search").keyup(function(){

            var text = $("#search").val();

            if(text != ""){

                $.ajax({

                    url: "fetch.php",
                    method: "post",
                    data: {search: text},
                    success:function(data){

                        $("#result").html(data);
                    }
                })
            }
            else{

                $("#result").html("");
            }
        })

    })

</script>
</body>
</html>