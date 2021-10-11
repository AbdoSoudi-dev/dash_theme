<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;

class clientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('clients', compact('clients'));
    }
    public function store(Request $request)
    {

        Client::insert([
            'name' => $request['name'],
            'email' => $request['email'],
            'mobile_number' => $request['mobile_number'],
            'address' => $request['address'],
            'gender' => $request['gender'],
            'client_code' => mt_rand(1000000000, 9999999999),
            'user_id' => Auth::id(),
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);


       return redirect('clients');

    }
    public function edit($id)
    {
        $client = Client::find($id);
       return view('edit_client', compact('client'));

    }
    public function update($id,Request $request)
    {
        $client = Client::find($id);
        $client->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'mobile_number' => $request['mobile_number'],
            'address' => $request['address'],
            'gender' => $request['gender'],
            'updated_at' => NOW()
        ]);
    }
    public function delete($id)
    {
       Client::find($id)->delete();
        return redirect('clients')->with('success', 'Post has been deleted!');
    }
}
