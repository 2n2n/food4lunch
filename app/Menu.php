<?php

namespace App;
use \Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
class Menu extends Model
{
    protected $timestamp = true;
    protected $table = 'menus';
    protected $fillable = ['description','price', 'type'];
    
    public function setDescriptionAttribute($description) {
        $this->attributes['description'] = $description;   
    }
}
