<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unidade;
use Auth;

class UnidadeController extends Controller
{
    
    function telaCadastro(){
        if (Auth::check()){
            return view('telas_cadastro.cadastro_unidades');
        }
        return view('auth.login');
    }

    function telaAlteracao($id){
        if (Auth::check()){
            $unidade = Unidade::find($id);
            return view("telas_updates.alterar_unidade", [ "und" => $unidade ]);
        }
        return view('auth.login');
    }

    function adicionar(Request $req){
        if (Auth::check()){

           $req->validate([
                'nome' => 'required|min:2',
            ]);

            $nome = $req->input('nome');
                    
            $unidade = new Unidade();
            $unidade->nome = $nome;     

            if ($unidade->save()){
                session([
                    'mensagem' =>"Unidade: $unidade->nome , foi adicionada com sucesso!"
                ]);
            } else {
                session([
                    'mensagem' =>"Unidade: $unidade->nome , nao foi adicionada!!!"
                ]);
            }
            return UnidadeController::telaCadastro();
        }
        return view('auth.login');
    }

    function alterar(Request $req, $id){
        if (Auth::check()){
            $unidade = Unidade::find($id);
            $nome = $req->input('nome');

            $unidade->nome = $nome;
            
            if ($unidade->save()){
                session([
                    'mensagem' =>"Unidade: $unidade->nome , foi alterada com sucesso!"
                ]);
            } else {
                session([
                    'mensagem' =>"Unidade: $unidade->nome , nao foi alterada!!!"
                ]);
            }

            return UnidadeController::listar();
        }
        return view('auth.login');
    }

    function listar(){
        if (Auth::check()){
            $unidade = Unidade::all();
            return view("listas.lista_unidades", [ "und" => $unidade ]);
            
		}else{
            return view('auth.login');
        }
    }

    function excluir($id){
        if (Auth::check()){

            $unidade = Unidade::find($id);            

                if ($unidade->delete()){
                    session([
                        'mensagem' =>"Unidade: $unidade->nome , foi excluída com sucesso!"
                    ]);
                    return UnidadeController::listar();
                } else {
                    session([
                        'mensagem' =>"Unidade: $unidade->nome , nao foi excluída!"
                    ]);
                    return UnidadeController::listar();
                }            
        }else{
            return view('auth.login');
        }
    }
}
