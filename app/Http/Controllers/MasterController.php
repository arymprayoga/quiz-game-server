<?php

namespace App\Http\Controllers;

use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class MasterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getViewMasterUser()
    {
        $dataUser = User::all();
        return view('master.master-user', compact('dataUser'));
    }

    public function getDataMasterUser(Request $request)
    {
        if ($request->ajax()) {
            $data = User::all();
            return Datatables::of($data)->addColumn('action', function ($data) {
                return '<a data-toggle="modal" data-target="#modalubahuser" data-id="' . $data->id . '" data-username="' . $data->name . '" data-email="' . $data->email . '" class="btn btn-xs btn-primary mr-2" ><i class="fas fa-edit"></i></a>
                <a data-toggle="modal" data-target="#modalhapususer" data-id="' . $data->id . '" data-username="' . $data->name . '" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></a>';
            })->make(true);
        }
    }

    public function deleteDataMasterUser(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
        ]);
        $user = User::findOrFail($request->idUser);
        $user->delete();
        return back();
    }

    public function addDataMasterUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return back();
    }
}
