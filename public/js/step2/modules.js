var ninyos = (function($, Ninyos, document) {
    var menu = {};
    
    var fetch_data_to_server_callback = function(data){
        $('.extras').html('<a href="javascript:void(0)" class="add-extra">Add extra</a>')
        menu.extra = [];
        $.each(data, function(key, val){
            menu.extra.push(val);
            console.log(menu.extra);
        })
        $('.add-extra').on('click', function(e) {
            e.preventDefault();
            if( $('.extra-add-on').length < 3) {
                $(this).parent('.extras')
                .after($('<li>', {class:'extra-add-on'})
                .append(Ninyos.form.dropdown('extra[]', menu.extra))) 
                bind_close();
            } 
            else {
                alert('Too much add on!');
            }    
        })
    };

    
    function bind_close() {
        $('.extra-add-on').find('.glyphicon-remove').bind('click', function(e) {
            e.preventDefault();
            $(this).parent().parent().parent().remove();
        })
    }
    
    if(Object.keys(menu).length < 1) {
        $('.extras').html('fetching menu to server please wait..');
        // fetch te data to the server
        $.post(base_url+"/fetch_menu")
        .done(fetch_data_to_server_callback)
    }

    
   
    
})(jQuery, window.ninyos || {}, document)
