<?php

// database/migrations/xxxx_xx_xx_add_columns_to_bookings_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToBookingsTable extends Migration
{
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('name')->after('status');  // Adding the name column
            $table->string('email')->after('name');   // Adding the email column
            $table->string('phone')->after('email');  // Adding the phone column
            $table->text('address')->after('phone');  // Adding the address column
        });
    }

    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['name', 'email', 'phone', 'address']); // Dropping the columns
        });
    }
}

