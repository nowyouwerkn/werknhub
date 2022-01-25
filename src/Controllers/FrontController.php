<?php

namespace Nowyouwerkn\WerknHub\Controllers;
use App\Http\Controllers\Controller;

use Auth;
use View;
use Session;
use Carbon\Carbon;

use Config;
use Mail;

use Nowyouwerkn\WerknHub\Models\Banner;
use Nowyouwerkn\WerknHub\Models\SiteTheme;
use Nowyouwerkn\WerknHub\Models\LegalText;

use Nowyouwerkn\WerknHub\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/* Notificaciones */
use Nowyouwerkn\WerknHub\Services\NotificationService;

/* Facebook Events API Conversion */
use Nowyouwerkn\WerknHub\Services\FacebookEvents;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FrontController extends Controller
{
    private $notification;
    private $theme;

    public function __construct()
    {
        $this->middleware('web');

        $this->notification = new NotificationService;
        $this->theme = new SiteTheme;
    }
    
    public function index ()
    {   
        $banners = Banner::where('is_active', true)->get();

        return view('front.theme.' . $this->theme->get_name() . '.index')
        ->with('banners', $banners);
    }

    public function legalText($slug)
    {
        $text = LegalText::where('slug', $slug)->first();

        return view('front.theme.' . $this->theme->get_name() . '.legal')->with('text', $text);
    }

    /*
    * Información de Usuario
    * Estas son las vistas del perfil de cliente
    */
    public function profile ()
    {
        return view('front.theme.' . $this->theme->get_name() . '.auth.profile.main');
    }

    public function account ()
    {
        $user = Auth::user();
        return view('front.theme.' . $this->theme->get_name() . '.auth.profile.account')->with('user', $user);
    }

    public function updateAccount(Request $request, $id)
    {
        // Validar los datos
        $this -> validate($request, array(

        ));

        $user = User::find($id);

        $user->name = $request->input('name');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        // Mensaje de aviso server-side
        Session::flash('success', 'Tu cuenta se actualizó exitosamente.');

        return redirect()->route('profile');
    }
}
