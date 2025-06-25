<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SoapLoginController extends Controller
{
    /**
     * Show the SOAP login form
     */
    public function showLoginForm()
    {
        return view('auth.soap_login');
    }

    /**
     * Handle SOAP-based login
     */
public function loginViaSoap(Request $request)
{
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    $username = $request->input('username');
    $password = $request->input('password');

    $wsdl = null;
    $options = [
        'location' => 'http://localhost:8888/soap-auth.php',
        'uri' => 'http://localhost/soap-auth.php',
    ];

    try {
        $client = new \SoapClient($wsdl, $options);

        $response = $client->__soapCall("Login", [
            [
                'username' => $username,
                'password' => $password,
            ]
        ]);

        if ($response['LoginResult'] === true) {
            // Optional session or redirect
            session(['logged_in' => true]);
            return redirect('/home')->with('success', 'Login successful!');
        } else {
            return back()->withErrors(['Invalid username or password.']);
        }

    } catch (\Exception $e) {
        return back()->withErrors(['SOAP Error: ' . $e->getMessage()]);
    }
}
}
