<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrescribers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescribers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('npi', 10);
            $table->string('name', 225);
            $table->string('email', 225)->unique();
            $table->string('password');
            $table->string('phone', 10);
            $table->string('phone_extension', 4);
            $table->string('fax', 10);
            $table->string('role', 30);
            $table->boolean('is_admin')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('prescribers');
    }
}
