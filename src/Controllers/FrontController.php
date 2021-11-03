<?php

namespace Nowyouwerkn\WerknHub\Controllers;
use App\Http\Controllers\Controller;

use Session;
use Auth;
use Carbon\Carbon;

/* E-commerce Models */
use Config;
use Mail;

use Nowyouwerkn\WerknHub\Models\SiteConfig;
use Nowyouwerkn\WerknHub\Models\SiteTheme;
use Nowyouwerkn\WerknHub\Models\LegalText;

use Nowyouwerkn\WerknHub\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/* Notificaciones */
use Nowyouwerkn\WerknHub\Controllers\NotificationController;

/* Facebook Events API Conversion */
use Nowyouwerkn\WerknHub\Services\FacebookEvents;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FrontController extends Controller
{
    private $notification;
    private $theme;
    private $store_config;

    public function __construct()
    {
        $this->notification = new NotificationController;
        $this->theme = new SiteTheme;
        $this->store_config = new SiteConfig;
    }
    
    public function index ()
    {
        return view('front.theme.' . $this->theme->get_name() . '.index');
    }
}
