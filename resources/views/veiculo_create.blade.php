@extends('layout')

@section('conteudo')
    <form>
        <div class="form-group">
            <label >Nome</label>
            <input type="text" name="nome" class="form-control" >

        </div>

        <div class="form-group">
            <label >Marca</label>
            <select name="marca" class="form-control" >
                @foreach($marcas as $marca)
                <option value="{{$marca->id}}">{{$marca->nome}}</option>
               @endforeach
            </select>
        </div>

        <div class="form-group">
            <label >Cor</label>
            <select name="marca" class="form-control" >
                @foreach($cores as $cor)
                    <option value="{{$cor->id}}">{{$cor->nome}}</option>
                @endforeach
            </select>
        </div>



        <div class="form-group">
            <label  >Valor base</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">R$ </div>
                </div>
                <input type="numer" class="form-control" name="valor" >

        </div>
        </div>

        <div class="form-group">
            <label >Status</label>
            <select name="Status" class="form-control" >

                    <option value="0">Disponível</option>
                    <option value="1">Vendido</option>

            </select>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection

@section('javascript')

    <script type="text/javascript">
        $(document).ready(function(e){

        });
    </script>

@endsection