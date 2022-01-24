<?php

namespace Nowyouwerkn\WerknHub\Controllers;
use App\Http\Controllers\Controller;

use Carbon\Carbon;

use Session;
use Auth;
use Str;

use Nowyouwerkn\WerknHub\Models\SiteConfig;
use Nowyouwerkn\WerknHub\Models\User;
use Nowyouwerkn\WerknHub\Models\Extensions;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index () 
    {  
        $config = SiteConfig::take(1)->first();
        
        if(empty($config)){
            return redirect()->route('config.step1');
        }

        return view('werknhub::back.index');
    }

    public function configuration () 
    {
        return view('werknhub::back.configuration');
    }

    // Configuration Steps
    public function configStep1 () 
    {
        return view('werknhub::back.config_steps.step1');
    }

    public function configStep2 ($id) 
    {
        $config = SiteConfig::find($id);

        return view('werknhub::back.config_steps.step2')->with('config', $config);
    }

    public function changeColor()
    {
        $user_id = Auth::user()->id;

        $user = User::find($user_id);

        if ($user->color_mode == 0) {
            $user->color_mode = 1;
        }else{
            $user->color_mode = 0;
        }
        $user->save();

        // Mensaje de session
        Session::flash('success', 'Modo de color cambiado exitosamente.');

        return redirect()->back();
    }

    public function messages() 
    {
        return view('werknhub::back.messages');
    }

    public function generalSearch(Request $request)
    {   
        $search_query = $request->input('query');

        return view('werknhub::back.general_search')->with('search_query', $search_query);
    }
}
