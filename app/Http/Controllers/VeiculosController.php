<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Veiculo;
use App\Marca;
use App\Cor;
use App\Acessorio;
class VeiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $veiculos = Veiculo::all();
        return view('veiculos',    ['veiculos'=>$veiculos]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Carrega Marcas
        $marcas = Marca::with( 'cores')->get();
        //Carrega cores iniciais na página
        $cores = $marcas[0]->cores;
        $acessorios =  Acessorio::where('cor_id', $marcas[0]->cores[0]->id)->where('marca_id', $marcas[0]->id)->get();

        return view('veiculo_create', ['marcas'=>$marcas, 'cores'=>$cores, 'acessorios'=>$acessorios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //Valida requisição e insere no banco
        request()->validate([
            'nome'=>'required',
            'marca'=>'required',
            'cor'=>'required',
            'valor'=>'required',
            'valortotal'=>'required',
            'status'=>'required',
        ]);
        Veiculo::create([

                'nome'=>request('nome'),
                'marca_id'=>request('marca'),
                'cor_id'=>request('cor'),
                'acessorio_id'=>request('acessorio'),
                'valor_base'=>request('valor'),
                'valor_total'=>request('valortotal'),
                'vendido'=>request('status')

        ]);

        return redirect('/');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Carrega veículos, marcas  e acessórios para os formulários
        $veiculo = Veiculo::find($id);
        $marcas = Marca::with( 'cores')->get();
        $acessorios =  Acessorio::where('cor_id', $veiculo->cor_id)->where('marca_id', $veiculo->marca_id)->get();


        return view('veiculo_edit', ['veiculo'=>$veiculo, 'marcas'=>$marcas, 'cores'=>$veiculo->marca->cores, 'acessorios'=>$acessorios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        // Valida requisição e faz update  no banco
        request()->validate([
            'nome'=>'required',
            'marca'=>'required',
            'cor'=>'required',
            'valor'=>'required',
            'valortotal'=>'required',
            'status'=>'required',
        ]);
        Veiculo::where('id', $id)

            ->update([

                'nome'=>request('nome'),
                'marca_id'=>request('marca'),
                'cor_id'=>request('cor'),
                'acessorio_id'=>request('acessorio'),
                'valor_base'=>request('valor'),
                'valor_total'=>request('valortotal'),
                'vendido'=>request('status')

            ]);

        return redirect('/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       $veiculo = Veiculo::find($id);
       $veiculo->delete();
       return redirect('/');


    }

    /**
     * Método que calcula o valor do carro
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */

    public function getModificadoresValor(){

        $cor_id = request('cor');
        $marca_id = request('marca');
        $acessorio_id = request('acessorio');
        $cor = Cor::find($cor_id);
        if($acessorio_id){
            $acessorio =  Acessorio::find($acessorio_id);
        }else{
            $acessorio = false;
        }


        $str_valor = "";
        $valorTotal = request('valorbase');

        if($cor->modificador && $cor->variacao){
            if($cor->modificador == 1){
                $valorTotal += $cor->variacao;
            }elseif ($cor->modificador == 2){
                $valorTotal -= $cor->variacao;
            }

            $sinal = ($cor->modificador == 1)?'+':'-';
            $str_valor .= "{$sinal} Variação de Cor";
        }

        if($acessorio){
            if($acessorio->modificador_id == 1){
                $valorTotal += $acessorio->valor;
            }elseif ($cor->modificador_id == 2){
                $valorTotal -= $acessorio->valor;
            }

            $sinal = ($acessorio->modificador_id == 1)?'+':'-';
            $str_valor .= "{$sinal} Acessório";
        }


        $resposta['str_valor'] = $str_valor;
        $resposta['modificador'] = $str_valor;
        return response([
            'str_valor'=>$str_valor,
            'valor_total'=>$valorTotal

        ]);
    }

    /**
     * Método que busca os acessórios disponíveis
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getAcessorios(){
        $cor_id = request('cor');
        $marca_id = request('marca');
        $acessorio =  Acessorio::where('cor_id', $cor_id)->where('marca_id', $marca_id)->get();

       return response($acessorio);

    }
}
