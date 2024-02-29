
@can('slideshow-edit')
<x-utils.edit-button :href="route('admin.slideshow.edit',  $slideshow->id)" />
@endcan
@can('slideshow-delete')
<x-utils.delete-button :href="route('admin.slideshow.destroy', $slideshow)"/>
@endcan