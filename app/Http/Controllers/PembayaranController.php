<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keranjang;
use App\Pembayaran;
use Auth;
use DB;
use Illuminate\Support\Str;


class PembayaranController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $keranjangs = Keranjang::where('id_penyewa', Auth::user()->id)->get();
    $tanggal = null;
    foreach ($keranjangs as $keranjang) {
      $tanggal = $keranjang->tgl_pinjam;
    }
    if ($keranjangs->isEmpty()) {
      return redirect()->back();
    } elseif ($tanggal == null) {
      return redirect()->route('keranjang.tampil')->with('error', 'Masukan Tanggal pinjam dan kembali terlebih dahulu');
    }
    return view('pembayaran', compact('keranjangs'));
  }

  public function show()
  {
    $totals = DB::table('pembayarans')->select('no_transaksi', DB::raw('SUM(total) as total_semua'))->groupBy('no_transaksi')->get();
    // dd($total);
    $keranjangs = Keranjang::where('id_penyewa', Auth::user()->id)->get();
    $pembayarans = Pembayaran::where('id_penyewa', Auth::user()->id)->get();
    return view('data_pembayaran', compact('keranjangs', 'pembayarans', 'totals'));
  }

  public function store(Request $request)
  {
    $user = Auth::user();
    $this->validate($request, [
      'telp' => "numeric|digits_between:10,13|unique:users,telp,$user->id",
      'alamat' => 'required|max:255|min:5',
    ]);
    if ($user->email_verified_at == null) {
      return redirect()->back()->with('error', 'Email belum di verifikasi')->withInput();
    }
    $id_transaksi = 'AL' . strtoupper(Str::random(10));
    $user->update([
      'telp' => $request->telp,
      'alamat' => $request->alamat
    ]);
    $count = count($request->id_alat);
    for ($i = 0; $i < $count; $i++) {
      Pembayaran::create([
        'no_transaksi' => $id_transaksi,
        'id_penyewa' => $user->id,
        'id_alat' => $request->id_alat[$i],
        'qty' => $request->qty[$i],
        'total' => $request->total[$i],
        'tgl_pinjam' => $request->tgl_pinjam,
        'tgl_kembali' => $request->tgl_kembali,
        'durasi' => $request->durasi,
        'status' => 0
      ]);
    }
    Keranjang::where('id_penyewa', Auth::user()->id)->delete();
    return redirect()->route('data.pembayaran')->with('success', 'Pemesanan berhasil');
  }

  public function update(Request $request, $transakasi)
  {
    // dd($request->all());
    $this->validate($request, [
      'bukti' => 'required|mimes:jpeg,jpg,png|max:2048'
    ]);

    $pembayarans = Pembayaran::where('no_transaksi', $transakasi)->where('status', 0)->get();
    $count = count($pembayarans);
    $bukti = $request->file('bukti')->store('bukti');
    for ($i = 0; $i < $count; $i++) {
      $pembayarans[$i]->update([
        'bukti_user' => $bukti,
        'status' => 1
      ]);
    }
    return redirect()->back()->with('success', 'Bukti Pembayaran berhasil diupload');
  }


  protected function proses(Request $request)
  {
    $user = Auth::user();
    $id_transaksi = 'MJ-' . mt_rand(0000, 9999);

    $this->validate($request, [
      'telp' => "numeric|digits_between:10,13|unique:users,telp,$user->id",
      'alamat' => 'required|max:255|min:5',
    ]);
    if ($user->email_verified_at == null) {
      return redirect()->back()->with('error', 'Email belum di verifikasi')->withInput();
    }

    $user->update([
      'telp' => $request->telp,
      'alamat' => $request->alamat
    ]);

    // Pembayaran::create([
    //   'no_transaksi' => $id_transaksi,
    //   'id_penyewa' => $user->id,
    //   'id_alat' => $request->id_alat,
    //   'qty' => $request->qty,
    //   'total' => $request->total,
    //   'tgl_pinjam' => $request->tgl_pinjam,
    //   'tgl_kembali' => $request->tgl_kembali,
    //   'durasi' => $request->durasi,
    //   'transaction_status' => 'pending',
    //   'status' => 0
    // ]);

    $count = count($request->id_alat);
    for ($i=0; $i < $count; $i++) {
      Pembayaran::create([
        'no_transaksi' => $id_transaksi,
        'id_penyewa' => $user->id,
        'id_alat' => $request->id_alat[$i],
        'qty' => $request->qty[$i],
        'total' => $request->total,
        'tgl_pinjam' => $request->tgl_pinjam,
        'tgl_kembali' => $request->tgl_kembali,
        'durasi' => $request->durasi,
        // 'transaction_status' => 'pending',
        'status' => 1
      ]);
    }

    Keranjang::where('id_penyewa', Auth::user()->id)->delete();


    // Set your Merchant Server Key
    \Midtrans\Config::$serverKey = 'SB-Mid-server-v3PQ3VtoznMAyIQ_p7MQ5aVo';
    // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    \Midtrans\Config::$isProduction = false;
    // Set sanitization on (default)
    \Midtrans\Config::$isSanitized = true;
    // Set 3DS transaction for credit card to true
    \Midtrans\Config::$is3ds = true;

    //buat array untuk kirim ke midtrans

    //  $keranjangs = Keranjang::where('id_penyewa', Auth::user()->id)->get();
    $params = array(
      'transaction_details' => array(
        'order_id' => $id_transaksi,
        'gross_amount' =>  $request->totals,
      ),
      'customer_details' => array(
        'first_name' => Auth::user()->username,
        'email' => Auth::user()->email,
        'phone' => Auth::user()->telp
      ),
      'item_details' => [
        [
          'id'       => $request->id_alats,
          'price'    => $request->totals,
          'quantity' => $request->qtys,
          'name'     => $request->namas
        ]
      ],
      'enabled_payments' => array(
        'credit_card','bank_transfer', 'gopay', 'shopeepay', 'indomaret','alfamart'
      ),
      'vtweb' => []
    );

    try {
      // Get Snap Payment Page URL
      $paymentUrl = \Midtrans\Snap::createTransaction($params)->redirect_url;

      // Redirect to Snap Payment Page
      return redirect()->away($paymentUrl);
    } catch (Exception $e) {
      echo $e->getMessage();
    }

    // return redirect()->route('data.pembayaran')->with('success', 'Pemesanan berhasil');
  }
}
