<?php

namespace App\Services;

use App\Repositories\NewsRepositories;
use Illuminate\Support\Facades\DB;

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
        // return $this->newsRepository->create($data);
                // Separar categorias del resto
        $categorias = $data['categorias'] ?? [];
        // unset($data['categorias']);

        // Usar transacción por seguridad
        return DB::transaction(function () use ($data, $categorias) {
            $news = $this->newsRepository->create($data);

            if (!empty($categorias)) {
                $this->newsRepository->syncCategories($news->new_id, $categorias);
                // recargar relaciones si quieres devolverlas
                $news->load('catalogDetails');
            }

            return $news;
        });
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
