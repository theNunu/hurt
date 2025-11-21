<?php

namespace App\Repositories;

use App\Models\CatalogDetails;

class CatalogDetailRepositories
{
  public function all()
    {
        // dd('here');
        return CatalogDetails::get();
    }

    public function find(int $id)
    {
    //     return CatalogDetails::with('catalog')->findOrFail($id);
        return CatalogDetails::findOrFail($id);
    }

    public function create(array $data)
    {
        return CatalogDetails::create($data);
    }

    public function update(int $id, array $data)
    {
        $detail = CatalogDetails::findOrFail($id);
        $detail->update($data);
        return $detail;
    }

    public function delete(int $id)
    {
        $detail = CatalogDetails::findOrFail($id);
        return $detail->delete();
    }

      public function findWithNews(int $catalogDetailId)
    {
        return CatalogDetails::with('news')->where('catalog_detail_id', $catalogDetailId)->first();
    }

    public function getAllCatalogDetails()
    {
        return CatalogDetails::withCount('news')->get();
    }

    public function getCatalogsWithDetails()
    {
        return CatalogDetails::with('catalog')->get();
    }
}
