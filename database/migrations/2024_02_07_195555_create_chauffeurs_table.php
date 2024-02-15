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
            $table->string('Average');
            $table->string('trip')->nullable();
            $table->string('TypeDePayment');
            $table->enum('archive', ['1', '0'])->default('0');
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
