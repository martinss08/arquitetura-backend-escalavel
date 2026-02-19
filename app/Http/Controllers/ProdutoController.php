<?php

namespace App\Http\Controllers;

use App\DTO\CreateProductDTO;
use App\Http\Requests\ProdutoRequest;
use App\Models\Produto;
use App\Services\ProdutoService;
use Illuminate\Http\JsonResponse;

class ProdutoController extends Controller
{

    public function __construct(protected ProdutoService $produtoService)
    { }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $result = $this->produtoService->getProduct();

        if (! $result['status']) {
            return response()->json($result, 404);
        }

        return response()->json($result, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProdutoRequest $request)
    {
        $data = CreateProductDTO::fromArray($request->validated());

        $produto = $this->produtoService->saveProduct($data);

        return response()->json($produto, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id_produto): JsonResponse
    {
        $result = $this->produtoService->getAproduct($id_produto);

        if (! $result['status']) {
            return response()->json($result, 404);
        }

        return response()->json($result, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProdutoRequest $request, int $id_produto)
    {
        $data = $request->validated();

        $result = $this->produtoService->productUpdate($data, $id_produto);

        if (! $result['status']) {
            return response()->json($result, 404);
        }

        return response()->json($result, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id_produto)
    {
        $produto = $this->produtoService->deleteProduct($id_produto);

        if (! $produto['status']) {
            return response()->json($produto, 404);
        }

        return response()->json($produto, 200);
    }
}
