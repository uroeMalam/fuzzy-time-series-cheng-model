<?php

namespace App\Http\Controllers;

use App\Models\data;
use App\Models\kabupaten;
use App\Models\kecamatan;
use App\Models\pengiriman;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class GrafikController extends Controller
{

    public function index()
    {
        $data['title'] = "/grafik";
        $data['max'] = pengiriman::max('sukses_antar');
        $data['min'] = pengiriman::min('sukses_antar');
        $data['length'] = pengiriman::count('id');
        $data['data'] = json_encode(pengiriman::get());
        return view('grafik.index', $data);
    }

    public function DataTable(Request $request)
    {
        $table = pengiriman::all();
        return DataTables::of($table)
            ->addIndexColumn()
            ->addColumn('total', function ($row) {
                return $row->sukses_antar;
            })
            
            ->rawColumns(['total'])
            ->make(true);
    }

    
}
