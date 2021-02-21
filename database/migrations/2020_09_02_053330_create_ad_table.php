<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('adti')->nullable();
             $table->string('adtd')->nullable();
              $table->string('longitude',100)->nullable();
               $table->string('latitude',100)->nullable();
                $table->string('ad_type',50)->nullable();
                 $table->string('ad_city',50)->nullable();
                 $table->string('ad_state',50)->nullable();
                 $table->string('ad_pincode',10)->nullable();
                 $table->string('ad_pic')->nullable();
                 $table->string('ad_status',20)->nullable();
                   $table->unsignedInteger('created_by_id')->nullable();
            $table->foreign('created_by_id',11)->references('id')->on('users');
             
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ad');
    }
}
