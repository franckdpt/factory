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
        Schema::create('smart_contracts', function (Blueprint $table) {
            $table->id();
            $table->char('public_id', 8);
            $table->bigInteger('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            // Contract
            $table->string('network')->nullable();
            $table->string('name')->nullable();
            $table->string('symbol')->nullable();
            $table->text('description')->nullable();
            $table->boolean('free_nft')->default(false);

            // Artwork
            $table->string('artwork_title')->nullable();
            $table->text('artwork_description')->nullable();
            $table->string('artwork_hd_extension')->nullable();
            $table->integer('artwork_max_supply')->nullable();
            $table->integer('artwork_price')->nullable();
            $table->integer('artwork_royalty')->nullable();

            // Artist
            $table->string('artist_portfolio_link')->nullable();
            $table->string('artist_twitter_link')->nullable();
            $table->string('artist_contact_mail')->nullable();

            // Output
            $table->string('ipfs_hash')->nullable();
            $table->string('ipfs_json_hash')->nullable();
            $table->string('arweave_hash')->nullable();
            $table->string('sha_hash')->nullable();
            $table->string('address')->nullable();
            $table->boolean('deployed')->default(false);
            
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
        Schema::dropIfExists('smart_contracts');
    }
};
