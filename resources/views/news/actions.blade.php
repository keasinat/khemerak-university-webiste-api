
@can('news-edit')
<x-utils.edit-button :href="route('admin.news.edit',  $news->id)" />
@endcan
@can('news-delete')
<x-utils.delete-button :href="route('admin.news.destroy', $news)"/>
@endcan