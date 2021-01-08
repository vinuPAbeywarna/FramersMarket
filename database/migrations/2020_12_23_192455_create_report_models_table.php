<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_models', function (Blueprint $table) {
            $table->id();
            $table->string('FarmerNIC');
            $table->enum('HarvestType',['Vegetables','Fruits','Nuts','Grain']);
            $table->decimal('Amount');
            $table->decimal('WAmount');
            $table->float('Lat');
            $table->float('Lang');
            $table->string('Description');
            $table->string('District');
            $table->string('Image')->nullable();
            $table->enum('Status',['High','Good','Average','Low','Bad','Inedible'])->nullable();
            $table->enum('SaleStatus',['Bought','Ignored'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_models');
    }

    public function Delete($report_model)
    {
        $report_model::find($report_model)->delete();
        return redirect()
    }
}
