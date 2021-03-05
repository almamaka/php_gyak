<?php  require "header.php";   ?>

<div id="top">
    <img src="" id="logo" alt="" title="" />
    <?php require "menu.php";   ?>
</div>

<div id="left">
    <?php   require "kategoria.php";   ?>
</div>

<div id="right">
        <h1>Termékek keresése</h1>

        <form action="" method="post">
            <input type="text" class="form-control mb-3" name="search" id="search" placeholder="Írd be a termék nevét...">
        </form>


        <div class="result mt-3"></div>
</div>

<script>
    $(function(){

        //Search id-val ellátott input mezőre indítunk egy keyup eseményt, ami minden billentyű lenyomása után indít egy függvényt
        $("#search").keyup(function(){

            //Eltároljuk az input mező értékét egy text változóba
            var text = $("#search").val();

            //Megnézzük, hogy nem üres-e az input mező tartalma...
            if(text != ""){

                //Indítunk egy ajax hívást...
                $.ajax({

                    url: "fetch.php",                       //Mi legyen a hívás feldolgozó oldala
                    type: "post",                           //Adatküldés típusa
                    dataType: "text",                       //Adattípus
                    data: {search:text},                     //Adat amit át akarok küldeni a feldolgozó oldalra - search = hogy hivatkozok az adatra php oldalon, text = változó értéke (input mező tartalma)
                    success:function(data){                 //Mi történjen ha sikeres volt az ajax hívás
                        
                        $(".result").html(data);            //PHP oldalról visszatérő eredmény megjelenítése

                    }
                })
            }
            //Mi történjen, ha üres az input mező tartalma
            else{

                $(".result").html("");                      //Az eredmény megjelenítésére létrehozott divet üressé tesszük
            }
        })
    })
</script>
</body>
</html>