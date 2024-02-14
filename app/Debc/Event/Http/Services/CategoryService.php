<?php

namespace App\Debc\Event\Http\Services;

use App\Services\BaseService;
use Exception;
use App\Exceptions\GeneralException;
use Illuminate\Support\Facades\DB;
use App\Debc\Event\Models\EventCategory;

class CategoryService extends BaseService
{
    public function __construct(EventCategory $ecategory)
    {
        $this->model = $ecategory;
    }

    public function update(EventCategory $ecategory, array $data = []):EventCategory
    {
        DB::beginTransaction();
        try {
            $ecategory->update($data);
        } catch (Exception $th) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this data. Please try again.'));
        }
        DB::commit();

        return $ecategory;
    }
}
