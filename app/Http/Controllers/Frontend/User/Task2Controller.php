<?php

namespace App\Http\Controllers\Frontend\User;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Class Task2Controller.
 */
class Task2Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('frontend.user.case.task2');
    }
}
