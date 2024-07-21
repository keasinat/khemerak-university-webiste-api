<?php

namespace App\Debc\Menu\Services;

use App\Services\BaseService;
use Exception;
use App\Exceptions\GeneralException;
use Illuminate\Support\Facades\DB;
use App\Debc\Menu\Models\Subject;

class SubjectService extends BaseService
{
    public function __construct(Subject $subject)
    {
        $this->model = $subject;
    }

    public function store(array $data = []):Subject
    {

        DB::beginTransaction();
        try {
            $subject= $this->model::create($data);
        } catch (Exception $th) {
            throw new GeneralException(__('There was a problem create this data. Please try again.'));
        }
        DB::commit();

        return $subject;
    }

    public function update(Subject $subject, array $data = []):Subject
    {
        DB::beginTransaction();
        try {
            $subject->update($data);
        } catch (Exception $th) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this data. Please try again.'));
        }
        DB::commit();

        return $subject;
    }
}
