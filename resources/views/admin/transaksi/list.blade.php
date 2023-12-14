@extends('layout.layout')
@section('content')
 <div class="content-body">
    
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{ $title }}</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $title }}</a></li>
            </ol>
    </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <br>
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">{{ $title }}</h4>
                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalCreate">
                                <i class="fa fa-plus"></i>
                                Add Data
                            </button>
                        </div><hr>
                    </div>
                    <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Transaksi</th>
                                            <th>Tanggal</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Barang</th>
                                            <th>Jenis Barang</th>
                                            <th>Kuantitas</th>
                                            <th>Total Bayar</th>
                                            <th>Action</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($data_transaksi as $row)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->no_transaksi}}</td>
                                            <td>{{ $row->tgl_transaksi}}</td>
                                            <td>{{ $row->namapelanggan}}</td>
                                            <td>{{ $row->namabarang}}</td>
                                            <td>{{ $row->nama_jenis }}</td>
                                            <td>{{ $row->kuantitas }} Pcs</td>
                                            <td>Rp. {{ number_format($row->total_bayar) }}</td>
                                            <td>
                                                <a href="#modalEdit{{ $row->id }}" data-toggle="modal" class="btn btn-xs btn-primary"><i class="fa fa-edit">Edit</i></a>
                                                <a href="#modalHapus{{ $row->id }}" data-toggle="modal" class="btn btn-xs btn-danger"><i class="fa fa-trash">Hapus</i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

                                    <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Create Data {{ $title }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="/transaksi/store">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">No Transaksi</label>
                                                        <input type="text" class="form-control" name="no_transaksi" placeholder="Nomor Transaksi..." required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Tanggal Transaksi</label>
                                                        <input type="date" class="form-control" name="tgl_transaksi" placeholder="Tanggal Transaksi..." required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Nama Pelanggan</label>
                                                        <input type="text" class="form-control" name="namapelanggan" placeholder="Nama Pelanggan..." required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Barang</label>
                                                        <select name="id_barang" class="form-control" required>
                                                            <option value="">-- Pilih Barang --</option>
                                                            @foreach ($data_barang as $b)
                                                                <option value="{{ $b->id }}">{{ $b->namabarang }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Jenis Barang</label>
                                                        <select name="id_jenis" class="form-control" required>
                                                            <option value="">-- Pilih Jenis Barang --</option>
                                                            @foreach ($data_jenis as $j)
                                                                <option value="{{ $j->id }}">{{ $j->nama_jenis }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="number" name="kuantitas" class="form-control" placeholder="Kuantitas...." required>
                                                        <div class="input-group-append"><span class="input-group-text">Pcs</span>
                                                        </div>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend"><span class="input-group-text">Rp</span>
                                                        </div>
                                                        <input type="number" name="total_bayar" class="form-control" placeholder="Total Bayar" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Save changes</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    @foreach ($data_transaksi as $d)
                                    <div class="modal fade" id="modalEdit{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit {{ $title }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="/transaksi/update/{{ $d->id }}">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">No Transaksi</label>
                                                        <input type="text" value="{{ $d->no_transaksi }}" class="form-control" name="no_transaksi" placeholder="Nomor Transaksi..." required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Tanggal Transaksi</label>
                                                        <input type="date" value="{{ $d->tgl_transaksi }}" class="form-control" name="tgl_transaksi" placeholder="Tanggal Transaksi..." required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Nama Pelanggan</label>
                                                        <input type="text" value="{{ $d->namapelanggan }}" class="form-control" name="namapelanggan" placeholder="Nama Pelanggan..." required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Barang</label>
                                                        <select name="id_barang" class="form-control" required>
                                                            <option value="{{ $d->id_barang }}">{{ $d->namabarang }}</option>
                                                            @foreach ($data_barang as $b)
                                                                <option value="{{ $b->id }}">{{ $b->namabarang }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Jenis Barang</label>
                                                        <select name="id_jenis" class="form-control" required>
                                                            <option value="{{ $d->id_jenis }}" hidden>{{ $d->nama_jenis }}</option>
                                                            @foreach ($data_jenis as $b)
                                                                <option value="{{ $b->id }}">{{ $b->nama_jenis }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="number" name="kuantitas" value="{{ $d->kuantitas }}" class="form-control" placeholder="Kuantitas...." required>
                                                        <div class="input-group-append"><span class="input-group-text">Pcs</span>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend"><span class="input-group-text">Rp</span>
                                                        </div>
                                                        <input type="number" name="total_bayar" value="{{ $d->total_bayar }}" class="form-control" placeholder="Total Bayar..." required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Save changes</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                    @foreach ($data_transaksi as $c)
                                    <div class="modal fade" id="modalHapus{{ $c->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus {{ $title }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <form method="GET" action="/transaksi/destroy/{{ $c->id }}">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <h5>Apakah anda ingin menghapus data ini ?</h5>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Hapus</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

@endforeach

@endsection