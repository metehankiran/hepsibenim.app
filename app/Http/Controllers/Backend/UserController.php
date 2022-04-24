<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\PaymentMethod;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('backend.pages.user.index', compact('users'));
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
        return view('backend.pages.user.edit', compact('user'));
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
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if($user->is_admin)
        {
            if(!empty($request->password) && $request->password == $request->password_confirmation)
            {
                $user->password = bcrypt($request->password);
            }
            if ($request->hasFile('image')) {
                $user->image = $request->image->store('public/images/admin');
            }
        }
        else
        {
            $user->is_admin = $request->is_admin;
            $user->is_active = $request->is_active;
            $address = Address::where('user_id', $user->id)->first();
            $address->update($request->all());
            $paymentMethod = PaymentMethod::where('user_id', $user->id)->first();
            $paymentMethod->name = $request->card_name;
            $paymentMethod->card_number = $request->card_number;
            $paymentMethod->expiration_date = $request->expiration_date;
            $paymentMethod->cvv = $request->cvv;
            $paymentMethod->method = $request->method;
            $paymentMethod->save();
        }
        $user->save();

        return redirect()->route('backend.user.edit',$user)->with('success', 'Üye Güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back();
    }
}
