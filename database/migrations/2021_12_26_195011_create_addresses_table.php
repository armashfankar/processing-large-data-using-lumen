<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("officename");
            $table->string("pincode")->unique();
            $table->string("officeType");
            $table->string("Deliverystatus");
            $table->string("divisionname");
            $table->string("regionname");
            $table->string("circlename");
            $table->string("Taluk");
            $table->string("Districtname");
            $table->string("statename");
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
        Schema::dropIfExists('addresses');
    }
}
