<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyMedicinesTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medicines', function(Blueprint $table) {
            $table->text('frequency')->nullable()->after('detail');
            $table->text('information')->nullable()->after('frequency');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicines', function(Blueprint $table) {
            $table->dropColumn('frequency');
            $table->dropColumn('information');
        });
    }
}
