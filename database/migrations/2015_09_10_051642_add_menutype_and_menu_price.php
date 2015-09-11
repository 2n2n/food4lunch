<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMenutypeAndMenuPrice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('menus')) {
            Schema::table('menus', function($table) {
                $table->decimal('amount', 5,3)->default('60.000');
                $table->string('type', 4)->default('main'); #main/side
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasTable('menus')) {
            if(Schema::hasColumn('menu','type')){
                Schema::drop('type');
            }
            if(Schema::hasColumn('menu','price')) {
                Schema::drop('price');
            }
        }
    }
}
