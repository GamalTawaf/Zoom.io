<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('FirstName',60);
            $table->string('LastName',60);
            $table->string('email',60);
            $table->string('phone',20);
            $table->Integer('ServiceId');
            $table->text('message');
            $table->tinyInteger('status')->default('1');
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
        //
        Schema::drop('contacts');
    }
}
