<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installments', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('geotechnic_id')->unsigned()->nullable();
            $table->foreign('geotechnic_id')->references('id')->on('geotechnics')->cascadeOnDelete();
            $table->string('title',30);
            $table->integer('amount');
            $table->string('type');
            $table->enum('status',['Paid','Unpaid','Expired']);
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
        Schema::dropIfExists('installments');
    }
}
