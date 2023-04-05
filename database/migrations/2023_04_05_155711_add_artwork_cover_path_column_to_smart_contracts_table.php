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
        Schema::table('smart_contracts', function (Blueprint $table) {
            $table->string('artwork_cover_path')->nullable()->after('artwork_path');
            $table->string('artwork_cover_ipfs_hash')->nullable()->after('artwork_ipfs_hash');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('smart_contracts', function (Blueprint $table) {
            $table->dropColumn('artwork_cover_ipfs_hash');
            $table->dropColumn('artwork_cover_path');
        });
    }
};
