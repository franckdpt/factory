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
        Schema::create('expos', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->integer('nb_deployment_authorized')->default(1);
            $table->string('factory_address')->default(env('FACTORY_WALLET'));

            $table->string('contracts_name')->nullable();
            $table->text('contracts_description')->nullable();
            $table->string('contracts_symbol')->default(env('EXPO_SYMBOL_PREFIX'));

            $table->string('slug')->nullable();

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
        Schema::dropIfExists('expos');
    }
};
