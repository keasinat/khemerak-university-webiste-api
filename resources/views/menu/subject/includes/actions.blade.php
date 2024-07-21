
@can('document-edit')
<x-utils.edit-button :href="route('admin.menu.subject.edit',  $subject)" />
@endcan
@can('document-delete')
<x-utils.delete-button :href="route('admin.menu.subject.destroy', $subject)" />
@endcan
