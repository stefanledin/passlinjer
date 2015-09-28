<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['login', 'authenticate']]);
    }
    
    /**
     * Visar inloggningsformuläret
     */
    public function login()
    {
        return view('login');
    }

    /**
     * Om det finns en användare med dessa uppgifter i databasen
     * så loggas HEN in och skickas vidare till dashboarden.
     * @param  Request $request
     */
    public function authenticate(Request $request)
    {
        $registeredUser = Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);
        if ($registeredUser) {
            return redirect('/admin');
        }
    }
    
    /**
     * Visa dashboard
     */
    public function dashboard()
    {
        return 'Hej ' . Auth::user()->name . '!';
    }
}
