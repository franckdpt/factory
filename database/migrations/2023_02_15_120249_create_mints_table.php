<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mints', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('smart_contract_id')->unsigned()->index()->nullable();
            $table->foreign('smart_contract_id')
                    ->references('id')
                    ->on('smart_contracts')
                    ->onDelete('cascade');

            $table->bigInteger('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            $table->boolean('success')->default(false);
            $table->integer('token_id')->nullable();

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
        Schema::dropIfExists('mints');
    }
};
