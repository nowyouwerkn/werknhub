<?php

namespace Nowyouwerkn\WerknHub\Services;

/* Regular Laravel */
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Exception;
use Request;

use Nowyouwerkn\WerknHub\Models\Notification;

class NotificationService
{   
    public function send($type, $by, $data, $model_action, $model_id)
    {
        /* LOG */
        if ($by == NULL) {
            $log = new Notification([
                'type' => $type,
                'data' => $data,
                'model_action' => $model_action,
                'model_id' => $model_id,
                'is_hidden' => false
            ]);
        }else{
            $log = new Notification([
                'action_by' => $by->id,
                'type' => $type,
                'data' => $data,
                'model_action' => $model_action,
                'model_id' => $model_id,
                'is_hidden' => false
            ]);
        }
        
        $log->save();
    }
}