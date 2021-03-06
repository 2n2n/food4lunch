<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumsForMaindishSidedishExtrasAndHasrice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('orders')){
            if(Schema::hasColumn('orders', 'menu_id')) {
                Schema::table('orders', function($table) {
                    $table->dropColumn(['menu_id']);
                });
            }
            Schema::table('orders', function (Blueprint $table) {
                $table->string('main_dish')->nullable(); #fk_menu.description
                $table->string('side_dish')->nullable(); #fk_menu.description
                $table->string('rice')->nullable(); #fk_menu.id
                $table->json('extra');
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
        //
    }
}
