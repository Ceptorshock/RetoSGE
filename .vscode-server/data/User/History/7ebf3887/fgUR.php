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
        Schema::create('incidents', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('title');
            $table->string('text');
            $table->integer('stimated_time');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('category_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('department_id')->references('id')->on('departments')->restrictOnDelete();  //para que no se pueda borrar departamento si hay incidencias.
            $table->foreign('category_id')->references('id')->on('categories')->nullOnDelete();     //Para que si se borra categoria, sea null
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('incidents', function (Blueprint $table) {
             $table->dropForeign('incidents_user_id_foreign');
             $table->dropForeign('incidents_department_id_foreign');
             $table->dropForeign('incidents_category_id_foreign');
        });
        Schema::dropIfExists('incidents');
    }
};
