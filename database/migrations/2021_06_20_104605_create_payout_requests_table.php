<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayoutRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payout_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->comment('driver or passenger');
            $table->double('amount')->default(0);
            $table->tinyInteger('action_type')->default(0)->comment('0=pending,1=approved,2=declined');
            $table->unsignedBigInteger('action_taken_by')->nullable();
            $table->dateTime('action_taken_date')->nullable();
            $table->string('action_comment')->nullable();
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
        Schema::dropIfExists('payout_requests');
    }
}
