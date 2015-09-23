var ninyos = (function($, Ninyos, document, Food, Menu, Order) {
    var menu = new Menu(base_url+"/fetch_menu");
    var orders = new Order;
    var waiter = setInterval(function(){
        if(menu.isReady) {
            clearInterval(waiter)
            return initiate() 
        }
    }, 300);
    
    function initiate() {
        $('.extras').html('<a href="javascript:void(0)" class="add-extra">Add extra</a>')
        $('.add-extra').on('click', function(e) {
            e.preventDefault()
            if( $('.extra-add-on').length < 3) {
                $(this).parent('.extras')
                .after($('<li>', {class:'extra-add-on'})
                .append(Ninyos.form.dropdown('extra[]', menu))) 
                bind_close();
                $('form').change();
            } 
            else {
                alert('Too much add on!');
            }    
        })
    }


    
    function bind_close() {
        $('.extra-add-on').find('.glyphicon-remove').bind('click', function(e) {
            e.preventDefault();
            $(this).parent().parent().parent().remove();
            $('form').change();
        })
    }
    
    

    $('form').on('change', function() {
        try{
            orders.clear();
            var data = $(this).serializeArray();
            var exclude = ["_token"];
            
            $.each(data, function(k, v) { // remap the order form
                if($.inArray(v.name, exclude) > -1) { return; } // skip iteration if exluded
                if(v.value == 0) { return; } // skip iteration for 0 value
                orders.selectUsingID(v.value, menu)
            });
    
        
            // render to views
            var orderList = orders.rederOrders();
            $("#total_amount").html("P " + orderList.total.toFixed(2))
            var tbl = ""
            $.each(orderList.orders, function(key, val) {
                tbl += "<tr "+((val.id == 0)? "class='combo'>": ">");
                tbl += "<td>"+val.description+"</td>";
                tbl += "<td>1</td>";
                tbl += "<td>"+Number.parseFloat(val.price).toFixed(2)+"</td>";
                tbl += "</tr>";
            });
            
            $("#orders_table").find('tbody').html(tbl)
        }
        catch(e) {
            console.error(e);
        }
        
    });

    
})(jQuery, window.ninyos || {}, document, window.Food, window.Menu, window.Order )
