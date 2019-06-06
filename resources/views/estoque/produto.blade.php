@extends('layouts.app')
@section('content')
   <div class="content">
      <div class="flex form-product">
         <div class="box50">
            <form name="form-product">
               <input type="hidden" name="callback" value="manter-produto">
               <input type="hidden" name="id" value="">
               <label>
                  <span class="label">DESCRIÇÃO</span>
                  <input class="radius5" type="text" name="description" value="" placeholder="NOME DO PRODUTO">
               </label>
               <label>
                  <span class="label">CATEGORIAS</span>
                  <select name="category_id" class="radius5">
                     <option value="">SELECIONE</option>
                     @foreach ($listCategory as $item)
                  <option value="{{$item->id}}">{{$item->description}}</option>
                     @endforeach
                  </select>
               </label>
               <div class="flex actions">
                     <button type="submit" class="btn btn-info radius5"><i class="fas fa-save"></i>Salvar</button>
                     <button type="button" class="btn btn-danger radius5 btn_delete" data-id="" data-action="remover-produto"><i class="fas fa-trash-alt"></i>Excluir</button>
               </div>
            </form>
         </div>
         <div class="box50 form-search">
            <form name="form-search">
               <input type="text" class="radius5" name="search" placeholder="Pesquisa">
            </form>
         </div>
      </div>
      <div class="product-list">
         <table class="table" width="100%">
            <thead>
               <td>Nome</td>
               <td>Categoria</td>
               <td>Ações</td>
            </thead>
            <tbody>
               @foreach($listProduct as $item)
               <tr>
                  <td>{{$item->description}}</td>
                  <td>{{$item->category->description}}</td>
               <td><span class="btn-icon btn-warning radius50 btn_edit" data-id="{{$item->id}}" data-action="editar-produto"><i class="fas fa-pencil-alt"></i></span><span class="btn-icon btn-danger radius50 btn_delete" data-id="{{$item->id}}" data-action="remover-produto"><i class="fas fa-trash-alt"></i></span></td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
@endsection