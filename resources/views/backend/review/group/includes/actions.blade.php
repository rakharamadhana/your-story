@if (Auth::user()->isAdministrator())
    <x-utils.edit-button :href="route('admin.review.group.edit', $model)" />
    <x-utils.delete-button :href="route('admin.review.group.destroy', $model)" />
@endif
