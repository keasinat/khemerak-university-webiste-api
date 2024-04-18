
@can('event-edit')
<x-utils.edit-button :href="route('admin.event.edit',  $event)" />
@endcan
@can('event-delete')
<x-utils.delete-button :href="route('admin.event.destroy', $event)" />
@endcan