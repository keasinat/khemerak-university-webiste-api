
@can('user-edit')
<x-utils.edit-button :href="route('admin.users.edit',  $user)" />
@endcan
@can('user-delete')
@if($user->id !== auth()->id() && $user->id !== App\Models\User::MASTER_USER) 
    <x-utils.delete-button :href="route('admin.users.destroy', $user)" />
@endif

@endcan