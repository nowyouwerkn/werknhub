<?php

namespace Nowyouwerkn\Werknhub\Controllers;
use App\Http\Controllers\Controller;

/* E-commerce Models */
use Config;
use Mail;

use Carbon\Carbon;

use Auth;
use Storage;
use Session;

use Nowyouwerkn\Werknhub\Models\User;
use Nowyouwerkn\Werknhub\Models\SiteConfig;
use Nowyouwerkn\Werknhub\Models\SiteTheme;
use Nowyouwerkn\Werknhub\Models\Notification;

use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function index()
    {
        $mail = MailConfig::take(1)->first();

        return view('werknhub::back.notifications.index', compact('mail'));
    }

    public function all()
    {
        $notifications = Notification::paginate(50);

        return view('werknhub::back.notifications.all', compact('notifications'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('werknhub::back.notifications.show', compact('notification'));
    }

    public function edit($id)
    {
        return view('werknhub::back.notifications.show', compact('notification'));
    }

    public function update(Request $request, $id)
    {
        $notifications = Notification::findOrFail($id);

        $notification->read_at = Carbon::now();

        $notification->save();
        

        // Mensaje de session
        Session::flash('success', 'Notificación marcadas como leídas.');

        return redirect()->back();
    }

    public function destroy($id)
    {
        //
    }

    public function send($type, $by, $data)
    {
        /* LOG */
        if ($by == NULL) {
            $log = new Notification([
                'type' => $type,
                'data' => $data,
                'is_hidden' => false
            ]);
        }else{
            $log = new Notification([
                'action_by' => $by->id,
                'type' => $type,
                'data' => $data,
                'is_hidden' => false
            ]);
        }
        
        $log->save();
    }

    public function markAsRead()
    {
        $notifications = Notification::where('read_at', NULL)->orderBy('created_at', 'desc')->get();

        foreach($notifications as $notification){
            $notification->read_at = Carbon::now();

            $notification->save();
        }

        // Mensaje de session
        Session::flash('success', 'Notificaciones marcadas como leídas.');

        return redirect()->back();
    }
}
