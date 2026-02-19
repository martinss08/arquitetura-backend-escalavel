<?php

namespace App\Services;

use App\DTO\CreateProductDTO;
use App\Models\Produto;

class ProdutoService
{
    protected Produto $model;

    public function __construct(Produto $model)
    {
        $this->model = $model;
    }

    public function getProduct(): array
    {
        $produtos = $this->model->all();

        if ($produtos->isEmpty()) {
            return [
                'status'   =>   false,
                'menssage' =>   'Nenhum produto encontrado',
                'data'     =>   [],
            ];
        }

        return [
            'status'   =>   true,
            'menssage' =>   'Lista de produto',
            'data'     =>   $produtos,
        ];
    }

    public function saveProduct(CreateProductDTO $data): array
    {
        $produto =  $this->model->create([
            'name' => $data->name,
            'quanty' => $data->quanty,
            'value' => $data->value,
        ]);

        return [
            'status' => true,
            'message' => "Produto cadastrado com sucesso.",
            'data'  =>  $produto
        ];
    }

    public function getAproduct(int $id)
    {
        $produto = $this->model->find($id);

        if (! $produto) {
            return [
                'status' => false,
                'message'   => 'Produto nao encontrado',
                'data'  => []
            ];
        }

        return [
            'status' => true,
            'message' => 'Produto em exibição',
            'data' =>   $produto
        ];
    }

    public function productUpdate(array $data, int $id_product)
    {
        $produto = $this->model->find($id_product);

        if (! $produto) {
            return [
                'status' =>  false,
                'message' =>    'Produto não encontrado',
                'data'  =>  []
            ];
        }

        $produto->update($data);

        return [
            'status' => true,
            'message' => 'Produto atualizado',
            'data' =>   $produto
        ];
    }

    public function deleteProduct(int $id_product)
    {
        $produto = $this->model->find($id_product);

        if (! $produto) {
            return [
                'status' =>  false,
                'message' =>    'Produto não encontrado',
                'data'  =>  []
            ];
        }

        $produto->delete();

        return [
            'status' => true,
            'message' => 'Produto deletado com sucesso.',
            'data' =>   $produto
        ];
    }
    
}