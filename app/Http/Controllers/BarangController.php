<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\JenisBarang;

class BarangController extends Controller
{
    public function index()
    {
        $data = array(
            'title'      => 'Data Barang',
            'data_jenis' => JenisBarang::all(),
            'data_barang' => Barang::join('tb_jenisbrg', 'tb_jenisbrg.id', '=', 'tb_barang.idjenis')
                                    ->select('tb_barang.*', 'tb_jenisbrg.nama_jenis')
                                    ->get(),
        );

        return view('admin.master.barang.list', $data);
    }

    public function store(Request $request)
    {
        if ($request->has('idjenis')) {
        Barang::create([
            'idjenis'       => $request->idjenis,
            'namabarang'    => $request->namabarang,
            'harga'         => $request->harga,
            'stok'          => $request->stok,
        ]);

        return redirect('/barang')->with('success', 'Data Berhasil Disimpan');
        } else {
            // Handle jika idjenis tidak ditemukan
        return redirect('/barang')->with('error', 'ID Jenis tidak valid');
        }
    }

    public function update(Request $request, $id)
    {
        Barang::where('id', $id)
            ->where('id', $id)
                ->update([
                    'idjenis'      => $request->idjenis,
                    'namabarang'   => $request->nama_barang,
                    'harga'        => $request->harga,
                    'stok'         => $request->stok,
                ]);

        return redirect('/barang')->with('success', 'Data Berhasil Di Ubah');
    }

    public function destroy($id)
    {
        Barang::where('id', $id)->delete();
        return redirect('/barang')->with('success', 'Data Berhasil Dihapus');
    }
}
