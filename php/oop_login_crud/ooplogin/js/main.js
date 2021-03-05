$(function(){

    $("form").on("submit", function(e){

        if($("#username").val()=="" && $("#pwd").val() == ""){

            $("#username").addClass("error");
            $("#pwd").addClass("error");

            e.preventDefault();
        }
        else if($("#username").val()==""){

            $("#username").addClass("error");
            $("#pwd").removeClass("error");

            e.preventDefault();
        }
        else if($("#pwd").val()==""){

            $("#username").removeClass("error");
            $("#pwd").addClass("error");

            e.preventDefault();
        }
        else{

            $("#username").removeClass("error");
            $("#pwd").removeClass("error");
        }
    })
})