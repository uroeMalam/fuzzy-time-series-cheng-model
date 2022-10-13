<?php

namespace App\Http\Controllers;

use App\Models\beasiswa;
use App\Models\pengiriman;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PengirimanController extends Controller
{

    public function index()
    {
        $data['pengiriman'] = pengiriman::groupBy('tahun')->get();
        // $data['pengiriman'] = pengiriman::all(); 
        $data['title'] = "pengiriman";
        return view('pengiriman.index', $data);
    }

    public function create()
    {
        $data['title'] = 'pengiriman';
        return view('pengiriman.create',$data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'tahun'=>'required',
            'bulan'=>'required',
            'total'=>'',
            'sukses_antar'=>'required',
            'gagal_antar'=>'required',
            'retus'=>'required',
        ]);
        pengiriman::create($data);
        return response()->json(['status' => true, 'message' => 'berhasil']);
    }

    // // public function show($id)
    // // {
    // //     //
    // // }

    public function edit($id)
    {        
        $data['id'] = $id;
        $data['data'] = pengiriman::where('id', $id)->first();
        return view('pengiriman.edit', $data);
    }

    public function update(Request $request)
    {
        
        pengiriman::where('id', $request->id)->update([
            'tahun' => $request->tahun,
            'bulan' => $request->bulan,
            'total' => $request->total,
            'sukses_antar' => $request->sukses_antar,
            'gagal_antar' => $request->gagal_antar,
            'retus' => $request->retus,
            
        ]);
        return response()->json(['status' => true, 'message' => 'berhasil']);
    }

    public function destroy(Request $request)
    {
        pengiriman::findOrFail($request->id)->delete();
        return response()->json(['status' => true, 'message' => 'berhasil']);
    }

    public function DataTable(Request $request)
    {
        $table = pengiriman::select('tb_pengiriman.*')
                            ->where('tb_pengiriman.tahun', $request->tahun)
                            ->get();
        return DataTables::of($table)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn_edit = '<button type="button" class="btn btn-sm btn-primary" id="edit" data-id="' . $row->id . '"><i class="fas fa-edit"></i></button>';
                $btn_hapus = '<button type="button" class="btn btn-sm btn-danger" id="hapusData" data-id="' . $row->id . '" data-Text="' . $row->bulan . '"><i class="fas fa-trash"></i></button>';

                $btn = '<div class="btn-group" role="group" aria-label="LihatData">' .
                    $btn_edit .
                    $btn_hapus .
                    '</div>';
                return $btn;
            })
            
            ->rawColumns(['action'])
            ->make(true);
    }
}
