<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function account()
    {
    	return view('account.index',[
    		'plans' => [
    			['id'=>'free','name'="Free"],
    			['id'=>'seller','name'="Seller"],
    		],
    		'user' => auth()->user()
    	]);
    }

    public function change()
    {
    	return view('account.change');
    }
}
