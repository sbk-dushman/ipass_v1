<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelectedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selecteds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable(true);
            $table->string('surname')->nullable(true);
            $table->string('lastname')->nullable(true);
            $table->string('code')->nullable(true);
            $table->string('group')->nullable(true);
            $table->string('position')->nullable(true);
            $table->string('shablon')->nullable(true);
            $table->string('form_of_education')->nullable(true);
            $table->string('date_of_enrollment')->nullable(true);
            $table->string('photo')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('selecteds');
    }
}
