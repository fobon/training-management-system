<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class RickAndMortyController extends Controller
{
    public function index(){
        $client = new Client();
        $response = $client->get('https://rickandmortyapi.com/api/character');
        $data = json_decode($response->getBody(), true);

        return view('rickandmorty', ['characters' => $data['results']]);
    }
}
