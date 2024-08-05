<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\PesananDetail;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Post;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $posts = Post::where('id', $id)->first();
        return view('pesan.index', compact('posts'));
    }

    public function pesan(Request $request, $id)
    {
        $posts = Post::where('id', $id)->first();
        $tanggal = Carbon::now();

        //validasi jika jumlah beli lebih dari stok
        if ($request->jumlah_pesan > $posts->stok) {
            return redirect('pesan/. $id');
        } 

        //cek validasi
        $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        //simpan di database
        if (empty($cek_pesanan)) {
            $pesanan = new Pesanan;
            $pesanan->user_id = Auth::user()->id;
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 0;
            $pesanan->jumlah_harga = 0;
            $pesanan->save();
        }

        //simpan ke database pesanan detaiil
        $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        //cek pesanan detail
        $cek_pesanan_detail = PesananDetail::where('barang_id', $posts->id)->where('pesanan_id', $pesanan_baru->id)->first();

        if (empty($cek_pesanan_detail)) {

            $pesanan_detail = new PesananDetail;
            $pesanan_detail->barang_id = $posts->id;
            $pesanan_detail->pesanan_id = $pesanan_baru->id;
            $pesanan_detail->jumlah = $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $posts->harga * $request->jumlah_pesan;
            $pesanan_detail->save();
        } else {
            $pesanan_detail = PesananDetail::where('barang_id', $posts->id)->where('pesanan_id',    $pesanan_baru->id)->first();
            $pesanan_detail->jumlah =  $pesanan_detail->jumlah + $request->jumlah_pesan;

            //harga sekarang
            $harga_pesanan_detail_baru = $posts->harga * $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga + $harga_pesanan_detail_baru;
            $pesanan_detail->update();
        }

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga + $posts->harga * $request->jumlah_pesan;
        $pesanan->update();

        return redirect('/user');
    }

    public function check_out()
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan_details = [];
        if (!empty($pesanan)) {

            $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
        }

        return view('pesan.check_out', compact('pesanan', 'pesanan_details'));
    }

    public function delete($id)
    {
        $pesanan_detail = PesananDetail::where('id', $id)->first();

        $pesanan =  Pesanan::where('id', $pesanan_detail->pesanan_id)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga - $pesanan_detail->jumlah_harga;
        $pesanan->update();

        $pesanan_detail->delete();

        Alert::error('Pesanan Dihapus', 'Hapus');
        return redirect('check-out');
    }

    public function konfirmasi()
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan_id = $pesanan->id;
        $pesanan->status = 1;
        $pesanan->update();

        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan_id)->get();
        foreach ($pesanan_details as $pesanan_detail) {
            $posts = Post::where('id', $pesanan_detail->barang_id)->first();
            $posts->stok = $posts->stok - $pesanan_detail->jumlah;
            $posts->update();
        }

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $pesanan->jumlah_harga,
            ),
            'costumer_detail' => array(
                'first_name' => Auth::user()->fullname,
                'email' => Auth::user()->email
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $pesanan->snap_token = $snapToken;
        $pesanan->save();

        return redirect('pembayaran');
    }

    public function pembayaran()
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', '!=', 0)->get();


        return view('pesan.pembayaran', compact('pesanan'));
    }
}
