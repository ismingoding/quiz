<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Barang;
use App\Models\JenisBarang;

class TransaksiController extends Controller
{
    public function index()
    {
        $data = array(
            'title'      => 'Data Transaksi',
            'data_transaksi' => Transaksi::join('tb_barang', 'tb_barang.id', '=', 'tb_transaksi.id_barang')
                                    ->join('tb_jenisbrg', 'tb_jenisbrg.id', '=', 'tb_transaksi.id_jenis')
                                    ->select('tb_transaksi.*', 'tb_barang.namabarang', 'tb_jenisbrg.nama_jenis')
                                    ->get(),
            'data_barang' => Barang::all(),
            'data_jenis' => JenisBarang::all(),
        );

        return view('admin.transaksi.list', $data);
    }

    public function store(Request $request)
    {
        Transaksi::create([
            'no_transaksi'       => $request->no_transaksi,
            'tgl_transaksi'      => $request->tgl_transaksi,
            'namapelanggan'      => $request->namapelanggan,
            'id_barang'          => $request->id_barang,
            'id_jenis'           => $request->id_jenis,
            'kuantitas'          => $request->kuantitas,
            'total_bayar'        => $request->total_bayar,
        ]);

        return redirect('/transaksi')->with('success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id)
    {
        Transaksi::where('id', $id)
            ->where('id', $id)
                ->update([
                    'no_transaksi'       => $request->no_transaksi,
                    'tgl_transaksi'      => $request->tgl_transaksi,
                    'namapelanggan'      => $request->namapelanggan,
                    'id_barang'          => $request->id_barang,
                    'id_jenis'           => $request->id_jenis,
                    'kuantitas'          => $request->kuantitas,
                    'total_bayar'        => $request->total_bayar,
                ]);

        return redirect('/transaksi')->with('success', 'Data Berhasil Di Ubah');
    }

    public function destroy($id)
    {
        Transaksi::where('id', $id)->delete();
        return redirect('/transaksi')->with('success', 'Data Berhasil Dihapus');
    }
}
