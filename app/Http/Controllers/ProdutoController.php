<?php

namespace Estoque\Http\Controllers;

use Illuminate\Http\Request;
use Estoque\Services\CategoriaService;
use Estoque\Services\ProdutoService;

class ProdutoController extends Controller
{

    public $categoriaService;
    public $productService;

    public function __construct(CategoriaService $categoriaService, ProdutoService $productService)
    {
        $this->categoriaService = $categoriaService;
        $this->productService = $productService;
    }

    public function index()
    {
        $categories = $this->categoriaService->listCategories();
        $products = $this->productService->listProducts();

        return response()->json(['listProducts' => $products]);

        // return view('estoque.produto', ['listCategory' => $categories, 'listProduct' => $products]);
    }

    public function manterProduto(Request $request)
    {
        $input = $request->all()['data'];
        $product = $this->productService->saveProduct($input);
        return $product;
    }

    public function editarProduto(Request $request, $id)
    {
        $output = $this->productService->editProduct($id);
        return $output;
    }

    public function removerProduto(Request $request, $id)
    {
        $output = $this->productService->deleteProduct($id);
        return $output;
    }
}
