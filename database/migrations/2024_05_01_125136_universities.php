<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('universities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo',300);
            $table->text('description');
            $table->string('location');
            $table->string('website');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('universities');
    }


};
