<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chauffeurs', function (Blueprint $table) {
            $table->id();
            $table->string('Description');
            $table->string('immatricule');
            $table->enum('Desponability', ['Available', 'Reserved' , 'In Use'])->default('Available');
            $table->string('VoitureType');
            $table->string('Depart')->nullable();
            $table->string('Destination')->nullable();
            $table->string('TypeDePayment');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('chauffeurs');
    }
};
