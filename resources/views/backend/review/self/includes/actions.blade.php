@if (Auth::user()->isAdministrator())
    <x-utils.edit-button :href="route('admin.review.self.edit', $model)" />
    <x-utils.delete-button :href="route('admin.review.self.destroy', $model)" />
@endif
