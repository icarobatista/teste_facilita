@extends('layout')

@section('conteudo')
    <form method="post" action="/veiculos/{{$veiculo->id}}/update">
        @csrf
        <div class="form-group">
            <label >Nome</label>
            <input type="text" value="{{$veiculo->nome}}" name="nome" class="form-control" required >

        </div>

        <div class="form-group">
            <label >Marca</label>
            <select name="marca" id="marcas" class="form-control" required>
                @foreach($marcas as $marca)
                    <option {{($veiculo->marca_id == $marca->id)?'selected':''}} value="{{$marca->id}}">{{$marca->nome}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label >Cor</label>
            <select name="cor" id="cores" class="form-control" required>
                @foreach($cores as $cor)
                    <option {{($veiculo->cor_id == $cor->id)?'selected':''}}  value="{{$cor->id}}">{{$cor->nome}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label >Acessório</label>
            <select name="acessorio" id="acessorios" class="form-control" required>
                <option {{($veiculo->acessorio_id == '0')?'selected':''}} value="0">Nenhum Acessório Selecionado</option>

                    @foreach($acessorios as $acessorio)
                        <option {{($veiculo->acessorio_id == $acessorio->id)?'selected':''}}  value="{{$acessorio->id}}">{{$acessorio->nome}}</option>
                    @endforeach



            </select>
        </div>



        <div class="form-group">
            <label  >Valor base</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">R$ </div>
                </div>
                <input type="number" value="{{$veiculo->valor_base}}" id="valorBase" class="form-control" name="valor" required>
                <div class="input-group-append">
                    <span class="input-group-text">,00</span>
                </div>

            </div>
        </div>

        <div class="form-group">
            <label >Status</label>
            <select name="status" class="form-control" >

                <option  {{($veiculo->vendido == 0)?'selected':''}} value="0">Disponível</option>
                <option  {{($veiculo->vendido == 1)?'selected':''}} value="1">Vendido</option>

            </select>
        </div>
        <label >Valor Total (Valor Base <span id="calculoTotal"></span>)</label>
        <div class="input-group mb-3">

            <div class="input-group-prepend">
                <span class="input-group-text">R$ </span>
            </div>
            <input type="text" class="form-control " name="valortotal" id="valorTotal" readonly required>
            <div class="input-group-append">
                <span class="input-group-text">,00</span>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
    <br>
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection

@section('javascript')

    <script type="text/javascript">
        //Função que atualiza o valor total
        function atualizaValor(){
            console.log('atualizaValor');
            var valorBase = $('#valorBase').val();

            var marca = $('#marcas').val();
            var acessorio = $('#acessorios').val();
            var cor = $('#cores').val();
            $.post('/api/veiculos/modificavalor',{'cor':cor, 'marca':marca, 'valorbase':valorBase, 'acessorio':acessorio}).done(function(data){


                $('#valorTotal').val(data.valor_total);
                $('#calculoTotal').text(data.str_valor);
            });


        }
        //Função que busca os acessórios disponíveis
        function getAcessorios(){
            var marca = $('#marcas').val();
            var cor = $('#cores').val();
            var html = '<option value="0">Nenhum Acessório Selecionado</option>';
            $.post('/api/veiculos/acessorios',{'cor':cor, 'marca':marca}).done(function(data) {
                for (var key in data) {
                    html += "<option value=" + data[key].id + ">" + data[key].nome + "</option>"
                }
                $('#acessorios').html(html);
            });
        }

        $(document).ready(function(e){
            //Atualiza o valor ao carregar a página
            atualizaValor();

            //Atualiza o valor de acordo com o valor base
            $('#valorBase').on('blur', function(){
                atualizaValor();
            });

            //Atualiza o valor e os acessórios disponíveis pela cor
            $('#cores').on('change', function(e){
                atualizaValor();
                getAcessorios();
            });
            //Atualiza o valor pelos acessórios
            $('#acessorios').on('change', function(e){
                atualizaValor();

            });
            // Muda select de cores conforme a marca
            $('#marcas').on('change', function(e){
                $('#cores').html('<option>Aguarde...</option>');
                var marca = $('#marcas').val();
                var html ='';

                var cor = $('#cores').val();
                $.get('/marcas/'+marca+'/cores').done(function(data){
                    console.log(data);
                    for(var key in data) {
                        html += "<option value=" + data[key].id  + ">" +data[key].nome + "</option>"
                    }
                    $('#cores').html(html);
                    getAcessorios();
                    atualizaValor();
                });

            });
        });

    </script>

@endsection