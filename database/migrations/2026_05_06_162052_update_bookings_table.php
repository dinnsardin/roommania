<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {

            $table->dateTime('start_datetime')->after('room_id');

            $table->dateTime('end_datetime')->after('start_datetime');

            $table->dropColumn('booking_date');

            $table->dropColumn('booking_time');
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {

            $table->date('booking_date');

            $table->string('booking_time');

            $table->dropColumn('start_datetime');

            $table->dropColumn('end_datetime');
        });
    }
};