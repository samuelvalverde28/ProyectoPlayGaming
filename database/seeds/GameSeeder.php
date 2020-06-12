<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

class GameSeeder extends Seeder
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
                'base_uri' => 'https://api.rawg.io/api/',
                // You can set any number of default request options.
                'timeout'  => 2.0,
            ]);

            for ($i=1; $i < 51 ; $i++) { 
    
            $response = $client->request('GET', "games?page=$i");
    
            $juegos = json_decode($response->getBody()->getContents());
            
            // dd($juegos->results[1]->id);

            
    
            foreach ($juegos->results as $juegos) {

                if ($juegos->rating > $juegos->rating_top) {
                   $juegos->rating_top++;
                }

                if ($juegos->clip == null) {
                    $id= $juegos->id;
                // var_dump($id);
                DB::table('games')->insert([
                    'id' => $id,
                    'name' => $juegos->name,
                    'released' => $juegos->released,
                    'background_image' => $juegos->background_image,
                    'rating' => $juegos->rating,
                    'rating_top' => $juegos->rating_top
                    
                ]);
                } else {
                    $id= $juegos->id;
                // var_dump($id);
                DB::table('games')->insert([
                    'id' => $id,
                    'name' => $juegos->name,
                    'released' => $juegos->released,
                    'background_image' => $juegos->background_image,
                    'rating' => $juegos->rating,
                    'rating_top' => $juegos->rating_top,
                    'clip' => $juegos->clip->clip
                ]);
                }
                
    
                foreach ($juegos->parent_platforms as $plataformas) {
                    DB::table('games_platforms')->insert([
                        'idgames' => $id,
                        'idplatforms' => $plataformas->platform->id
                        
                    ]);
                }
    
                foreach ($juegos->short_screenshots as $img) {
                    DB::table('images')->insert([
                        'idgames' => $id,
                        'img' => $img->image
                        
                    ]);
                }
    
    
            }



        }

        
    }
}
