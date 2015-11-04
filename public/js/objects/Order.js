/**
 * Order()
 * Collection of available food from menu.
 *
 */
function Order() {}

Order.prototype = Array.prototype;

Order.prototype.rederOrders = function() {
    var total = 0;
    var orders = this
    if(this.isCombo()) {
        var remove = ['main','side', 'rice'];
        orders = $.grep(orders, function(food, idx) {
            var found = $.inArray(food.type, remove) // store the idx
            found = (found !== -1) ? found : false;
            if(found === false) {
                return true;
            }
            var type = remove[found];
            remove.splice(found, 1)
            return !(food.type == type)
        });
        
        total += 60.00; // set initial value as 60.00
    }
    
    // compute the extras if length of orders are greater that 0
    // by default sum all the items selected

    if( orders.length > 0 ) {
        $.each(orders, function(key, val) {
            total += Number.parseFloat(val.price);
        })    
    }
    
    // if order is combo push the combo meal description
    var list = orders
    if(this.isCombo()) {
        var food = new Food;
        food.id = 0 
        food.description = "Combo meal" 
        food.type = 'combo' 
        food.price = 60.00
        list.splice(0,0, food)
    }
    
    
    return { 
        total: total,
        orders: list
    };
};

Order.prototype.selectUsingID = function(id, menu) {
    self = this;
    $.each(menu, function(key, food) {
        if(food.id == id) {
            return self.select(food);
        }
    })
}
Order.prototype.select = function(food) {
    if(food instanceof Food) {
        this.push(food);
    }  
    else{  
        throw "invalid food selected"
    }
        
}
// will identify if on your 
Order.prototype.isCombo = function() {
    var checker = ["main", "side", "rice"];
    this.forEach(function(val,k) {
        var idx = $.inArray(val.type, checker)
        if( idx !== -1 ) {  checker.splice(idx, 1) }
    })
    
    if(checker.length == 0) return true
    return false;
}

Order.prototype.clear = function() {
    this.length = 0;
    return this;
}
