<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\pemesanan;
use App\Models\detail_pemesanan;
use App\Models\produk;
use Carbon\Carbon;

class memberController extends Controller
{
    public function home(){
        // dd(Auth::user()->role);
        $data = DB::table('produk')->where('status', 1)->paginate(8);
        return view('home', compact('data'));
    }

    public function search(Request $request){
        // dd($request->search);
        
        if ($request->search){
            // dd('tes');
            $data = DB::table('produk')->where('status', 1)
            ->where('name', 'like', '%' .$request->search .'%')->paginate(8);
            // dd($data);
        }else{

            $data = DB::table('produk')->where('status', 1)->paginate(8);
        }
        return view('search', compact('data'));
    }

    public function profile(){
        return view('profile');
    }

    public function indexEditPassword(){
        return view('editPassword');
    }

    public function updatePassword(Request $request){
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:5|max:20',
        ]);
        
        if (Hash::check($request->old_password, Auth::user()->password)) {
            DB::table('users')->where('id', Auth::user()->id)->update([
                'password' => bcrypt($request->password)
            ]);
            return redirect('/profile')->with('success', 'Successfully update your password.');
        }else{
            throw ValidationException::withMessages([
                'old_password' => 'Old password does not match'
            ]);
        }
    }

    public function indexEditProfile(){
        return view('editProfile');
    }

    public function UpdateProfile(Request $request){
        $request->validate([
            'username' => 'required|unique:users|min:5|max:20',
            'email' => 'required|email|unique:users',
            'phone' => 'required|min:10|max:13',
            'address' => 'required|min:5'
        ]);

        DB::table('users')->where('id', Auth::user()->id)->update([
            'username' => $request->username,
            'email' => $request->email,
            'phone' =>$request->phone,
            'address' => $request->address
        ]);
        return redirect('/profile')->with('success', 'Successfully update your profile.');
    }

    public function detail(Request $request){
        $data = DB::table('produk')->where('name', $request->name)->get();
        // dd($data);
        return view('detailProduct', compact('data'));
    }

    public function addToCart(Request $request){
        // dd($request->all());
        $request->validate([
            'quantity' => 'required|gte:1'
        ]);

        DB::table('cart')->insert([
            'id_product' => $request->id,
            'status' => 1,
            'id' => Auth::user()->id,
            'quantity' => $request->quantity
        ]);

        return redirect('/cart');
    }

    public function cart(){
        $data = DB::table('cart')
        ->join('produk', 'cart.id_product', '=', 'produk.id_product')
        ->where('cart.id', Auth::user()->id)
        ->where('cart.status', 1)
        ->get();
        
        $count = DB::table('cart')
        ->join('produk', 'cart.id_product', '=', 'produk.id_product')
        ->where('cart.id', Auth::user()->id)
        ->where('cart.status', 1)->count();
        // dd($count);
        $totalPrice = 0;
        for ($i=0; $i < $count; $i++) { 
            $totalPrice += $data[$i]->price * $data[$i]->quantity;
        }
        // dd($totalPrice);

        return view('cart', compact('data', 'totalPrice'));
    }

    public function editCart(Request $request){
        $data = DB::table('cart')
        ->join('produk', 'cart.id_product', '=', 'produk.id_product')
        ->where('id_cart', $request->id)->get();
        return view('editCart', compact('data'));
    }

    public function updateCart(Request $request){
        $request->validate([
            'quantity' => 'required|gte:1'
        ]);

        DB::table('cart')->where('id_cart', $request->id)->update([
            'quantity' => $request->quantity
        ]);
        return redirect('/cart');
    }

    public function deleteCart(Request $request){
        DB::table('cart')->where('id_cart', $request->id)->update([
            'status' => 2
        ]);

        return redirect('/cart');
    }

    public function checkout(){
        $pemesanan = new pemesanan;
        $pemesanan->tanggal_pemesanan = Carbon::now();
        $pemesanan->id = Auth::user()->id;
        $pemesanan->save();

        $data = DB::table('cart')
        ->join('produk', 'cart.id_product', '=', 'produk.id_product')
        ->where('cart.id', Auth::user()->id)
        ->where('cart.status', 1)
        ->get();

        $count = DB::table('cart')
        ->join('produk', 'cart.id_product', '=', 'produk.id_product')
        ->where('cart.id', Auth::user()->id)
        ->where('cart.status', 1)->count();
        // dd($count);
        $totalPrice = 0;
        for ($i=0; $i < $count; $i++) { 
            $totalPrice += $data[$i]->price * $data[$i]->quantity;
        }
        
        $detail = new detail_pemesanan;
        $detail->create([
            'id_pemesanan' => $pemesanan->id_pemesanan,
            'total_price' => $totalPrice
        ]);

        DB::table('cart')->where('id', Auth::user()->id)->where('status', 1)->update([
            'id_pemesanan' => $pemesanan->id_pemesanan,
            'status' => 0
        ]);
        return redirect('/history');
    }

    public function history(){
        $order = DB::table('pemesanan')
        ->join('detail_pemesanan', 'pemesanan.id_pemesanan', '=', 'detail_pemesanan.id_pemesanan')
        ->where('pemesanan.id', Auth::user()->id)
        ->get();

        $item = DB::table('cart')
        ->join('produk', 'cart.id_product', '=', 'produk.id_product')
        ->where('id', Auth::user()->id)
        ->where('cart.status', 0)->get();

        // dd($order);
        return view('history', compact('order', 'item'));
    }
}
