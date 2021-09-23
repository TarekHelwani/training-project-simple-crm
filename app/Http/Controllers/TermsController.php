<?php

namespace App\Http\Controllers;

use App\Http\Requests\TermsAcceptRequest;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    public function index()
    {
        return view('terms');
    }

    public function store(TermsAcceptRequest $request)
    {
        auth()->user()->update(
            [
                'terms_accepted' => true
            ]
        );

        return redirect()->route('home');
    }
}
