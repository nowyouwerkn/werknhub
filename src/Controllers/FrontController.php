<?php

namespace Nowyouwerkn\WerknHub\Controllers;
use App\Http\Controllers\Controller;

use View;
use Session;
use Auth;
use Carbon\Carbon;

/* E-commerce Models */
use Config;
use Mail;

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
        $this->notification = new NotificationService;
        $this->theme = new SiteTheme;
    }
    
    public function index ()
    {
        return view('front.theme.' . $this->theme->get_name() . '.index');
    }

    public function legalText($slug)
    {
        $text = LegalText::where('slug', $slug)->first();

        return view('front.theme.' . $this->theme->get_name() . '.legal')->with('text', $text);
    }
}
