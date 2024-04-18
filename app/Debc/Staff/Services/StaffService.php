<?php

namespace App\Debc\Staff\Services;

use App\Services\BaseService;
use App\Debc\Staff\Models\Staff;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Exceptions\GeneralException;

class StaffService extends BaseService {

    public function __construct(Staff $staff)
    {
        $this->model = $staff;
    }

    public function getList()
    {
        return $this->model::get();
    }

    public function store(array $data = []): Staff
    {
        DB::beginTransaction();

        try {
            $staff = $this->model::create($data);
        } catch (\Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating your data.'));
        }
        Db::commit();

        return $staff;
    }

    public function update(Staff $staff, array $data = []): Staff
    {
        DB::beginTransaction();

        try {
            $staff->update($data);
        } catch (\Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating your data.'));
        }
        Db::commit();

        return $staff;
    }

    public function delete($data)
    {
        $staff = $this->model::findOrfail($data);
        $staff->delete();

    }

}