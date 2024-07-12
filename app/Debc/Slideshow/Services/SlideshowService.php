<?php

namespace App\Debc\Slideshow\Services;

use App\Services\BaseService;
use App\Debc\Slideshow\Models\Slideshow;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;

class SlideshowService extends BaseService
{
    public function __construct(Slideshow $slideshow)
    {
        $this->model = $slideshow;
    }

    public function getList()
    {
        return $this->model::get();
    }

    public function store(array $data = [])
    {
        DB::beginTransaction();

        try {
            $slideshow = $this->model::create($data);
        } catch (\Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating your data.'));
        }
        Db::commit();

        return $slideshow;
    }

    public function update(Slideshow $slideshow, array $data = [])
    {
        DB::beginTransaction();

        try {
            $slideshow->update($data);
        } catch (\Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating your data.'));
        }
        Db::commit();

        return $slideshow;
    }

}
