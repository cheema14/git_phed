<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Scheme;
class Api extends Controller
{
    public function get_schemes(){
        // return Scheme::all();
        $data = Scheme::all();
        echo json_encode([
            'status' => true,
            'data' => $data,
            'messages' => [
                'Scheme listings'
            ]
        ]);
        exit;
    }
}
