<?php

namespace Modules\Item\Dao\Repositories;

use Plugin\Notes;
use Helper;
use Modules\Item\Dao\Models\Brand;
use App\Dao\Interfaces\MasterInterface;

class BrandRepository extends Brand implements MasterInterface
{
    public function dataRepository()
    {
        $list = Helper::dataColumn($this->datatable, $this->getKeyName());
        return $this->select($list);
    }

    public function saveRepository($request)
    {
        try {
            $activity = $this->create($request);
            return Notes::create($activity);
        } catch (\Illuminate\Database\QueryException $ex) {
            return Notes::error($ex->getMessage());
        }
    }

    public function updateRepository($id, $request)
    {
        try {
            $activity = $this->findOrFail($id)->update($request);
            return Notes::update($activity);
        } catch (QueryExceptionAlias $ex) {
            return Notes::error($ex->getMessage());
        }
    }

    public function deleteRepository($data)
    {
        try {
            $activity = $this->Destroy(array_values($data));
            return Notes::delete($activity);
        } catch (\Illuminate\Database\QueryException $ex) {
            return Notes::error($ex->getMessage());
        }
    }

    public function slugRepository($slug, $relation = false)
    {
        if ($relation) {
            return $this->with($relation)->where('item_brand_slug', $slug)->firstOrFail();
        }
        return $this->where('item_brand_slug', $slug)->firstOrFail();
    }


    public function showRepository($id, $relation)
    {
        if ($relation) {
            return $this->with($relation)->findOrFail($id);
        }
        return $this->findOrFail($id);
    }
}
