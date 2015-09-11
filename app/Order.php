<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
class Order extends Model
{
    protected $table = "orders";
    protected $fillable = ['user_id', 'main_dish', 'side_dish', 'extra', 'has_rice'];
    
}
