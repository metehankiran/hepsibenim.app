<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCart;
use Illuminate\Http\Request;

class ProductCartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);
        
        $quantity = Product::where('id', $request->product_id)->value('stock');
        if ($quantity < $request->quantity) {
            return redirect()->back()->with('error', 'Yetersiz stok. Lütfen daha az miktar sepete ekleyin.');
        }
        if (ProductCart::where('product_id', $request->product_id)->where('payment_id', null)->exists()) {
            $productCart = ProductCart::where('product_id', $request->product_id)->first();
            $productCart->quantity += $request->quantity;
            $productCart->save();
        } else {
            ProductCart::create([
                'user_id' => auth()->id(),
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
        }
        return redirect()->back()->with('success', 'Ürün sepete eklendi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCart  $productCart
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCart $productCart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCart  $productCart
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCart $productCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCart  $productCart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCart $productCart)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);
        $productCart->quantity = $request->quantity;
        $productCart->save();
        return redirect()->back()->with('success', 'Ürün adeti güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCart  $productCart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        ProductCart::find($request->id)->delete();
        return response()->json('success', 200);
    }
}
