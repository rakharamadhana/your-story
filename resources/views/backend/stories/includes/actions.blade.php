@if (Auth::user()->isAdministrator())
    <x-utils.edit-button :href="route('admin.story.edit', $model)" />
    <x-utils.delete-button :href="route('admin.story.destroy', $model)" />
@endif
