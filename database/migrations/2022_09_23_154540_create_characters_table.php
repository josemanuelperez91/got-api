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
            $table->string('nickname')->nullable();
            $table->string('characterImageThumb')->nullable();
            $table->string('characterImageFull')->nullable();

            $table->boolean('royal')->nullable();
            $table->boolean('kingsguard')->nullable();
            
            $table->text('killed')->nullable();
            $table->text('servedBy')->nullable();
            $table->text('parentOf')->nullable();
            $table->text('marriedEngaged')->nullable();
            $table->text('serves')->nullable();
            $table->text('parents')->nullable();
            $table->text('siblings')->nullable();
            $table->text('killedBy')->nullable();
            $table->text('guardedBy')->nullable();
            $table->text('guardianOf')->nullable();
            $table->text('allies')->nullable();
            $table->text('abductedBy')->nullable();
            $table->text('abducted')->nullable();
            $table->text('sibling')->nullable();

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
