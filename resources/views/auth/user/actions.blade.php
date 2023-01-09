
@can('user-edit')
<x-utils.edit-button :href="route('admin.users.edit',  $user)" />
@endcan
@can('user-delete')
<x-utils.delete-button :href="route('admin.users.destroy', $user)" />
@endcan