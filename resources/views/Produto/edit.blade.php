@extends('layouts.app')

@section('htmlheader_title', 'Produto')
@section('contentheader_title', 'Produto')
@section('links_adicionais')
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection
@section('conteudo')


<!-- Content Header (Page header - Cabeçalho) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Alterar Produto</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active">Produto</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Fim do Cabeçalho -->


<section class="content">
    <div class="row">
        <div class="col-md-12">

            <!-- card (Quadro branco) -->
            <div class="card card-danger card-outline">
                <div class="card-header">
                    (<span style="color: red;">*</span>) Campos Obrigatórios
                    <div class="float-right">
                        <a href="{{ URL::to('produto') }}" class="btn btn-block btn-outline-info "><i
                                class="fa fa-list-alt"></i> Listar</a>
                    </div>
                </div> <!-- /.card-header -->

                <!-- Formulário -->
                <form method="POST" action="/produto/{{$produto->id}}" id="form">

                    <!-- card-body (Conteúdo do quadro) -->
                    <div class="card-body">
                        <!-- Mensagem de Sucesso/Erro -->
                        @if (Session::has('messagem'))
                        <div class="alert {{ Session::get('class') }} alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> Atenção!</h5>
                            {{ Session::get('messagem') }}
                        </div>
                        @endif

                        <!-- Dados do Produto-->
                        <h3>Dados do Produto</h3>
                        <hr>
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <div class="col-md-6">
                                <strong>Nome do Produto<span style="color: red;">*</span></strong>
                                <input type="text" autocomplete="off" name="nomeProduto"
                                    class="form-control @error('nomeProduto') is-invalid @enderror"
                                    value="{{ $produto->nome }}">
                                @error('nomeProduto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <strong>Preço<span style="color: red;">*</span></strong>
                                <input type="text" autocomplete="off" name="precoProduto"
                                    class="form-control @error('precoProduto') is-invalid @enderror"
                                    value="{{ $produto->preco }}">
                                @error('precoProduto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <strong>Quantidade<span style="color: red;">*</span></strong>
                                <input type="number" autocomplete="off" name="quantidade"
                                    class="form-control @error('quantidade') is-invalid @enderror" min=1
                                    value="{{ $produto->quantidade }}">
                                @error('quantidade')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <div class="col-md-12">
                                <strong>Descrição<span style="color: red;">*</span></strong>
                                <textarea name="descricao" rows="5"
                                    class="form-control @error('descricao') is-invalid @enderror" autocomplete="off"
                                    name="descricao" value="{{ $produto->descricao }}">{{ $produto->descricao }}
                                </textarea>
                                @error('descricao')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                    </div> <!-- /.card-body (Conteúdo do quadro) -->

                    <!-- Botões -->
                    <!-- card-footer (Conteúdo do rodapé do quadro) -->
                    <div class="card-footer">
                        <div class="row no-print">
                            <div class="col-12">
                                <a href="{{ URL::to('produto') }}" class="btn btn-danger float-right"><i
                                        class="far fa-times-circle"></i> Cancelar</a>
                                <button type="submit" form="form" class="btn btn-info float-right"
                                    style="margin-right: 8px;">
                                    <i class="fas fa-pen"></i> Editar
                                </button>
                            </div>
                        </div>
                    </div> <!-- /.card-footer (Conteúdo do rodapé do quadro) -->
                </form>
                <!-- Fim do Formulário -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- Fim do Formulário -->

@endsection
@section('scripts_adicionais')
@endsection