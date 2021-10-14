<?php

namespace App\Http\Controllers\Frontend\User;

use App\Models\Cases;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Class Task2Controller.
 */
class Task2Controller
{
    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function index($id)
    {
        $case = Cases::find($id);

        return view('frontend.user.case.task2')->with('case',$case);
    }
}
