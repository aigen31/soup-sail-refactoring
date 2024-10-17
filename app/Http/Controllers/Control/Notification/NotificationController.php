<?php

namespace App\Http\Controllers\Control\Notification;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\Control\Project\ProjectCreateNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
  public static function store(Request $request, $project)
  {
    $userId = $request->input('user_id');

    Notification::send(User::find($userId), new ProjectCreateNotification($project));
  }
}
