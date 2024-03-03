<?php

namespace App\Debc\Partner\Services;

use App\Services\BaseService;
use App\Debc\Partner\Models\Partner;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Exceptions\GeneralException;

class PartnerService extends BaseService
{
    public function __construct(Partner $partner) {
        $this->model = $partner;
    }

    public function getList()
    {
        return $this->model::get();
    }

    public function store(array $data = []): Partner
    {
        DB::beginTransaction();

        try {
            $partner = $this->model::create($data);
        } catch (\Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating your data.'));
        }
        Db::commit();

        return $partner;
    }

    public function update(Partner $partner, array $data = []): Partner
    {
        DB::beginTransaction();

        try {
            $partner->update($data);
        } catch (\Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating your data.'));
        }
        Db::commit();

        return $partner;
    }

    public function delete($data)
    {
        $partner = $this->model::findOrfail($data);
        $partner->delete();

    }
}