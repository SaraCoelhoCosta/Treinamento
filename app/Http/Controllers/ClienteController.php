<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestCliente;

use App\Cliente;
use Redirect;
use Session;
use DataTables;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente = Cliente::get();
        return view('Cliente.index', compact('cliente'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCliente $request)
    {

        try{
            $cliente = new Cliente();
            $cliente->nome = $request->nomeCompleto;
            $cliente->cpf = $request->cpf;
            $cliente->sexo = $request->sexo;
            $cliente->telefone = $request->telefone;
            $cliente->nascimento = $request->dataNascimento;
            $cliente->logradouro = $request->logradouro;
            $cliente->numero = $request->numero;
            $cliente->bairro = $request->bairro;
            $cliente->cep = $request->cep;
            $cliente->estado = $request->estado;
            $cliente->cidade = $request->cidade;
            $cliente->email = $request->email;

            $cliente->save();

                Session::flash('messagem','Parabéns! Cliente adicionado com sucesso.');
                Session::flash('class','alert-success');
                return back()->withInput();           

        } catch (\Exception  $errors) {
            Session::flash('messagem','ERRO! Ops, não foi possível adicionar cliente.');
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
        $cliente = Cliente::get();
        return Datatables::of($cliente)->editColumn('acao', function ($cliente) {
            return '
            <div class="row">
                <a href="/cliente/'.$cliente->id.'/edit" class="btn btn-info"><i
                    class="fas fa-user-edit" style="width:15px;"></i></a>
                <button class="btn btn-danger btnExcluir" data-id="'.$cliente->id.'" data-nome="'.$cliente->nome.'" type="button" 
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
        $cliente = Cliente::find($id);
        return view('Cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestCliente $request, $id)
    {
        try{    
            $cliente = Cliente::find($id);
            $cliente->nome = $request->nomeCompleto;
            $cliente->cpf = $request->cpf;
            $cliente->sexo = $request->sexo;
            $cliente->telefone = $request->telefone;
            $cliente->nascimento = $request->dataNascimento;
            $cliente->logradouro = $request->logradouro;
            $cliente->numero = $request->numero;
            $cliente->bairro = $request->bairro;
            $cliente->cep = $request->cep;
            $cliente->estado = $request->estado;
            $cliente->cidade = $request->cidade;
            $cliente->email = $request->email;

            $cliente->save();

                Session::flash('messagem','Parabéns! Cliente alterado com sucesso.');
                Session::flash('class','alert-success');
                return back()->withInput();           

        } catch (\Exception  $errors) {
            Session::flash('messagem','ERRO!!! Ops, não foi possível alterar cliente.');
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
            Cliente::destroy($id);
            return response()->json(array('status' => "OK"));       

        } catch (\Exception  $errors) {
            return response()->json(array('erro' => "$errors"));
        }
    }
}