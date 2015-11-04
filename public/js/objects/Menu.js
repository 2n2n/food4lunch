/**
 * Menu()
 * Collection of available food
 */
function Menu(url) {
    if(typeof url != 'undefined') {
        this.init(url)
    }
 }
 Menu.prototype = Array.prototype; // inherit the Array properties
 // will calculate the orders
 Menu.prototype.init = function(url) {
    var self = this;
     $.post(url).success(function(data){
        data.map(function(v,k) {
            var food = new Food
            food.id = v.id
            food.description = v.description
            food.price = v.price
            food.type = v.type
            self.push(food);
            self.isReady = true;
        })
    }).fail(function(xhr, err){
        self.isReady = true;
       throw xhr.status + ": " + xhr.statusText
    });
 }
 Menu.prototype.isReady = false;
 Menu.prototype.constructor = Menu;