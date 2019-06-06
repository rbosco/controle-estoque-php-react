<?php
namespace Estoque\Services;

use Estoque\Repositories\ProdutosRepository;
use Estoque\Entities\Produtos;

class ProdutoService
{
    protected $repository;

    public function __construct(ProdutosRepository $repository)
    {
        $this->repository = $repository;
    }

    public function listProducts()
    {
        $listProducts = Produtos::with('category')->get();
        return $listProducts;
    }

    public function saveProduct($request)
    {
        $this->repository->updateOrCreate(['id' => $request['id']], $request);
        return response()->json([
            'message' => 'Produto cadastrado com sucesso!',
            'type' => 'success',
            'reload' => true,
        ], 200);
    }

    public function editProduct($id)
    {
        $product = Produtos::with('category')->find($id);
        $productArray = array(
            'id' => $product->id,
            'description' => $product->description,
            'category_id' => $product->category_id,
        );

        return response()->json(['data' => $productArray]);
    }

    public function deleteProduct($id)
    {
        $this->repository->delete($id);
        return response()->json([
            'message' => 'Produto deletado com sucesso!',
            'type' => 'success',
            'reload' => true
        ], 200);
    }
}
