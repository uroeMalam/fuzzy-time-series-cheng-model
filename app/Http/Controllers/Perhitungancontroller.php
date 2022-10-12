<?php

namespace App\Http\Controllers;

use App\Models\data;
use App\Models\kabupaten;
use App\Models\kecamatan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PerhitunganController extends Controller
{

    public function index()
    {
        $data['title'] = "/perhitungan";

        return view('perhitungan.index', $data);
    }

    
}
