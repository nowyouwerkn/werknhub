<?php

namespace Nowyouwerkn\WerknHub\Controllers;
use App\Http\Controllers\Controller;

use Auth;
use Storage;
use Session;
use Str;

use Nowyouwerkn\WerknHub\Models\Extension;
use Illuminate\Http\Request;

// Correr comandos de composer
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

/* Notificaciones */
use Nowyouwerkn\WerknHub\Services\NotificationService;

class ExtensionController extends Controller
{
    private $notification;

    public function __construct()
    {
        $this->notification = new NotificationService;
        $this->middleware('web');
        
    }

    public function index()
    {
        $extensions = Extension::all();

        return view('werknhub::back.extensions.index')->with('extensions', $extensions);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        //Validation
        $this -> validate($request, array(
            'name' => 'required|max:255',
        ));

        // Guardar datos en la base de datos
        $extension = new Extension;

        $extension->name = $request->name;
        $extension->composer_require = $request->composer_require;
        $extension->is_active = true;
        
        $command = shell_exec('(cd '. base_path() .' && ' . $request->composer_require . ')');

        $extension->save();

        // Notificación
        $type = 'Extension';
        $by = Auth::user();
        $data = 'agregó la extensión "' . $extension->name . '" a tu plataforma.';
        $model_action = "create";
        $model_id = $extension->id;

        $this->notification->send($type, $by ,$data, $model_action, $model_id);

        //Session message
        Session::flash('success', 'Guardado exitoso, la extensión quedó activa. En tu navegación verás implementada la extension.');

        return redirect()->back();
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
