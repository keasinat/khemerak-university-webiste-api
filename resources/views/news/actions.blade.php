
@can('news-edit')
<x-utils.edit-button :href="route('admin.news.edit',  $article->id)" />
@endcan
@can('news-delete')
<x-utils.delete-button :href="route('admin.news.destroy', $article->id)"/>
@endcan