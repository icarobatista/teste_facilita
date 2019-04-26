@extends('layout')

@section('conteudo')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Veículos</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a class="btn btn-sm btn-outline-secondary" href="/veiculos/create">Adicionar</a>

            </div>

        </div>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Carro</th>
            <th scope="col">Marca</th>
            <th scope="col">Cor</th>
            <th scope="col">Valor</th>
            <th scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($veiculos as $veiculo)
            <tr>
                <th scope="row">{{$veiculo->id}}</th>
                <td>{{$veiculo->nome}}</td>
                <td>{{$veiculo->marca->nome}}</td>
                <td>{{$veiculo->cor->nome}}</td>
                <td>R$ {{number_format($veiculo->valor_total, 2, ',', '.')}}</td>
                <td>
                    <a href="veiculos/{{$veiculo->id}}/edit" class="btn btn-outline-primary">Editar</a>
                    <a href="veiculos/{{$veiculo->id}}/delete"  class="btn btn-outline-danger">Apagar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection