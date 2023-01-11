<?php

namespace App\Debc\News\Services;

use App\Services\BaseService;
use Exception;
use App\Exceptions\GeneralException;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Debc\News\Models\News;

class NewsService extends BaseService
{
    public function __construct(News $news)
    {
        $this->model = $news;
    }

    public function getList()
    {
        return $this->model::whereNull('deleted_at')->orderBy('id', 'desc');
    }

    public function store(array $data = []):News
    {
        DB::beginTransaction();

        try {
            $news = $this->model::create($data);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating your data.'));
        }

        DB::commit();

        return $news;
    }

    public function update(News $news, array $data = []):News
    {
        DB::beginTransaction();

        try {
            $news->update($data);
        } catch (Exception $e) {
            DB::rollBack();
            throw new GeneralException(__('There was a problem updating your data.'));
        }

        DB::commit();

        return $news;
    }


}