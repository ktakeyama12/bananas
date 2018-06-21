<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBananasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bananas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userid');
            $table->string('banana');
            $table->integer('done');
            $table->string('name');
                        $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bananas');
    }
}
