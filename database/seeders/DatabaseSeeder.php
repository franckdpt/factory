<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('networks')->truncate();
        DB::table('expos')->truncate();
        DB::table('users')->truncate();
        DB::table('expo_user')->truncate();
        DB::table('smart_contracts')->truncate();

        DB::table('expos')->insert([
            'name' => 'Expo test 1',
            'description' => 'Expo desc',
            'slug' => 'expo-test-1',
            'nb_deployment_authorized' => 1,
            'factory_address' => "0x4Ed0E25829030e4f58111dDaC1528DcEcfd1C4E2",

            'contracts_name' => 'Expo nb 1',
            'contracts_description' => 'Description of expo',
            'contracts_symbol' => 'ETN',
        ]);

        DB::table('networks')->insert([
            'name' => 'Ethereum',
            'public_id' => 1,
            'explorer' => "http://etherscan.io/",
            'currency' => "ETH",
        ]);

        DB::table('networks')->insert([
            'name' => 'Polygon',
            'public_id' => 137,
            'explorer' => "http://polygonscan.com/",
            'currency' => "MATIC",
        ]);

        DB::table('users')->insert([
            'name' => 'Franck',
            'admin' => 1,
            'wallet_address' => '0x4Ed0E25829030e4f58111dDaC1528DcEcfd1C4E2',
        ]);

        DB::table('users')->insert([
            'name' => 'Damien',
            'admin' => 1,
            'wallet_address' => '0x4aeDF5fE928b852C96A6119bC5D035a29B762C5F',
        ]);

        DB::table('expo_user')->insert([
            'user_id' => 1,
            'expo_id' => 1,
        ]);

        DB::table('expo_user')->insert([
            'user_id' => 2,
            'expo_id' => 1,
        ]);

        DB::table('smart_contracts')->insert([
            'public_id' => 'EfYj3d',
            'artwork_title' => 'Test Artwork',
            'user_id' => 1,
            'expo_id' => 1,
            'network_id' => 1,
        ]);

        DB::table('smart_contracts')->insert([
            'public_id' => 'lkgRez8',
            'artwork_title' => 'Test Artwork 2',
            'user_id' => 2,
            'expo_id' => 1,
            'network_id' => 2,
        ]);
    }
}
