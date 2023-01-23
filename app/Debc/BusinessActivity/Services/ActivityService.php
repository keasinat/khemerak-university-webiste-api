<?php

namespace App\Debc\BusinessActivity\Services;

use App\Services\BaseService;
use App\Debc\BusinessActivity\Models\Category;

class ActivityService extends BaseService
{
    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function getList()
    {
        $categories = $this->model::whereNull('deleted_at');

        return $categories->get();
    }
}
