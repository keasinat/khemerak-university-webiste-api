
    @can('role-edit')
    <x-utils.edit-button :href="route('admin.roles.edit',  $role)" />
    @endcan
    @can('role-delete')
    @if($role->id !== App\Models\User::MASTER_ROLE )
    <x-utils.delete-button :href="route('admin.roles.destroy', $role)" />
@endif

    @endcan

   
