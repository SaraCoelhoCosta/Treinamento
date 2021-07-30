@extends('layouts.app')
@section('htmlheader_title', 'Produto')
@section('contentheader_title', 'Produto')
@section('links_adicionais')
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection
@section('conteudo')

<!-- Content Header (Page header - Cabeçalho) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Gerenciar Produtos</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a> </li>
                    <li class="breadcrumb-item active">Produtos</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Fim do Cabeçalho -->

<!-- Tabela -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-danger card-outline">
                <div class="card-header">
                    <div class="float-right">
                        <a href="/produto/create" class="btn btn-block btn-outline-info"><i
                                class="fas fa-user-plus"></i> Adicionar Produto</a>
                    </div>
                </div> <!-- /.card-header -->

                <div class="card-body">
                    <table id="tableProduto" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Preço</th>
                                <th style="width:70px;">Quantidade</th>
                                <th style="width:70px;">Ação</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
</section>
<!-- Fim da Tabela -->

@endsection
@section('scripts_adicionais')
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Excluir e listar produtos-->
<script src="{{ asset('js/tabela_produto.js') }}"></script>
@endsection