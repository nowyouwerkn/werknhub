<?php

namespace Nowyouwerkn\WerknHub\Controllers;
use App\Http\Controllers\Controller;

use Session;
use Auth;
use Image;
use Str;

use Nowyouwerkn\WerknHub\Models\SiteTheme;
use Illuminate\Http\Request;

class SiteThemeController extends Controller
{
    public function index()
    {
        $themes = SiteTheme::all();

        return view('werknhub::back.site_themes.index', compact('themes'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //Validation
        $this -> validate($request, array(
            'name' => 'required|max:255',
        ));

        $deactivate = SiteTheme::where('is_active', true)->get();
        
        foreach ($deactivate as $dt) {
            $dt->is_active = false;
            $dt->save();
        }

        // Guardar datos en la base de datos
        $theme = new SiteTheme;

        $theme->name = $request->name;
        $theme->description = $request->description;
        $theme->version = $request->version;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = Str::slug( $request->name , '-') . '.' . $image->getClientOriginalExtension();
            $location = public_path('assets/img/themes/' . $filename);

            Image::make($image)->resize(400,null, function($constraint){ $constraint->aspectRatio(); })->save($location);

            $category->image = $filename;
        }

        $theme->is_active = true;

        $theme->save();

        // Notificación
        $type = 'SiteTheme';
        $by = Auth::user();
        $data = 'agregó un nuevo tema "' . $theme->name . '" a tu plataforma.';
        $model_action = "create";
        $model_id = $theme->id;

        $this->notification->send($type, $by ,$data, $model_action, $model_id);

        //Session message
        Session::flash('success', 'Guardado exitoso, la nueva apariencia quedó activa y las demás se desactivaron.');

        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //Validation
        $this -> validate($request, array(

        ));

        $config = SiteTheme::find($id);

        $config->google_analytics = $request->google_analytics;
        $config->facebook_pixel = $request->facebook_pixel;
        $config->rfc_name = $request->rfc_name;
        $config->phone = $request->phone;
 
        $config->save();


        //Session message
        Session::flash('success', 'Excelente, tu nueva apariencia de tienda esta activa.');

        return redirect()->route('dashboard');
    }

    public function destroy($id)
    {
        //
    }
}
