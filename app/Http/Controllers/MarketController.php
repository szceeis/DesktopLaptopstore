<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Market;

class MarketController extends Controller
{
    public function index(Request $request){

        $query = Market::query();
        if ($request->has('search') && $request->search != '') {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }
        $data = $query->get();
        return view('market', compact('data'));
    }

    public function tambahData(){
        return view('tambahData');
    }

    public function insertData(Request $request){
        // dd($request->all());
        $data = Market::create($request->all());
        if ($request->hasFile('foto')){
            $request->file('foto')->move('fotoMarket/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('market')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function tampilData($id){
        $data = Market::find($id);
        // dd($data);
        return view('tampilData', compact('data'));
    }

    public function updateData(Request $request, $id){
        $data = Market::find($id);

    // Update data selain foto
    $data->update($request->except('foto'));

    // Kalau ada file foto baru yang diupload
    if ($request->hasFile('foto')) {
        // Simpan file foto ke folder
        $request->file('foto')->move('fotoMarket/', $request->file('foto')->getClientOriginalName());

        // Update nama file di database
        $data->foto = $request->file('foto')->getClientOriginalName();
        $data->save();
    }

    return redirect()->route('market')
        ->with('success', 'Data berhasil diupdate');
    }

    public function delete($id){
        $data = Market::find($id);
        $data->delete();
        return redirect()->route('market')
            ->with('success', 'Data berhasil dihapus');
    }
    
    public function beli($id)
    {
        $data = Market::find($id);
        return view('beli', compact('data'));
    }

    public function prosesBeli(Request $request, $id)
    {
        $market = Market::find($id);
        $jumlahBeli = $request->input('jumlah_beli');

        if ($jumlahBeli > $market->jumlah_barang) {
            return back()->with('error', 'Stok Habis!');
        }

        $market->jumlah_barang -= $jumlahBeli;
        $market->save();

        $total = $jumlahBeli * $market->harga_barang;

        // Tampilkan nota
        return view('nota', [
            'market' => $market,
            'jumlahBeli' => $jumlahBeli,
            'total' => $total
        ]);
    }
}
