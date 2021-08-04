<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountEmployeSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_employe_salaries', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->comment('emplyee_id=user_id');
            $table->string('date')->nullable();
            $table->double('amount')->nullable();
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
        Schema::dropIfExists('account_employe_salaries');
    }
}
