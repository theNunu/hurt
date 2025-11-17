<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsRequest;
use App\Models\News;
use App\Services\NewsServices;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class NewsController extends Controller
{
    protected $newsServices;
    /**
     * Create a new class instance.
     */
    public function __construct(NewsServices $newsServices)
    {
        $this->newsServices = $newsServices;
    }

        public function index(): JsonResponse
    {
        return response()->json($this->newsServices->getAll());
    }

    public function show(string $new_id): JsonResponse
    {
        return response()->json($this->newsServices->getById($new_id));
    }

    public function store(StoreNewsRequest $request): JsonResponse
    {
        return response()->json(
            $this->newsServices->create($request->validated()),
            201
        );
    }

    public function update(StoreNewsRequest $request, string $new_id): JsonResponse
    {
        return response()->json(
            $this->newsServices->update($new_id, $request->validated())
        );
    }

    public function destroy(string $new_id): JsonResponse
    {
        $this->newsServices->delete($new_id);

        return response()->json(['message' => 'Deleted'], 200);
    }

    public function getTitles(){
        // dd('rw');
        $news = News::all();
        return $news;
        
    }
}
