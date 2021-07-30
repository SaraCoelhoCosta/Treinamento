<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestProduto;

use App\Produto;
use Redirect;
use Session;
use DataTables;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produto = Produto::get();
        return view('Produto.index', compact('produto'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Produto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestProduto $request)
    {

        try{
            $produto = new Produto();
            $produto->nome = $request->nomeProduto;
            $produto->preco = $request->precoProduto;
            $produto->quantidade = $request->quantidade;
            $produto->descricao = $request->descricao;
            

            $produto->save();

                Session::flash('messagem','Parabéns! Produto adicionado com sucesso.');
                Session::flash('class','alert-success');
                return back()->withInput();           

        } catch (\Exception  $errors) {
            Session::flash('messagem','ERRO! Ops, não foi possível adicionar o produto.');
            Session::flash('class','alert-danger');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    
    public function list()
    {
        $produto = Produto::get();
        return Datatables::of($produto)->editColumn('acao', function ($produto) {
            return '
            <div class="row">
                <a href="/produto/'.$produto->id.'/edit" class="btn btn-info"><i
                    class="fas fa-user-edit" style="width:15px;"></i></a>
                <button class="btn btn-danger btnExcluir" data-id="'.$produto->id.'" data-nome="'.$produto->nome.'" type="button" 
                style="margin-left: 5px;"><i class="fas fa-trash" style="width:15px;"></i></button>
            </div>';
        })->escapeColumns([0])->make(true);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produto::find($id);
        return view('Produto.edit', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestProduto $request, $id)
    {
        try{    
            $produto = Produto::find($id);
            $produto->nome = $request->nomeProduto;
            $produto->preco = $request->precoProduto;
            $produto->quantidade = $request->quantidade;
            $produto->descricao = $request->descricao;

            $produto->save();

                Session::flash('messagem','Parabéns! Produto alterado com sucesso.');
                Session::flash('class','alert-success');
                return back()->withInput();           

        } catch (\Exception  $errors) {
            Session::flash('messagem','ERRO!!! Ops, não foi possível alterar produto.');
            Session::flash('class','alert-danger');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{    
            Produto::destroy($id);
            return response()->json(array('status' => "OK"));       

        } catch (\Exception  $errors) {
            return response()->json(array('erro' => "$errors"));
        }
    }
}