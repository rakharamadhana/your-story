<?php

namespace App\Http\Controllers\Backend\Case;

use App\Domains\Auth\Http\Requests\Backend\User\EditUserRequest;
use App\Http\Requests\Backend\Case\EditCaseRequest;
use App\Models\Cases;
use Illuminate\Http\Request;

/**
 * Class CasesController.
 */
class CasesController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('backend.cases.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.cases.create');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        $input = $request->all();

        Cases::create($input);

        return redirect()->route('admin.cases')->withFlashSuccess(__('The case was successfully created.'));
    }

    /**
     * @param Cases $case
     * @return mixed
     */
    public function show(Cases $case)
    {
        return view('backend.cases.show')
            ->with('case',$case);
    }

    /**
     * @param EditCaseRequest $request
     * @param Cases $case
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(EditCaseRequest $request, Cases $case)
    {
        return view('backend.cases.edit')
            ->with('case',$case);
    }

    /**
     * @param Request $request
     * @param Cases $case
     * @return mixed
     */
    public function update(Request $request, Cases $case)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        $input = $request->all();

        $case->fill($input)->save();

        return redirect()->route('admin.cases', $case)->withFlashSuccess(__('The case was successfully updated.'));
    }

    /**
     * @param Request $request
     * @param Cases $case
     * @return mixed
     */
    public function destroy(Request $request, Cases $case)
    {
        $case->delete();

        return redirect()->route('admin.cases')->withFlashSuccess(__('The case was successfully deleted.'));
    }
}
