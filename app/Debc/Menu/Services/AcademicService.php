<?php

namespace App\Debc\Menu\Services;

use App\Debc\Menu\Models\Academic;
use App\Services\BaseService;
use Exception;
use App\Exceptions\GeneralException;
use Illuminate\Support\Facades\DB;

class AcademicService extends BaseService
{
    public function __construct(Academic $academic)
    {
        $this->model = $academic;
    }

    public function update(Academic $academic, array $data = []):Academic
    {
        DB::beginTransaction();
        try {
            $academic->update($data);
        } catch (Exception $th) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this data. Please try again.'));
        }
        DB::commit();

        return $academic;
    }
}
