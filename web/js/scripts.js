
$(document).ready(function(){
    $(".navbar-nav").on("click", function(){
        if($(this).hasClass("active"))
        {
                $(this).removeClass("active");
        }
        else
        {
                $(this).addClass("active");
        }
    });
    
    $(".rs").on("click", function(){
        var nrat = $(this).attr("data");
        setRating(nrat);
        $("#rating").attr("value",nrat);
    });
    
    function setRating(nn) {
        $(".rs").each(function(){
            $(this).removeClass("active");
        });
        var cur = 1;
        $(".rs").each(function(){
            if (cur <= nn){
                $(this).addClass("active");
            }
            cur++;
        });
    }
    
    $("#review_btn").on("click", function(){
        var dta = $("#review_form").serialize();
        alert(dta);
        return false;
    });
    
    $("#plus").on("click", function(){
        changeQuantity(1);
        return false;
    });
    $("#minus").on("click", function(){
        changeQuantity(-1);
        return false;
    });
    function changeQuantity(val){
        var cur = $("#quantity").val() - 0,
            nq  = cur + val;
            if(nq < 1) nq = 1;
            if(nq > 5) nq = 5;
            $("#quantity").val(nq);
            
    }
});