<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTechnologiesTable extends Migration
{
    public function up()
    {
        Schema::create('technologies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('icon');
            $table->integer('level');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('technologies');
    }
}
