<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\DataPengunjung;
use App\Exports\DataPengunjungNow;

use App\TbPengunjung;
use Carbon\Carbon;

use Excel;

class PengunjungController extends Controller
{
    public function dataPengunjung()
    {
        $data = \App\TbPengunjung::all();
        $total = 0;
        $child = 0;
        $adult = 0;
        $college = 0;
        foreach ($data as $key => $val) {
            $total += $val['total_harga'];
        }
        foreach ($data as $key => $val) {
            $child += $val['child'];
        }
        foreach ($data as $key => $val) {
            $adult += $val['adult'];
        }
        foreach ($data as $key => $val) {
            $college += $val['college'];
        }

        return view('dataPengunjung', ['datas' => $data, 'total' => $total, 'child' => $child, 'adult' => $adult, 'college' => $college]);
    }

    public function dataPengunjungNow()
    {
        $tanggal = Carbon::now()->format('Y-m-d');
        $data = \App\TbPengunjung::where('tanggal', $tanggal)->get();
        $total = 0;
        $child = 0;
        $adult = 0;
        $college = 0;
        foreach ($data as $key => $val) {
            $total += $val['total_harga'];
        }
        foreach ($data as $key => $val) {
            $child += $val['child'];
        }
        foreach ($data as $key => $val) {
            $adult += $val['adult'];
        }
        foreach ($data as $key => $val) {
            $college += $val['college'];
        }

        return view('dataPengunjung', ['datas' => $data, 'total' => $total, 'child' => $child, 'adult' => $adult, 'college' => $college]);
    }

    public function inputPengunjung()
    {
        return view('inputPengunjung');
    }

    public function  inputPengunjungSave(Request $request)
    {
        $pengunjung = new TbPengunjung;

        $pengunjung->nama = $request->get('nama');
        $pengunjung->email = $request->get('email');
        $pengunjung->asal = $request->get('asal');
        $pengunjung->warga_negara = $request->get('warga_negara');
        $pengunjung->no_hp = $request->get('no_hp');
        $pengunjung->child = $request->get('child');
        $pengunjung->college = $request->get('college');
        $pengunjung->adult = $request->get('adult');
        $pengunjung->total_harga = $request->get('total_harga');
        $pengunjung->tanggal = Carbon::now()->format('Y-m-d');

        // dd($pengunjung);

        $pengunjung->save();

        return redirect()->back();
    }

    public function exporttoExcel()
    {
        return Excel::download(new DataPengunjung, 'data_pengunjung.xlsx');
    }

    public function exporttoExcelNow()
    {
        return Excel::download(new DataPengunjungNow, 'data_pengunjung.xlsx');
    }
}
