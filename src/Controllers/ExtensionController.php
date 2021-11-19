<?php

namespace Nowyouwerkn\WerknHub\Controllers;
use App\Http\Controllers\Controller;

use Storage;
use Session;
use Str;

use Nowyouwerkn\WerknHub\Models\Extension;
use Illuminate\Http\Request;

// Correr comandos de composer
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class ExtensionController extends Controller
{

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

        // WeBlog Rutas
        Storage::disk('routes')->append('web.php', );

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
