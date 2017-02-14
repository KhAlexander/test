<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 50)->index('IDX_om_cust_requests');
            $table->string('last_name', 50)->nullable();
            $table->string('company_name', 150)->nullable()->index('IDX_om_cust_requests2');
            $table->string('position', 50)->nullable();
            $table->string('personal_email', 50)->nullable();
            $table->string('job_email', 50)->nullable();
            $table->string('personal_phone', 25)->nullable();
            $table->string('job_phone', 25)->nullable();
            $table->string('srch_phone', 25)->nullable()->index('IDX_om_cust_requests3');
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
        Schema::dropIfExists('persons');
    }
}
