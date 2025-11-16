<?php

namespace App\Services;

use App\Repositories\CatalogRepositories;

class CatalogServices
{
    /**
     * Create a new class instance.
     */
    protected $catalogRepository;

    public function __construct(CatalogRepositories $catalogRepository)
    {
        $this->catalogRepository = $catalogRepository;
    }

    public function getAll()
    {
        return $this->catalogRepository->all();
    }

    public function getById(int $id)
    {
        return $this->catalogRepository->find($id);
    }

    public function create(array $data)
    {
        return $this->catalogRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->catalogRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->catalogRepository->delete($id);
    }
}
