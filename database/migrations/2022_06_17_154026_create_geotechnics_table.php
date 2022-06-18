<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Models\Geotechnic;

class CreateGeotechnicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geotechnics', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();

            $table->string('map_registration_number')->unique();
            $table->integer('total_building_area');
            $table->enum('type_of_land',[Geotechnic::FINE_GRAINED_LANDS,Geotechnic::SANDY_ALLUVIAL_SOILS,Geotechnic::LARGE_SAND_ALLUVIUM]);
            $table->tinyInteger('number_of_floors');
            $table->tinyInteger('occupancy_level_downstairs');
            $table->tinyInteger('number_of_underground_floors');
            $table->tinyInteger('number_of_machine_boreholes')->nullable();
            $table->text('machine_bore_depth')->nullable();
            $table->string('written_request_of_bore_number')->nullable();
            $table->tinyInteger('number_of_manual_wells')->nullable();
            $table->text('manual_well_depth')->nullable();
            $table->string('written_request_of_well_number')->nullable();

            $table->enum('guard_structure',['yes','no']);
            $table->enum('upload_and_cut_in_place',['yes','no']);
            $table->enum('in_well_vibration_test',['yes','no']);
            $table->enum('bedrock',['yes','no']);
            $table->enum('drilling_surcharge',['yes','no']);
            $table->enum('number_of_payment',['Cash','One_Installment','Two_Installment','Three_Installment']);
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
        Schema::dropIfExists('geotechnics');
    }
}
