@extends('layouts.app')
@section('htmlheader_title', 'Venda')
@section('contentheader_title', 'Venda')
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
                <h1>Adicionar Venda</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active">Venda</li>
                </ol>
            </div>
        </div>
    </div> <!-- /.container-fluid -->
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
                        <a href="{{ URL::to('venda') }}" class="btn btn-block btn-outline-info "><i
                                class="fa fa-list-alt"></i> Listar</a>
                    </div>
                </div> <!-- /.card-header -->

                <!-- Formulário -->
                <form method="POST" action="/venda" id="form">
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

                        <!-- Dados da Venda -->
                        <h3>Dados da Venda</h3>
                        <hr>
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <strong>Cliente<span style="color: red;">*</span></strong>
                                <select class="form-control @error('nomeCliente') is-invalid @enderror"
                                    name="nomeCliente">
                                    <option value="" {{ old('nomeCliente') == '' ? 'selected' : '' }}>
                                        Selecione...
                                    </option>
                                    @foreach ($cliente as $cliente)
                                    <option value="{{ $cliente->id }}"
                                        {{ old('nomeCliente') == $cliente->id ? 'selected' : '' }}>
                                        {{ $cliente->nome }}</option>
                                    @endforeach
                                </select>
                                @error('nomeCliente')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <strong>Produto<span style="color: red;">*</span></strong>
                                <select class="form-control @error('nomeProduto') is-invalid @enderror"
                                    name="nomeProduto">
                                    <option value="" {{ old('nomeProduto') == '' ? 'selected' : '' }}>
                                        Selecione...
                                    </option>
                                    @foreach ($produto as $produto)
                                    <option value="{{ $produto->nome }}"
                                        {{ old('nomeProduto') == $produto->nome ? 'selected' : '' }}>
                                        {{ $produto->nome }}</option>
                                    @endforeach
                                </select>
                                @error('nomeProduto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        @csrf
                        <div class="form-group row">
                            <div class="col-md-3">
                                <strong>Preço<span style="color: red;">*</span></strong>
                                <input type="text" class="form-control @error('precoVenda') is-invalid @enderror"
                                    value="{{ old('precoVenda') }}" name="precoVenda" "{{$produto->preco}}" >
                                @error('precoVenda')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <strong>Quantidade<span style="color: red;">*</span></strong>
                                <input type="text" class="form-control @error('quantidadeVenda') is-invalid @enderror"
                                    name="quantidadeVenda" value="{{ old('quantidadeVenda') }}">
                                @error('quantidadeVenda')
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
                                <a href="{{ URL::to('venda') }}" class="btn btn-danger float-right"><i
                                        class="far fa-times-circle"></i> Cancelar</a>
                                <button type="submit" form="form" class="btn btn-info float-right"
                                    style="margin-right: 8px;">
                                    <i class="fas fa-check-circle"></i> Confirmar compra
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
@endsection
@section('scripts_adicionais')
</script>
@endsection