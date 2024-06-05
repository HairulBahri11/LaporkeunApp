<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class pertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pertanyaan::get();
        return view('admin.pertanyaan.index', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pertanyaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Validator::make($request->all(), [
            'pertanyaan' => 'required',
            'all_jawaban' => 'required',
        ]);

        if ($data->fails()) {
            return redirect()->back()->withErrors($data->errors());
        }

        $data = new Pertanyaan;
        $data->pertanyaan = $request->pertanyaan;
        $data->status = 'active';
        $data->save();

        // array data all_jawaban
        $arr_jawaban = $request->input('all_jawaban')[0];
        $arr_jawaban = explode(',', $arr_jawaban);
        foreach ($arr_jawaban as $key => $value) {
            $data_jawaban = new Jawaban;
            $data_jawaban->pertanyaan_id = $data->id;
            $data_jawaban->jawaban = $value;
            $data_jawaban->save();
        }
        return redirect('/data_pertanyaan')->with('success', 'Data Pertanyaan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Pertanyaan::find($id);
        return view('admin.pertanyaan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'pertanyaan' => 'required',
        ]);
        $data = Pertanyaan::find($id);
        $data->pertanyaan = $request->pertanyaan;
        $data->save();
        return redirect('/data_pertanyaan')->with('success', 'Data Pertanyaan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function active(string $id)
    {

        $data = Pertanyaan::find($id);
        if ($data->status == 'active') {
            $data->status = 'nonactive';
            $msg = 'Pertanyaan atas ID : ' . $data->id . ' Berhasil Di Nonaktifkan';
        } else {
            $data->status = 'active';
            $msg = 'Pertanyaan atas ID : ' . $data->id . ' Berhasil Di Aktifkan';
        }
        $data->save();
        return redirect('/data_pertanyaan')->with('success', $msg);
    }
}
