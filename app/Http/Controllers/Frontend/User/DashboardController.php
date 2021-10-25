<?php

namespace App\Http\Controllers\Frontend\User;

use App\Models\Cases;

/**
 * Class DashboardController.
 */
class DashboardController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $cases = Cases::all();

        return view('frontend.user.dashboard')
            ->with('cases', $cases);
    }
}
