<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiControlller extends Controller
{
    //

    public function index()
    {
        $data = Pegawai::get();

        $status = true;
        $message = 'Data Pegawai';
        $result = [
            'status' => $status,
            'message' => $message,
            'data' => $data
        ];

        return response()->json($result);
    }
}
