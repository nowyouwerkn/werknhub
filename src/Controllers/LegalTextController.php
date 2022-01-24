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
        $legals = LegalText::orderBy('priority','asc')->get();

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
        $legal = new LegalText;

        $legal->title = Purifier::clean($request->title);
        $legal->slug = Str::slug($request->title);
        $legal->description = Purifier::clean($request->description);
        $legal->priority = $request->priority;

        $legal->save();

        // Notificación
        $type = 'LegalText';
        $by = Auth::user();
        $data = 'creó la información de: "' . $legal->title . '" en la página web.';
        $model_action = "create";
        $model_id = $legal->id;

        $this->notification->send($type, $by ,$data, $model_action, $model_id);

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
            'title' => 'required'
        ));

        // Guardar datos en la base de datos
        $legal = LegalText::find($id);

        $legal->title = Purifier::clean($request->title);
        $legal->slug = Str::slug($request->title);
        $legal->description = Purifier::clean($request->description);
        $legal->priority = $request->priority;
        $legal->save();

        // Notificación
        $type = 'LegalText';
        $by = Auth::user();
        $data = 'editó la información de tu texto legal: "' . $legal->title . '" en la página web.';
        $model_action = "update";
        $model_id = $legal->id;

        $this->notification->send($type, $by ,$data, $model_action, $model_id);

        // Mensaje de session
        Session::flash('success', 'Tu información legal se actualizó correctamente en la base de datos.');

        // Enviar a vista
        return redirect()->back();
    }

    public function destroy($id)
    {
        $legal = LegalText::find($id);

        // Notificación
        $type = 'LegalText';
        $by = Auth::user();
        $data = 'eliminó la información de: "' . $legal->title . '" en la página web.';
        $model_action = "destroy";
        $model_id = $legal->id;

        $this->notification->send($type, $by ,$data, $model_action, $model_id);

        $legal->delete();

        Session::flash('success', 'El texto legal fue eliminado correctamente.');

        return redirect()->back();
    }
}
