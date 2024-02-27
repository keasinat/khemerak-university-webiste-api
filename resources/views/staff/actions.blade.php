
@can('staff-edit')
<x-utils.edit-button :href="route('admin.staff.edit',  $staff->id)" />
@endcan
@can('staff-delete')
<x-utils.delete-button :href="route('admin.staff.destroy', $staff)"/>
@endcan