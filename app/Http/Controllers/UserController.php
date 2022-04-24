<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\PaymentMethod;
use App\Models\ProductCart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Auth::check()) {
                $this->user = Auth::user();
                $productCart = ProductCart::where('user_id', Auth::id())->where('payment_id', null)->get();
                $total = 0;
                foreach($productCart as $cart) {
                    $total += $cart->quantity * $cart->product->price;
                }
                $user = Auth::user();
                view()->share('user', $user);
                view()->share('productCart', $productCart);
                view()->share('total', $total);
            }
            return $next($request);
        });
    }


    public function paymentMethod()
    {
        $paymentMethod = PaymentMethod::where('user_id', Auth::id())->count();
        if($paymentMethod < 1) {
            PaymentMethod::create([
                'user_id' => Auth::id(),
                'name' => $this->user->name,
                'card_number' => '',
                'expiration_date' => '',
                'cvv' => '',
                'method' => 'paypal',
            ]);
        }
        return view('frontend.pages.user.payment-method');
    }

    public function address(){
        $address = Address::where('user_id', Auth::id())->count();
        if($address < 1) {
            Address::create([
                'user_id' => Auth::id(),
                'address' => '',
                'city' => '',
                'state' => '',
                'zip' => '',
                'country' => '',
            ]);
        }
        return view('frontend.pages.user.address');
    }

    public function addressUpdate(Request $request)
    {
        $address = Address::where('user_id', Auth::id())->first();
        $address->update([
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'country' => $request->country,
        ]);
        return redirect()->back()->with('success', 'Adres bilgisi güncellendi');
    }

    public function paymentUpdate(Request $request){
        $request->validate([
            'name' => 'required',
            'card_number' => 'required',
            'expiration_date' => 'required',
            'cvc' => 'required',
            'method' => 'required',
        ]);
        $paymentMethod = PaymentMethod::where('user_id', Auth::id())->first();
        $paymentMethod->name = $request->name;
        $paymentMethod->card_number = $request->card_number;
        $paymentMethod->expiration_date = $request->expiration_date;
        $paymentMethod->cvv = $request->cvc;
        $paymentMethod->method = $request->method;
        $paymentMethod->save();

        return redirect()->route('user.payment-method')->with('success', 'Ödeme yöntemi kaydedildi.');
    }

    public function userSuspend(){
        $user = User::find(Auth::id());
        $user->update([
            'is_active' => false,
        ]);
        Session::flush();
        
        Auth::logout();
        return redirect()->route('home')->with('success', 'Kullanıcı hesabınız askıya alındı.');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $user->name = $request->name;
        $user->phone = $request->phone;
        if ($request->hasFile('image')) {
            $user->image = $request->image->store('public/images/user');
        }
        if($request->password == $request->password_confirmation && $request->password != null && $request->password_confirmation != null) {
            $user->password = bcrypt($request->password);
        }
        else{
            return redirect()->back()->withErrors('Şifreler uyuşmuyor.');
        }
        $user->save();
        return redirect()->back()->with('success', 'Bilgileriniz başarıyla güncellendi.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
