<?php

namespace App\Debc\Document\Services;

use App\Services\BaseService;
use Exception;
use App\Exceptions\GeneralException;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Debc\Document\Models\Document;
use App\Debc\Document\Models\Dcategory;

class CategoryService extends BaseService
{
    public function __construct(Dcategory $dcategory)
    {
        $this->model = $dcategory;
    }

    public function update(Dcategory $dcategory, array $data = []):Dcategory
    {
        DB::beginTransaction();
        try {
            $dcategory->update($data);
        } catch (Exception $th) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this data. Please try again.'));
        }
        DB::commit();

        return $dcategory;
    }
}