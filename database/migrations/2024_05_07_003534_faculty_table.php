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
        Schema::create('faculty', function (Blueprint $table) {
            $table->increments('facultyid');
            $table->string('name', 255);
            $table->integer('collegeid');
            $table->boolean('dean');
            $table->integer('departmentid');
            $table->string('status', 255)->nullable();
            $table->string('rank', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('google_scholar_link', 255)->nullable();
            $table->text('specialization')->nullable();
            $table->string('research', 255)->nullable();
            $table->string('photo', 255)->nullable();
            $table->text('education')->nullable();
            $table->string('first_name', 255)->nullable();
            $table->string('middle_name', 255)->nullable();
            $table->string('last_name', 255)->nullable();
            $table->string('suffix', 25)->nullable();
            $table->timestamps();

            $table->foreign('collegeid')->references('collegeid')->on('college')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->foreign('departmentid')->references('departmentid')->on('department')->onDelete('NO ACTION')->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculty');
    }
};
