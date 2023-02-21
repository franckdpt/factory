<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('name_and_wallet')->virtualAs('concat(name, \' (\', wallet_address,  \')\')');
            $table->boolean('admin')->default(false);
            $table->string('eth_ens')->unique()->nullable();
            $table->string('reduced_wallet_address')->virtualAs('concat(left(wallet_address, 6), \'...\', right(wallet_address, 4))');
            $table->string('wallet_address')->index()->unique()->nullable();
            

            $table->string('portfolio_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('contact_mail')->nullable();

            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
