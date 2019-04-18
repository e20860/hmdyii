
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
    /*
     * Инструменты для работы с корзиной
     */
    /**
     * Показать корзину
     * @param {type} cart
     * @returns {undefined}
     */
    function showCart(cart){
        $("#hm-cart .modal-body").html(cart);
        $("#hm-cart").modal();
        var curqty = $("#cqty").html();
        if(!curqty) curqty = 0;
        $("#cart-qty").html(curqty);
    }
    
    $("#hm-cart .modal-body").on('click', '.del-item', function(){
        var id = $(this).data('id');
         $.ajax({
            url: '/cart/del-item',
            data: {id: id},
            type: 'GET',
            success: function(res){
                if(!res) alert('Не удалось удалить товар');
                showCart(res);
            },
            error: function(e){
                alert(e.statusText);
            }
        });
       
    });
    /**
     * Очистить корзину
     * @returns {undefined}
     */
    function clearCart(){
        $.ajax({
            url: '/cart/clear',
            type: 'GET',
            success: function(res){
                if(!res) alert('Не удалось очистить корзину');
                showCart(res);
            },
            error: function(e){
                alert(e.statusText);
            }
        });        
    }
    
    /**
     * Добавить в корзину
     */
    $(".cart").on('click', function(e){
        e.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            url: '/cart/add',
            data: {id: id},
            type: 'GET',
            success: function(res){
                if(!res) alert('Не удалось добавить товар в корзину');
                //console.log(res);
                showCart(res);
            },
            error: function(e){
                alert(e.statusText);
            }
        });
    });
    /**
     * Слушатель очистки корзины
     */
    $("#hmcClear").on('click', function(){
        clearCart();
        return false;
    });
    
    $("#cart-top").on('click', function(e){
        e.preventDefault();
        $.ajax({
            url: '/cart/view-cart',
            type: 'GET',
            success: function(res){
                if(!res) alert('Не удалось вызвать корзину');
                showCart(res);
            },
            error: function(e){
                alert(e.statusText);
            }
        });        
        
    });
});