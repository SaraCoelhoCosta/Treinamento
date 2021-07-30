<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestVenda;

use App\Produto;
use App\Cliente;
use App\Venda;
use Redirect;
use Session;
use DataTables;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $venda = Venda::get();
        return view('Venda.index', compact('venda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cliente = Cliente::select('id', 'nome')->get();
        $produto = Produto::select('id', 'nome')->get();
        return view('Venda.create',  compact('cliente', 'produto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestVenda $request)
    {
        try{
            $venda = new Venda();
            $venda->nome_cliente = $request->nomeCliente;
            $venda->nome_produto = $request->nomeProduto;
            $venda->quantidade = $request->quantidadeVenda;
            $venda->preco_unitario = $request->precoVenda;
            $venda->preco_total = ($request->quantidadeVenda)*($request->precoVenda);

            $venda->save();

                Session::flash('messagem','Parabéns! Venda realizada com sucesso.');
                Session::flash('class','alert-success');
                return back()->withInput();           

        } catch (\Exception  $errors) {
            Session::flash('messagem','ERRO! Ops, não foi possível realizar venda.');
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
        $venda = Venda::get();
        return Datatables::of($venda)->editColumn('acao', function ($venda) {
            return '
            <div class="row">
                <button class="btn btn-danger btnExcluir" data-id="'.$venda->id.'" data-nome="'.$venda->nome_produto.'" type="button" 
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestVenda $request, $id)
    {
        //
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