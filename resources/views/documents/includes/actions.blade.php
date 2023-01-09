
@can('document-edit')
<x-utils.edit-button :href="route('admin.document.edit',  $document)" />
@endcan
@can('document-delete')
<x-utils.delete-button :href="route('admin.document.destroy', $document)" />
@endcan