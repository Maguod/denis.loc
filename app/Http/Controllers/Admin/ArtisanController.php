<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Artisan;
use App\Http\Controllers\Controller;

class ArtisanController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin-panel');
    }

    public function workQueue()
    {
        Artisan::call('queue:work', ['--stop-when-empty' => true]);
        return redirect()->route('home');
    }
}
