<?php

namespace App\Trait;

trait MenuScope
{
    public function scopeIsTop($query)
    {
        return $query->where('is_top', TRUE);
    }

    public function scopeIsPublished($query)
    {
        return $query->where('is_published', TRUE);
    }

    public function scopeParents($query)
    {
        return $query->whereNull('parent_id');
    }

    public function scopeChildren($query)
    {
        return $query->whereNotNull('parent_id');
    }
}
