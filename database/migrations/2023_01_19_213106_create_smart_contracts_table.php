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

            $table->bigInteger('expo_id')->unsigned()->index()->nullable();
            $table->foreign('expo_id')
                    ->references('id')
                    ->on('expos')
                    ->onDelete('cascade');
            
            $table->bigInteger('network_id')->unsigned()->index()->nullable();
            $table->foreign('network_id')
                    ->references('id')
                    ->on('networks')
                    ->onDelete('cascade');

            // Artwork
            $table->string('artwork_artist')->nullable();
            $table->string('artwork_title')->nullable();
            $table->text('artwork_description')->nullable();
            $table->string('artwork_path')->nullable();
            $table->string('artwork_hd_mime')->nullable();
            $table->string('artwork_hd_extension')->nullable();
            $table->integer('artwork_max_supply')->nullable();
            $table->integer('artwork_total_supply')->default(0);
            $table->string('artwork_price')->nullable();
            $table->integer('artwork_royalty')->nullable();

            // Artist
            $table->string('artist_portfolio_link')->nullable();
            $table->string('artist_twitter_link')->nullable();
            $table->string('artist_contact_mail')->nullable();

            // Output
            $table->string('artwork_ipfs_hash')->nullable();
            $table->string('artwork_arweave_hash')->nullable();
            $table->string('artwork_sha_hash')->nullable();
            $table->string('token_ipfs_hash')->nullable();
            $table->string('status')->default('in_editing');
            $table->string('address')->nullable();
            $table->boolean('open_sales')->default(true);
            $table->boolean('deployed')->default(false);
            $table->integer('self_nfts_number')->nullable();
            
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
