<?php

namespace App\Repositories;

use App\Models\News;

class NewsRepositories
{
    public function all()
    {
        return News::all();
    }

    public function find(string $id)
    {
        return News::findOrFail($id);
    }

    public function create(array $data)
    {
        return News::create($data);
    }

    public function update(string $id, array $data)
    {
        $news = News::findOrFail($id);
        $news->update($data);
        return $news;
    }

    public function delete(string $id)
    {
        $news = News::findOrFail($id);
        return $news->delete();
    }

    public function syncCategories(string $newsId, array $catalogDetailIds): void
    {
        $news = News::findOrFail($newsId);

        // La relación catalogDetails() está definida en el modelo News
        $news->catalogDetails()->sync($catalogDetailIds);
    }
}
