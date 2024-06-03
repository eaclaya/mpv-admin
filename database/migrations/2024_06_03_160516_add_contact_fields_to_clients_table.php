<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table("clients", function (Blueprint $table) {
            $table->string("email", 50)->nullable();
            $table->string("contact", 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("clients", function (Blueprint $table) {
            $table->dropColumn(["email", "contact"]);
        });
    }
};
