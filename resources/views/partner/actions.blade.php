
@can('partner-edit')
<x-utils.edit-button :href="route('admin.partner.edit',  $partner->id)" />
@endcan
@can('partner-delete')
<x-utils.delete-button :href="route('admin.partner.destroy', $partner)"/>
@endcan