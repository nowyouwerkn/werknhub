<?php

namespace Nowyouwerkn\WerknHub\Controllers;
use App\Http\Controllers\Controller;

use Auth;
use Str;
use Session;
use Purifier;

use Nowyouwerkn\WerknHub\Models\LegalText;

use Illuminate\Http\Request;

class LegalTextController extends Controller
{

    public function index()
    {
        $legals = LegalText::all();

        return view('werknhub::back.legals.index')->with('legals', $legals);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        //Validar
        $this -> validate($request, array(
            'description' => 'required',
        ));

        // Guardar datos en la base de datos
        $legal = new Legal;

        $legal->type = $request->type;
        $legal->description = Purifier::clean($request->description);


        $legal->save();

        // Mensaje de session
        Session::flash('success', 'Tu información legal se guardó correctamente en la base de datos.');

        // Enviar a vista
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $legal = LegalText::find($id);

        return view('werknhub::back.legals.edit')->with('legal', $legal);
    }


    public function update(Request $request, $id)
    {
        //Validar
        $this -> validate($request, array(
            'description' => 'required',
        ));

        // Guardar datos en la base de datos
        $legal = LegalText::find($id);

        $legal->description = Purifier::clean($request->description);

        $legal->save();

        // Mensaje de session
        Session::flash('success', 'Tu información legal se guardó correctamente en la base de datos.');

        // Enviar a vista
        return redirect()->back();
    }

    public function destroy($id)
    {
        $legal = LegalText::find($id);

        $legal->delete();

        Session::flash('success', 'The legal was succesfully deleted.');

        return redirect()->back();
    }
}