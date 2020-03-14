<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToMicropostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('microposts', function (Blueprint $table) {
            $table->string('maker');
            $table->string('title');
            $table->string('field', 30);
            $table->string('class', 30);
            $table->string('standard_a', 30)->nullable();
            $table->string('standard_b', 30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('microposts', function (Blueprint $table) {
            $table->dropcolumn('maker');
            $table->dropColumn('title');
            $table->dropColumn('field');
            $table->dropColumn('class');
            $table->dropColumn('standard_a')->nullable();
            $table->dropColumn('standard_b')->nullable();
            
        });
    }
}
