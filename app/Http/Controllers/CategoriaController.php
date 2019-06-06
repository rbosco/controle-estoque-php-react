<?php

namespace Estoque\Http\Controllers;

use Illuminate\Http\Request;
use Estoque\Services\CategoriaService;

class CategoriaController extends Controller
{
    public $categoriaService;

    public function __construct(CategoriaService $categoriaService)
    {
        $this->categoriaService = $categoriaService;
    }

    public function index()
    {
        $categories = $this->categoriaService->listCategories();
        return view('estoque.categoria', ['listCategories' => $categories]);
    }

    public function manterCategoria(Request $request)
    {
        $input = $request->all()['data'];
        $product = $this->categoriaService->saveCategory($input);
        return $product;
    }

    public function editarCategoria(Request $request, $id)
    {
        $output = $this->categoriaService->editCategory($id);
        return $output;
    }

    public function removerCategoria(Request $request, $id)
    {
        $output = $this->categoriaService->deleteCategory($id);
        return $output;
    }
}
