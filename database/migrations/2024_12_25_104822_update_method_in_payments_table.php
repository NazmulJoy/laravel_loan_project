<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMethodInPaymentsTable extends Migration
{
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->enum('method', ['bkash', 'nagad', 'rocket', 'bank', 'cash'])->change();
        });
    }

    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->enum('method', ['bkash', 'nagad', 'rocket', 'bank'])->change();
        });
    }
}

