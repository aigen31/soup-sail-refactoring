<?php

namespace App\Exceptions\Control\Exceptions;

use Exception;
use Illuminate\Support\Facades\Auth;

class ForbiddenException extends Exception
{
  public function __construct()
  {
    class_exists(Auth::class) ? $this->message = 'User "' . Auth::user()->name . '" doesn\'t have access' : 'User doesn\'t have access';
  }
}
