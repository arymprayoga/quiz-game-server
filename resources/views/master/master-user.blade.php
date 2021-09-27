@extends('layouts.app-new')

@section('content')
    <div class="card mt-2">
        <div class="card-header">
            <h2 class="card-title">Data User</h2>
            @can('tambah master pengguna')
                <a data-toggle="modal" data-target="#modaltambahuser"><button type="button" class="btn btn-info btn-sm"
                        style="float: right;"><i class="fa fa-plus"></i> Tambah
                        User</button></a>
            @endcan
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped" id="users-table">
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
    {{-- Modal Hapus Pengguna --}}
    <div class="modal fade" id="modalhapususer" tabindex="-1" role="dialog" aria-labelledby="modalhapususerLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalhapususerLabel">Hapus Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('delete-master-user') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="idUser" id="idUser">
                    <div class="modal-body">
                        <p>Yakin ingin menghapus pengguna ini?</p>
                        <p class="username"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal Tambah Pengguna --}}
    <div class="modal fade" id="modaltambahuser" role="dialog" aria-labelledby="modaltambahuserLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modaltambahuserLabel">Tambah Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('add-master-user') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        {{-- <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" required name="username" id="username">
                        </div> --}}
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" required name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" required name="password" id="password">
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
