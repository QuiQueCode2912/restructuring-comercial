<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function setSession(Request $request)
    {   
       

        $key = $request->input('key');
        $value = $request->input('value');
        
        session([$key => $value]);

        return response()->json(['message' => $value]);
    }

    public function refreshSession()
    {
        session()->flush(); // Clear the session
        session()->migrate(); // Refresh the session
    }

    public function updateVariable(Request $request){
                // Your update logic here, update the variable as needed
        $newValue = $request->input('new_value');
        $grupos = $request->input('grupos');

        // Return the updated Blade view as HTML
        $view = view('components.request-step-2-p', compact('newValue','grupos'))->render();
        
        return response()->json(['view' => $view]);
    }

}
