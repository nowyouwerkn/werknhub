<?php

namespace Nowyouwerkn\WerknHub\Controllers;
use App\Http\Controllers\Controller;

use Session;
use Auth;
use Image;
use Str;

use Nowyouwerkn\WerknHub\Models\SEO;
use Nowyouwerkn\WerknHub\Models\SiteConfig;
use Illuminate\Http\Request;

class SiteConfigController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function apiToken(Request $request)
    {
        $config = SiteConfig::first();

        $config->facebook_pixel = $request->facebook_pixel;
        $config->facebook_access_token = $request->facebook_access_token;
        $config->save();

        //Session message
        Session::flash('success', 'Guardado exitoso del token. Se activaron los eventos del servidor.');

        return redirect()->back();
    }

    public function store(Request $request)
    {
        //Validation
        $this -> validate($request, array(
            'site_name' => 'required|max:255',
        ));

        $config = SiteConfig::create([
            'site_name' => $request->site_name,
            'contact_email' => $request->contact_email,
            'sender_email' => $request->sender_email,
            'site_industry' => $request->site_industry,
            'currency_id' => $request->currency_id
        ]);

        $seo = SEO::create([
            'page_title' => $request->site_name
        ]);

        //Session message
        Session::flash('success', 'Guardado exitoso, puedes continuar con el llenado de información o dejarlo para después.');

        return redirect()->route('config.step2', $config->id);
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

        $config = SiteConfig::find($id);

        $config->google_analytics = $request->google_analytics;
        $config->facebook_pixel = $request->facebook_pixel;
        $config->rfc_name = $request->rfc_name;
        $config->phone = $request->phone;
        $config->street = $request->street;
        $config->street_num = $request->street_num;
        $config->zip_code = $request->zip_code;
        $config->city = $request->city;
        $config->state = $request->state;
        $config->country_id = $request->country_id;
        $config->timezone = $request->timezone;
        $config->unit_system = $request->unit_system;
        $config->weight_system = $request->weight_system;
 
        $config->save();

        //Session message
        Session::flash('success', 'Excelente, tu página web está lista para usarse. Sigue las recomendaciones para completarla correctamente.');

        return redirect()->route('dashboard');
    }

    public function destroy($id)
    {
        //
    }
}
