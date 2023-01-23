@props(['href' => '#', 'text' => __('dashboard.delete'), 'permission' => false])

<x-utils.form-button
    :action="$href"
    method="delete"
    name="delete-item"
    button-class="btn btn-danger btn-sm"
    permission="{{ $permission }}"
>
    <i class="fas fa-trash"></i> {{ $text }}
</x-utils.form-button>
