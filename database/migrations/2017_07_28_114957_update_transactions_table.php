<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function( Blueprint $table){
            $table->integer('user_id')->nullable();
        });
    }

    
    public function down()
    {
        Schema::table('transactions', function(Blueprint $table){
            $table->dropColumn('user_id');
        });
    }
}
