<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('geotechnic_id')->nullable();
            $table->foreign('geotechnic_id')->references('id')->on('geotechnics')->nullOnDelete();
            $table->string('f_name',30);
            $table->string('l_name',50);
            $table->string('code_melli');
            $table->string('mobile');
            $table->text('address')->nullable();
            $table->integer('registration_plate');
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
        Schema::dropIfExists('owners');
    }
}
