<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFakeSearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fake_searches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable(false);
            $table->string('surname')->nullable(false);
            $table->string('lastname')->nullable(false);
            $table->string('group')->nullable(true);
            $table->string('code')->nullable(true);
            $table->string('form_of_education')->nullable(true);
            $table->string('photo')->nullable(true);
            $table->string('date_of_enrollment')->nullable(true);
            $table->string('position')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fake_searches');
    }
}
