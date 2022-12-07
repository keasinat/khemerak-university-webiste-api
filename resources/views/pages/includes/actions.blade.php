@can('page-edit')
<x-utils.edit-button :href="route('admin.page.edit',  $page)" />
@endcan
@can('page-delete')
<x-utils.delete-button :href="route('admin.page.destroy', $page->id)" />
@endcan

