<?php

namespace App\Services;

use App\Repositories\CatalogDetailRepositories;

class CatalogDetailServices
{
    protected $catalogsDetailRepositories;

    public function __construct(CatalogDetailRepositories $catalogDetailRepositories)
    {
        $this->catalogsDetailRepositories = $catalogDetailRepositories;
    }

    public function getAll()
    {
        return $this->catalogsDetailRepositories->all();
    }

    public function getById(int $id)
    {
        return $this->catalogsDetailRepositories->find($id);
    }

    public function create(array $data)
    {
        return $this->catalogsDetailRepositories->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->catalogsDetailRepositories->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->catalogsDetailRepositories->delete($id);
    }

    //RUTAS GET ============

       public function getNewsByCatalogDetail(int $id)
    {
        return $this->catalogsDetailRepositories->findWithNews($id);
    }

    public function listCatalogDetails()
    {
        return $this->catalogsDetailRepositories->getAllCatalogDetails();
    }

    public function listDetailsWithCatalog()
    {
        return $this->catalogsDetailRepositories->getCatalogsWithDetails();
    }
}
