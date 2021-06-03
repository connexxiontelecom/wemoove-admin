<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationLog extends Model
{
    use HasFactory;



    /*
     * Use-case methods
     */
    public function registerNewActivity($user, $subject, $activity){
        $log = new ApplicationLog();
        $log->user_id = $user;
        $log->subject = $subject ?? '';
        $log->activity = $activity ?? '';
        $log->save();
    }
}
