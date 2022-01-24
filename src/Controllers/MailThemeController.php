<?php

namespace Nowyouwerkn\WerknHub\Controllers;
use App\Http\Controllers\Controller;

use Session;

use Nowyouwerkn\WerknHub\Models\MailTheme;

use Illuminate\Http\Request;

class MailThemeController extends Controller
{

    public function index()
    {
       
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }


    public function show($id)
    {
  
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $mail = MailTheme::find($id);
        $mail->hex = $request->hex;
        $mail->save();

        // Mensaje de session
        Session::flash('success', 'Configuración de plantilla de correo exitosa.');

        return redirect()->back();
    }

    public function destroy($id)
    {
        
    }
}
