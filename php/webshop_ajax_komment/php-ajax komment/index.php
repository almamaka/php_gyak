<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>PHP - AJAX KOMMENT</title>
</head>
<body>

    <div class="container">
        <div class="comment-list mb-5"></div>

        <h1>PHP-AJAX kommentelés</h1>
        <div class="col-5">
            <label for="">Kommentelő neve</label>
            <input type="text" class="name form-control mb-3">

            <label for="">Komment</label>
            <textarea class="comment form-control mb-3" cols="30" rows="10"></textarea>

            <a href="javascript:void(0)" class="submit btn btn-success">Küldés</a>
        </div>
    </div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>

    $(function(){

        function commentListing(){

            $.ajax({

                url:"list-comment.php",
                success:function(data){

                    $(".comment-list").html(data);
                }
            })
        }

        setInterval(function(){

            commentListing();
        }, 1000);


        $(".submit").on("click", function(){

            var name = $(".name").val();
            var comment = $(".comment").val();

            $.ajax({

                type: "post",
                url: "save-comment.php",
                data: {name:name, comment:comment},
                success:function(){

                    commentListing();
                }
            })

            $(".name").val("");
            $(".comment").val("");
        })
    })

</script>
</body>
</html>