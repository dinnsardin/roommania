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
        Schema::table('rooms', function (Blueprint $table) {

            $table->boolean('is_under_maintenance')
                  ->default(false);

            $table->text('maintenance_note')
                  ->nullable();

            $table->date('maintenance_until')
                  ->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rooms', function (Blueprint $table) {

            $table->dropColumn([
                'is_under_maintenance',
                'maintenance_note',
                'maintenance_until'
            ]);

        });
    }
};