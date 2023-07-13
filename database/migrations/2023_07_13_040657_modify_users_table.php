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
        Schema::table('users', function (Blueprint $table) {
            $table->string('username');
            $table->string('first_name', 20);
            $table->string('last_name', 20);
            $table->boolean('is_active')->default(false);
            $table->boolean('is_admin')->default(false);
            $table->dropColumn('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name');
            $table->dropColumn([
                'username',
                'first_name',
                'last_name',
                'is_active',
                'is_admin',
            ]);
        });
    }
};
