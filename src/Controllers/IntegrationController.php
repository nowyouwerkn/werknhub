<?php

namespace Nowyouwerkn\WerknHub\Controllers;
use App\Http\Controllers\Controller;

use Carbon\Carbon;

use Image;
use Session;
use Auth;
use Str;

use Nowyouwerkn\WerknHub\Models\Integration;
use Nowyouwerkn\WerknHub\Models\SiteConfig;

/* Notificaciones */
use Nowyouwerkn\WerknHub\Services\NotificationService;

use Illuminate\Http\Request;

class IntegrationController extends Controller
{
    private $notification;

    public function __construct()
    {
        $this->notification = new NotificationService;
    }
    
    public function index()
    {
        $integrations = Integration::all();
        $site_logo = SiteConfig::first();

        return view('werknhub::back.site_config.index', compact('integrations', 'site_logo'));
    }

    public function storeLogo(Request $request)
    {
        $config = SiteConfig::first();

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $filename = 'logo-store' . '.' . $image->getClientOriginalExtension();
            $location = public_path('assets/img/' . $filename);

            Image::make($image)->resize(400,null, function($constraint){ $constraint->aspectRatio(); })->save($location);

            $config->site_logo = $filename;
        }

        $config->save();

        //Session message
        Session::flash('success', 'Guardado exitoso, se guardó el logo correctamente en tu sitio web.');

        return redirect()->back();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $config = Integration::create([
            'name' => $request->name,
            'code' => $request->code,
            'is_active' => true
        ]);

        // Notificación
        $type = 'Integration';
        $by = Auth::user();
        $data = 'creó la integración "' . $config->name . '" en la página web.';
        $model_action = "create";
        $model_id = $config->id;

        $this->notification->send($type, $by ,$data, $model_action, $model_id);

        //Session message
        Session::flash('success', 'Guardado exitoso, se integró correctamente en tu sitio web.');

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
        //
    }

    public function destroy($id)
    {
        $config = Integration::find($id);

        // Notificación
        $type = 'Integration';
        $by = Auth::user();
        $data = 'eliminó la integración "' . $config->name . '" de la página web.';
        $model_action = "destroy";
        $model_id = $config->id;

        $this->notification->send($type, $by ,$data, $model_action, $model_id);

        //
        $config->delete();

        Session::flash('success', 'Se eliminó la integración correctamente.');

        return redirect()->back();
    }
}
