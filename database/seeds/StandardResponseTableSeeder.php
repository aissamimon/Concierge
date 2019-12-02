<?php

use App\StandardResponse;
use Illuminate\Database\Seeder;

class StandardResponseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	$response = new StandardResponse();
      $response->response = 'Ein Techniker ist unterwegs';
      $response->save();

      $response = new StandardResponse();
      $response->response = 'Das Passwort is "Passwort"';
      $response->save();
      
    }
}
