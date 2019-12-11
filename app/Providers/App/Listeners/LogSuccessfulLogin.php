<?php

namespace App\Providers\App\Listeners;

use App\Models\Session;
use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        Log::info('LogSuccessfulLogin@handle - New login', ['user_id' => $event->user->id]);

        $session = new Session();
        $session->user_id = $event->user->id;
        $session->user_agent = Request::header('User-Agent');
        $session->ip_address = Request::ip();
        $session->last_activity = Carbon::now();
        $session->save();
    }
}
