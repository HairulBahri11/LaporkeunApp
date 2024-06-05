<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class jawabanController extends Controller
{
    public function index($id)
    {
        $data = Jawaban::where('pertanyaan_id', $id)->get();
        $id_pertanyaan = $id;
        return view('admin.jawaban.index', compact('data', 'id_pertanyaan'));
    }

    public function create($id)
    {
        $data = Pertanyaan::find($id);

        return view('admin.jawaban.create', compact('data'));
    }

    public function store(Request $request)
    {
        $data = Validator::make($request->all(), [
            'pertanyaan' => 'required',
            'all_jawaban' => 'required',
        ]);

        if ($data->fails()) {
            return redirect()->back()->withErrors($data->errors());
        }

        // array data all_jawaban
        $arr_jawaban = $request->input('all_jawaban')[0];
        $arr_jawaban = explode(',', $arr_jawaban);
        foreach ($arr_jawaban as $key => $value) {
            $data_jawaban = new Jawaban;
            $data_jawaban->pertanyaan_id = $request->pertanyaan_id;
            $data_jawaban->jawaban = $value;
            $data_jawaban->save();
        }
        return redirect('/data_jawaban/' . $request->pertanyaan_id)->with('success', 'Data Option Jawaban Berhasil Ditambahkan');
    }

    public function destroy(string $id)
    {
        $data = Jawaban::find($id);
        $id_pertanyaan = $data->pertanyaan_id;
        $data->delete();
        return redirect('/data_jawaban/' . $id_pertanyaan)->with('success', 'Data Option Jawaban Berhasil Dihapus');
    }
}
