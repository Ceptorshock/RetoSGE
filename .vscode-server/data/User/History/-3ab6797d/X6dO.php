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
        Schema::table('incidents', function (Blueprint $table) {
            //$table->unsignedBigInteger('priority_id')->nullable()->change();
            //$table->unsignedBigInteger('status_id')->nullable()->change();

            //$table->foreign('priority_id')->references('id')->on('priorities')->nullOnDelete()->change();
            $table->foreign('status_id')->references('id')->on('statuses')->nullOnDelete()->change();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('incidents', function (Blueprint $table) {
            $table->dropForeign('incidents_priority_id_foreign');
            $table->dropForeign('incidents_status_id_foreign');
            $table->dropColumn('priority_id');
            $table->dropColumn('status_id');
        });
    }
};