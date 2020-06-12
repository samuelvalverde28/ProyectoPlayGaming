<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://api.rawg.io/api/platforms/lists/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);

        $response = $client->request('GET', 'parents');

        $plataformas = json_decode($response->getBody()->getContents());
        // dd($plataformas);

        foreach ($plataformas->results as $plataformas) {
            DB::table('platforms')->insert([
                'id' => $plataformas->id,
                'name' => $plataformas->name
            ]);
        }

        // DB::table('platforms')->insert([
        //     'id' => 1,
        //     'name' => 'prueba'
        // ]);
    }
}
