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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('text');
            $table->integer('used_time');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('incident_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('incident_id')->references('id')->on('incidents')->onDeleteCascade();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments',function(Blueprint $table) {
            $table->dropForeign('comments_user_id_foreign');
            $table->dropForeign('comments_incident_id_foreign');
        });
        Schema::dropIfExists('comments');
    }
};
