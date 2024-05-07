<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('additional_load', function (Blueprint $table) {
            $table->increments('so_mo');
            $table->integer('facultyid')->unsigned();
            $table->string('title', 255);
            $table->string('kind', 255);
            $table->integer('equivalent_load');
            $table->timestamp('duration_from')->nullable();
            $table->timestamp('duration_to')->nullable();

            $table->foreign('facultyid')->references('facultyid')->on('faculty')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('additional_load');
    }
};
