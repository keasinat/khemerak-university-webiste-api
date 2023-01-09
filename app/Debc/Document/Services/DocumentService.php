<?php

namespace App\Debc\Document\Services;

use App\Services\BaseService;
use Exception;
use App\Exceptions\GeneralException;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Debc\Document\Models\Document;
use App\Debc\Document\Models\Dcategory;

class DocumentService extends BaseService
{
    public function __construct(Document $document)
    {
        $this->model = $document;
    }

    public function store(array $data = []):Document
    {
        DB::beginTransaction();
        try {
            $document= $this->model::create($data);
        } catch (Exception $th) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem create this data. Please try again.'));
        }
        DB::commit();

        return $document;
    }

    public function update(Document $document, array $data = []):Document
    {
        DB::beginTransaction();
        try {
            $document->update($data);
        } catch (Exception $th) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this data. Please try again.'));
        }
        DB::commit();

        return $document;
    }
}