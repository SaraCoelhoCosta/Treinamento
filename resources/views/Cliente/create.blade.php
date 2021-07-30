<!-- Tela de cadastro do cliente -->

@extends('layouts.app')
@section('htmlheader_title', 'Cliente')
@section('contentheader_title', 'Cliente')
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
                <h1>Adicionar Cliente</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active">Cliente</li>
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
                        <!-- Botão para listar clientes -->
                        <a href="{{ URL::to('cliente') }}" class="btn btn-block btn-outline-info "><i
                                class="fa fa-list-alt"></i> Listar</a>
                    </div>
                </div> <!-- /.card-header -->

                <!-- Formulário -->
                <form method="POST" action="/cliente" id="form">

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

                        <!-- Dados pessoais -->
                        <h3>Dados Pessoais</h3>
                        <hr>
                        @csrf
                        <!-- @csrf - Para salvar informações no banco de dados -->
                        <div class="form-group row">
                            <div class="col-md-6">
                                <strong>Nome Completo<span style="color: red;">*</span></strong>
                                <input type="text" autocomplete="off" name="nomeCompleto"
                                    class="form-control @error('nomeCompleto') is-invalid @enderror"
                                    value="{{ old('nomeCompleto') }}">
                                <!-- old é para manter as informações no campo caso ocorra um erro na hora de salvar -->

                                <!-- Mensagem para campo obrigatório vazio -->
                                @error('nomeCompleto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <strong>Data de Nascimento<span style="color: red;">*</span></strong>
                                <input type="date" autocomplete="off" name="dataNascimento"
                                    class="form-control @error('dataNascimento') is-invalid @enderror"
                                    value="{{ old('dataNascimento') }}" placeholder="dd/mm/aaaa">
                                <!-- old é para manter as informações no campo caso ocorra um erro na hora de salvar -->

                                <!-- Mensagem para campo obrigatório vazio -->
                                @error('dataNascimento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <strong>Sexo<span style="color: red;">*</span></strong>
                                <select class="form-control" name="sexo">
                                <option value="" {{ old('sexo') == '' ? 'selected' : '' }}>
                                        Selecione...
                                    </option>
                                    <option value="Feminino" {{ old('sexo') == "Feminino" ? 'selected' : '' }}>
                                        Feminino
                                    </option>
                                    <option value="Masculino" {{ old('sexo') == "Masculino" ? 'selected' : '' }}>
                                        Masculino
                                    </option>
                                    <!-- old é para manter as informações no campo caso ocorra um erro na hora de salvar -->
                                </select>

                                <!-- Mensagem para campo obrigatório vazio -->
                                @error('sexo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        @csrf
                        <!-- @csrf - Para salvar informações no banco de dados -->
                        <div class="form-group row">
                            <div class="col-md-3">
                                <strong>CPF<span style="color: red;">*</span></strong>
                                <input type="text" autocomplete="off" name="cpf"
                                    class="form-control @error('cpf') is-invalid @enderror" value="{{ old('cpf') }}"
                                    data-inputmask='"mask": "999.999.999-99"' data-mask>
                                <!-- old é para manter as informações no campo caso ocorra um erro na hora de salvar -->

                                <!-- Mensagem para campo obrigatório vazio -->
                                @error('cpf')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <strong>Telefone</strong>
                                <input type="text" class="form-control" name="telefone" value="{{ old('telefone') }}"
                                    data-inputmask='"mask": "(99) 99999-9999"' data-mask>
                                <!-- old é para manter as informações no campo caso ocorra um erro na hora de salvar -->
                            </div>

                            <div class="col-md-6">
                                <strong>E-mail<span style="color: red;">*</span></strong>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" placeholder="email@gmail.com">
                                <!-- old é para manter as informações no campo caso ocorra um erro na hora de salvar -->

                                <!-- Mensagem para campo obrigatório vazio -->
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <br>

                        <!-- Endereço -->
                        <h3>Endereço</h3>
                        <hr>
                        @csrf
                        <!-- @csrf - Para salvar informações no banco de dados -->
                        <div class="form-group row">
                            <div class="col-md-6">
                                <strong>Logradouro<span style="color: red;">*</span></strong>
                                <input type="text" class="form-control @error('logradouro') is-invalid @enderror"
                                    name="logradouro" value="{{ old('logradouro') }}">
                                <!-- old é para manter as informações no campo caso ocorra um erro na hora de salvar -->

                                <!-- Mensagem para campo obrigatório vazio -->
                                @error('logradouro')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-md-1">
                                <strong>Número<span style="color: red;">*</span></strong>
                                <input type="text" class="form-control @error('numero') is-invalid @enderror"
                                    name="numero" value="{{ old('numero') }}" placeholder="0">
                                <!-- old é para manter as informações no campo caso ocorra um erro na hora de salvar -->

                                <!-- Mensagem para campo obrigatório vazio -->
                                @error('numero')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-md-5">
                                <strong>Bairro<span style="color: red;">*</span></strong>
                                <input type="text" class="form-control @error('bairro') is-invalid @enderror"
                                    name="bairro" value="{{ old('bairro') }}">
                                <!-- old é para manter as informações no campo caso ocorra um erro na hora de salvar -->

                                <!-- Mensagem para campo obrigatório vazio -->
                                @error('bairro')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        @csrf
                        <!-- @csrf - Para salvar informações no banco de dados -->
                        <div class="form-group row">
                            <div class="col-md-2">
                                <strong>CEP<span style="color: red;">*</span></strong>
                                <input type="text" class="form-control @error('cep') is-invalid @enderror" name="cep"
                                    value="{{ old('cep') }}" data-inputmask='"mask": "99999-999"' data-mask>
                                <!-- old é para manter as informações no campo caso ocorra um erro na hora de salvar -->

                                <!-- Mensagem para campo obrigatório vazio -->
                                @error('cep')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-md-5">
                                <strong>Estado<span style="color: red;">*</span></strong>
                                <input type="text" class="form-control @error('estado') is-invalid @enderror"
                                    name="estado" value="{{ old('estado') }}">
                                <!-- old é para manter as informações no campo caso ocorra um erro na hora de salvar -->

                                <!-- Mensagem para campo obrigatório vazio -->
                                @error('estado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-md-5">
                                <strong>Cidade<span style="color: red;">*</span></strong>
                                <input type="text" class="form-control @error('cidade') is-invalid @enderror"
                                    name="cidade" value="{{ old('cidade') }}">
                                <!-- old é para manter as informações no campo caso ocorra um erro na hora de salvar -->

                                <!-- Mensagem para campo obrigatório vazio -->
                                @error('cidade')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                    </div> <!-- /.card-body (Conteúdo do quadro) -->

                    <!-- Botões -->
                    <!-- card-footer (Conteúdo do rodapé do quadro) -->
                    <div class="card-footer">
                        <div class="row no-print">
                            <div class="col-12">
                                <a href="{{ URL::to('cliente') }}" class="btn btn-danger float-right"><i
                                        class="far fa-times-circle"></i> Cancelar</a>
                                <button type="submit" form="form" class="btn btn-info float-right"
                                    style="margin-right: 8px;">
                                    <i class="fas fa-save"></i> Salvar
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
<!-- InputMask  (Máscara do campo)-->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="{{asset('plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<script>
$('[data-mask]').inputmask()
</script>
@endsection