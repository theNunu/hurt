<?php

namespace App\Services;

use App\Repositories\NewsRepositories;

class NewsServices
{
    protected $newsRepository;
    /**
     * Create a new class instance.
     */
    public function __construct(NewsRepositories $newsRepositories)
    {
        $this->newsRepository = $newsRepositories;
    }

      public function getAll()
    {
        return $this->newsRepository->all();
    }

    public function getById(string $id)
    {
        return $this->newsRepository->find($id);
    }

    public function create(array $data)
    {
        return $this->newsRepository->create($data);
    }

    public function update(string $id, array $data)
    {
        return $this->newsRepository->update($id, $data);
    }

    public function delete(string $id)
    {
        return $this->newsRepository->delete($id);
    }
}
