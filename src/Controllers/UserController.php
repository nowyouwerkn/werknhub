<?php

namespace Nowyouwerkn\WerknHub\Controllers;
use App\Http\Controllers\Controller;

use Auth;
use Session;

use Carbon\Carbon;
use Nowyouwerkn\WerknHub\Models\User;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $webmaster = User::role('webmaster')->get();
        $admin  = User::role('admin')->get();
        $analyst  = User::role('analyst')->get();

        $users = $webmaster->merge($admin->merge($analyst));
        $roles = Role::where('name', '!=', 'customer')->get();

        return view('werknhub::back.users.index')->with('users', $users)->with('roles', $roles);
    }

    public function create()
    {
        return view('werknhub::back.users.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:4',
        ]);

        $admin = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        $rol = Role::findByName($request->rol);

        // Guardar primero el admin
        $admin->save();

        // Asignar el Rol
        $admin->assignRole($rol->name);

        // Notificación
        $type = 'User';
        $by = Auth::user();
        $data = 'agregó un nuevo usuario "' . $admin->name . '" a tu plataforma.';
        $model_action = "create";
        $model_id = $admin->id;

        $this->notification->send($type, $by ,$data, $model_action, $model_id);

        return redirect()->back();
    }

    public function show($id)
    {
        return view('werknhub::back.users.show', compact('id'));
    }

    public function edit($id)
    {
        return view('werknhub::back.users.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if($user->id == Auth::user()->id){
            Session::flash('error', 'No puedes borrar el usuario que está actualmente conectado.');
            
            return redirect()->back();
        }else{

            if ($user->hasRole('technician')) {
                if ($user->tickets_open->count() == 0) {
                    $user->delete();
                }else{
                    Session::flash('error', 'Este usuario técnico tiene tickets asignados, no es posible borrarlo hasta que complete sus tareas pendientes o se le asignen a alguien más.');

                    return redirect()->back();
                }
            }

            // Notificación
            $type = 'User';
            $by = Auth::user();
            $data = 'se elimino el usuario "' . $user->name . '" de tu plataforma.';
            $model_action = "destroy";
            $model_id = $user->id;

            $this->notification->send($type, $by ,$data, $model_action, $model_id);

            $user->delete();

            Session::flash('exito', 'El Usuario ha sido borrado exitosamente.');

            return redirect()->back();
        }        
    }

    public function config()
    {
        return view('werknhub::back.users.config');
    }
}
