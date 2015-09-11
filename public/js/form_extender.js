(function($, Ninyos, document){
    Ninyos.form = {
        input: function(name, type, attr) {
            attr = attr || {}
            switch(type) {
                case 'text': 
                    attr['type'] = 'text'
                    attr['class'] = 'form-control'
                    attr['name'] = name
                    html = $('<div>', {class:'input-group'})
                    html.append($('<span>', {class:'input-group-addon'}).html('<a href="#" class="glyphicon glyphicon-remove"></a>'))
                    html.append($('<input/>', {attr}))
                    return html;
                break;
                case 'hidden': console.log('hidden');
                case 'checkbox': console.log('checkbox');
                break;
                default:
                    throw "Invalid Form TypeError."
            }
        },
        dropdown: function(name, data, attr) {
            attr = attr || {name:name}
            attr['class'] = 'form-control'
            var selectEl = $('<select/>', attr);
            count = 0;
            $.each(data, function(key,val){
                var option = $('<option>',{
                    'value': val.id
                }).html(val.description);
                
                selectEl.append(option);
                if(count == 0) selectEl.val(val.id)
                count++;
            })
            return $('<div>', {class:'input-group'})
                    .append($('<span>', {class:'input-group-addon'})
                    .html('<a href="#" class="glyphicon glyphicon-remove"></a>'))
                    .append(selectEl)
        }
    }
})(jQuery, window.ninyos, document);