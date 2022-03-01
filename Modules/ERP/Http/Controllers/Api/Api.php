<?php

namespace Modules\ERP\Http\Controllers\Api;
// namespace App\Http\Controllers\Api;

use Modules\ERP\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Modules\ERP\Entities\Scheme;

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

