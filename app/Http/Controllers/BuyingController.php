<?php

namespace App\Http\Controllers;


use App\Models\Buying;
use Illuminate\Http\Request;

class BuyingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buying = Buying::all();
        return view('admin.index',compact('buying'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        return view('user.buy');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Buying::create([
            'nama'=> $request->nama,
            'email'=> $request->email,
            'no_telp'=> $request->no_telp,
            'alamat'=> $request->alamat,
            'nama_brg'=> $request->nama_brg,
            'harga'=> $request->harga,
        ]);

        return redirect('user');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
