<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $payments = Payment::all();
        $products = Product::all();
        $users = User::all();
        $tickets = Ticket::all();
        $contactMessages = Contact::all();
        $brands = Brand::all();
        $categories = Category::all();
        return view('backend.pages.index', compact('payments', 'products', 'users', 'tickets', 'contactMessages', 'brands', 'categories'));
    }
}
