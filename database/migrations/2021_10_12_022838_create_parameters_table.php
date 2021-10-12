<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('logo_1');
            $table->string('logo_2');
            $table->string('representative', 100);
            $table->string('telephone', 8)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('address', 150)->nullable()->default('text');
            $table->string('company_nit', 17);
            $table->string('nrc', 7);
            $table->string('representative_nit', 17)->nullable();
            $table->string('company_type', 10)->default('Pequeña');
            $table->softDeletes();
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
        Schema::dropIfExists('parameters');
    }
}
