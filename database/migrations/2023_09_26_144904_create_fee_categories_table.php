<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\FeeConstruction;
use App\Models\FeeModeOperate;
use App\Models\FeeBldgHt;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_categories', function (Blueprint $table) {
            $table->id();
            $table->string('building_ht');
            $table->foreignIdFor(FeeConstruction::class)->constrained();
            $table->foreignIdFor(FeeModeOperate::class)->constrained();
            $table->foreignIdFor(FeeBldgHt::class)->constrained();
            $table->integer('inserted_by')->nullable();
            $table->timestamp('inserted_dt')->nullable();
            $table->integer('modified_by')->nullable();
            $table->timestamp('modified_dt')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fee_categories');
    }
};
