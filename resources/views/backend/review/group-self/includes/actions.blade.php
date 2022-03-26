@if (Auth::user()->isAdministrator())
    <x-utils.edit-button :href="route('admin.review.group-self.edit', $model)" />
    <x-utils.delete-button :href="route('admin.review.group-self.destroy', $model)" />
@endif
