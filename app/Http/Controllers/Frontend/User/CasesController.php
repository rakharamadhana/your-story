<?php

namespace App\Http\Controllers\Frontend\User;

use App\Models\Cases;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Class CasesController.
 */
class CasesController
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $cases = Cases::all();

        return view('frontend.user.cases')
            ->with('cases', $cases);
    }
}
