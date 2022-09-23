<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {

            $table->id();
            $table->string('characterName');
            $table->string('characterLink')->nullable();
            $table->string('houseName')->nullable();

            $table->boolean('royal')->nullable();
            $table->string('parents')->nullable();
            $table->string('siblings')->nullable();
            $table->string('killedBy')->nullable();
            
            $table->string('characterImageThumb')->nullable();
            $table->string('characterImageFull')->nullable();
            $table->string('nickname')->nullable();

            $table->string('killed')->nullable();
            $table->string('servedBy')->nullable();
            $table->string('parentOf')->nullable();
            $table->string('marriedEngaged')->nullable();
            $table->string('serves')->nullable();
            $table->boolean('kingsguard')->nullable();
            $table->string('guardedBy')->nullable();
            $table->string('guardianOf')->nullable();
            $table->string('allies')->nullable();
            $table->string('abductedBy')->nullable();
            $table->string('abducted')->nullable();
            $table->string('sibling')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters');
    }
}
