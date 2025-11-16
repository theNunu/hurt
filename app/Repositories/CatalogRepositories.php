<?php

namespace App\Repositories;

use App\Models\Catalog;

class CatalogRepositories
{
  public function all()
    {
        // return Catalog::with('details')->get();
        return Catalog::get(); 
    }

    public function find(int $id)
    {
        return Catalog::with('details')->findOrFail($id);
        // return Catalog::findOrFail($id);
    }

    public function create(array $data)
    {
        return Catalog::create($data);
    }

    public function update(int $id, array $data)
    {
        $catalog = Catalog::findOrFail($id);
        $catalog->update($data);
        return $catalog;
    }

    public function delete(int $id)
    {
        $catalog = Catalog::findOrFail($id);
        return $catalog->delete();
    }
}
