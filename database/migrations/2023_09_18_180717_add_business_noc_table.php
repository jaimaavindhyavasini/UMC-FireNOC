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
        Schema::table('business_noc', function (Blueprint $table) {
            $table->date('contact_persion')->nullable()->after('electrol_panel_no');
            $table->date('tel_no')->nullable()->after('contact_persion');
            $table->date('email')->nullable()->after('tel_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('business_noc', function (Blueprint $table) {
            $table->dropColumn('contact_persion');
            $table->dropColumn('tel_no');
            $table->dropColumn('email');
        });
    }
};
