<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Product;
use App\Models\ProductCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check()) {
                $this->user = Auth::user();
                $productCart = ProductCart::where('user_id', $this->user->id)->where('payment_id', null)->get();
                $total = 0;
                foreach($productCart as $cart) {
                    $total += $cart->quantity * $cart->product->price;
                }
                $user = $this->user;
                view()->share('productCart', $productCart);
                view()->share('total', $total);
                view()->share('user', $user);
            }
            return $next($request);
        });
    }

    public function orderHistory()
    {
        $payments = Payment::where('user_id', auth()->user()->id)->paginate(5);
        return view('frontend.pages.shop.order-history', compact('payments'));
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
        $request->validate([
            'carts' => 'required|array',
            ]);
        $payment = new Payment();
        $payment->user_id = auth()->user()->id;
        $payment->address_id = auth()->user()->address->id;
        $payment->payment_method_id = auth()->user()->paymentMethod->id;
        if($request->note) {
            $payment->note = $request->note;
        }
        $payment->carts = json_encode($request->carts);
        $payment->status = 'pending';
        $payment->save();
        foreach($request->carts as $cart)
        {
            $cart = ProductCart::find($cart);
            $product = Product::find($cart->product_id);

            $cart->update(['payment_id' => $payment->id]);
            if($product->stock-$cart->quantity < 0)
            {
                return redirect()->back()->withErrors('Yetersiz miktar.');
            }
            $product->update(['stock' => $product->stock - $cart->quantity]);
        }

        return redirect()->route('product-cart')->with('success', 'Siparişiniz kaydedildi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        return view('frontend.pages.shop.order-detail', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
