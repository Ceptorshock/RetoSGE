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
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete;
            $table->foreign('department_id')->references('id')->on('departments')->nullOnDelete();
            $table->foreign('category_id')->references('id')->on('categories')->nullOnDelete();
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
