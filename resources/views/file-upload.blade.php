@extends('layouts.app-new')

@section('content')
    <div class="card mt-2">
        <div class="card-header">
            <h2 class="card-title">Daftar Buku</h2>
            {{-- @can('tambah master pengguna') --}}
                <a data-toggle="modal" data-target="#modaltambahbuku"><button type="button" class="btn btn-info btn-sm"
                        style="float: right;"><i class="fa fa-plus"></i> Tambah
                        Buku</button></a>
            {{-- @endcan --}}
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped" id="buku-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Email</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    {{-- Modal Hapus Buku --}}
    <div class="modal fade" id="modalhapusbuku" tabindex="-1" role="dialog" aria-labelledby="modalhapusbukuLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalhapusbukuLabel">Hapus Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('delete-master-buku') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="idBuku" id="idBuku">
                    <div class="modal-body">
                        <p>Yakin ingin menghapus buku ini?</p>
                        <p class="nama"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal Tambah Buku --}}
    <div class="modal fade" id="modaltambahbuku" role="dialog" aria-labelledby="modaltambahbukuLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modaltambahbukuLabel">Tambah Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('add-master-buku') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        {{-- <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" required name="username" id="username">
                        </div> --}}
                        <div class="form-group">
                            <label for="file">File Buku</label>
                            <input type="file" class="form-control" required name="file" id="file">
                        </div>
                        <div class="form-group">
                            <label for="name">Judul Buku</label>
                            <input type="text" class="form-control" required name="name" id="name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
