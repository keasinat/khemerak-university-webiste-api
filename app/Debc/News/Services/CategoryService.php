<?php

namespace App\Debc\News\Services;

use App\Services\BaseService;
use Exception;
use App\Exceptions\GeneralException;
use Illuminate\Support\Facades\DB;
use App\Debc\News\Models\Ncategory;

class CategoryService extends BaseService
{
    public function __construct(Ncategory $ncategory)
    {
        $this->model = $ncategory;
    }

    public function update(Ncategory $ncategory, array $data = []):Ncategory
    {
        DB::beginTransaction();
        try {
            $ncategory->update($data);
        } catch (Exception $th) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this data. Please try again.'));
        }
        DB::commit();

        return $ncategory;
    }
}
