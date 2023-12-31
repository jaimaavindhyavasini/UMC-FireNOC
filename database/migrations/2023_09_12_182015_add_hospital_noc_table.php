<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hospital_noc', function (Blueprint $table) {
            $table->integer('operator_status')->default('0')->comment('1:Approved, 2:Rejected')->after('application_status');
            $table->integer('inspector_status')->default('0')->comment('1:Approved, 2:Rejected')->after('operator_status');
            $table->integer('officer_status')->default('0')->comment('1:Approved, 2:Rejected')->after('inspector_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hospital_noc', function (Blueprint $table) {
            $table->dropColumn('operator_status');
            $table->dropColumn('inspector_status');
            $table->dropColumn('officer_status');
        });
    }
};
