@if (Auth::user()->isAdministrator())
    <x-utils.edit-button :href="route('admin.case.edit', $model)" />
    <x-utils.delete-button :href="route('admin.case.destroy', $model)" />
@endif
