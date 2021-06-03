<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('surname')->nullable();
            $table->string('email')->unique();
            $table->string('mobile_no')->nullable();
            $table->integer('gender')->default(1)->comment('1=male,2=female');
            $table->string('address')->nullable();
            $table->integer('account_status')->default(1)->comment('1=active, 2=deactivated');
            $table->string('password')->nullable();
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
        Schema::dropIfExists('admin_users');
    }
}
