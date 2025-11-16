<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCatalogDetail;
use App\Services\CatalogDetailServices;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class CatalogDetailController extends Controller
{
    protected $catalogDetailsServices;

    public function __construct(CatalogDetailServices $catalogDetailServices)
    {
        $this->catalogDetailsServices = $catalogDetailServices;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->catalogDetailsServices->getAll());
    }

    public function show(int $id): JsonResponse
    {
        return response()->json($this->catalogDetailsServices->getById($id));
    }

    public function store(StoreCatalogDetail $request): JsonResponse
    {
        return response()->json(
            $this->catalogDetailsServices->create($request->validated()),
            201
        );
    }

    public function update(StoreCatalogDetail $request, int $id): JsonResponse
    {
        return response()->json(
            $this->catalogDetailsServices->update($id, $request->validated())
        );
    }

    public function destroy(int $id): JsonResponse
    {
        $this->catalogDetailsServices->delete($id);

        return response()->json(['message' => 'Deleted'], 200);
    }
}
