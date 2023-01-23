<?php

namespace App\Debc\Document\Services;

use App\Services\BaseService;
use Exception;
use App\Exceptions\GeneralException;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Debc\Document\Models\Video;

class VideoService extends BaseService
{
    public function __construct(Video $model)
    {
        $this->model = $model;
    }

    public function store(array $data = []):Video
    {
        DB::beginTransaction();
        try {
            $video = $this->model::create($data);

        } catch (\Exception $th) {
            //throw $th;
            DB::rollBack();

            throw new GeneralException(__('There was a problem create this data. Please try again.'));
        }
        DB::commit();

        return $video;
    }

    public function update($video, array $data = []):Video
    {
        DB::beginTransaction();
        try {
            $video->update($data);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw new GeneralException(__('There was a problem updating this data. Please try again.'));
        }

        DB::commit();

        return $video;
    }
}