<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCatalog;
use App\Services\CatalogServices;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class CatalogController extends Controller
{
     protected $catalogService;

    public function __construct(CatalogServices $catalogService)
    {
        $this->catalogService = $catalogService;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->catalogService->getAll());
    }

    public function show(int $id): JsonResponse
    {
        return response()->json($this->catalogService->getById($id));
    }

    public function store(StoreCatalog $request): JsonResponse
    {
        return response()->json(
            $this->catalogService->create($request->validated()), 201
        );
    }

    public function update(StoreCatalog $request, int $id): JsonResponse
    {
        return response()->json(
            $this->catalogService->update($id, $request->validated())
        );
    }

    public function destroy(int $id): JsonResponse
    {
        $this->catalogService->delete($id);

        return response()->json(['message' => 'Deleted'], 200);
    }
}
