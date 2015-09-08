<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateusersAddAcl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if( Schema::hasTable('users') && !Schema::hasColumn('users','role') ) {
            Schema::table('users', function($table) {
                // set default value to 1 = member, 2 = superuser
                $table->tinyInteger('role')->default('1'); 
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
