var ninyos = (function($, Ninyos, document) {
    var menu = {'none': 'fetching menu to server please wait..'};
    function bind_close() {
        $('.extra-add-on').find('.glyphicon-remove').bind('click', function(e) {
            e.preventDefault();
            $(this).parent().parent().parent().remove();
        })
    }
    if(menu.hasOwnProperty('none')) {
        $('.extras').html(menu.none);
        fetch_data_to_server();
    }
    function fetch_data_to_server() {
        $.post(base_url+"/fetch_menu")
        .done(function(data){
            $('.extras').html('<a href="javascript:void(0)" class="add-extra">Add extra</a>')
            menu = [];
            $.each(data, function(key, val){
                menu.push(val);
            })
            $('.add-extra').on('click', function(e) {
                e.preventDefault();
                if( $('.extra-add-on').length < 3) {
                    $(this).parent('.extras')
                    .after($('<li>', {class:'extra-add-on'})
                    .append(Ninyos.form.dropdown('extra[]', menu))) 
                    bind_close();
                } 
                else {
                    alert('Too much add on!');
                }    
            })
        })
    }
    
})(jQuery, window.ninyos || {}, document)
