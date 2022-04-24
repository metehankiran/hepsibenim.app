<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use App\Models\ProductCart;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
                view()->share('productCart', $productCart);
                view()->share('total', $total);
            }
            return $next($request);
        });
        $categories = Category::all();
        view()->share('categories', $categories);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $connect_web = simplexml_load_file('http://www.tcmb.gov.tr/kurlar/today.xml');    
        $currency['usd_buying'] = $connect_web->Currency[0]->BanknoteBuying;
        $currency['usd_selling'] = $connect_web->Currency[0]->BanknoteSelling;
        $currency['euro_buying'] = $connect_web->Currency[3]->BanknoteBuying;
        $currency['euro_selling'] = $connect_web->Currency[3]->BanknoteSelling; 

        $sliders = Slider::all();
        $brands = Brand::all();
        $setting = Setting::first();
        $lastProducts = Product::latest()->take(12)->get();
        return view('frontend.pages.index', compact('lastProducts', 'sliders', 'brands', 'setting', 'currency'));
    }

    public function products()
    {
        $products = Product::latest()->paginate(12);
        return view('frontend.pages.products', compact('products'));
    }

    public function product($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('frontend.pages.product', compact('product'));
    }

    public function productCart()
    {
        return view('frontend.pages.shop.product-cart');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('frontend.pages.user.profile', compact('user'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $products = $category->products;
        return view('frontend.pages.category', compact('category', 'products'));
    }
    
    public function contact()
    {
        $setting = Setting::first();
        return view('frontend.pages.contact', compact('setting'));  
    }

    public function contactStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);
        Contact::create($request->all());
        return redirect()->back()->with('success', 'Mesajınız gönderildi!');
    }

    public function about()
    {
        $setting = Setting::first();
        return view('frontend.pages.about', compact('setting'));
    }

    public function setup()
    {
        Artisan::call('migrate:fresh');
        Artisan::call('db:seed');
        Artisan::call('storage:link');
        return redirect()->route('home')->with('success', 'Veritabanı başarıyla güncellendi!');
    }
}
