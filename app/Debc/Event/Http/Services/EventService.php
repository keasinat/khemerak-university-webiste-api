<?php

namespace App\Debc\Event\Http\Services;

use App\Services\BaseService;
use Exception;
use App\Exceptions\GeneralException;
use Illuminate\Support\Facades\DB;
use App\Debc\Event\Models\Event;

class EventService extends BaseService
{
    public function __construct(Event $event)
    {
        $this->model = $event;
    }

    public function store(array $data = []):Event
    {
        DB::beginTransaction();
        try {
            $event= $this->model::create($data);
        } catch (Exception $th) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem create this data. Please try again.'));
        }
        DB::commit();

        return $event;
    }

    public function update(Event $event, array $data = []):Event
    {
        DB::beginTransaction();
        try {
            $event->update($data);
        } catch (Exception $th) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this data. Please try again.'));
        }
        DB::commit();

        return $event;
    }
}