<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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
            $nome = $req->input('nome');
                    
            $unidade = new Unidade();
            $unidade->nome = $nome;     

            if ($unidade->save()){
                echo  "<script>alert('Unidade $nome adicionada com Sucesso!');</script>";
            } else {
                echo  "<script>alert('Unidade $nome nao foi adicionada!!!');</script>";
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
                echo  "<script>alert('Unidade $nome alterada com Sucesso!');</script>";
            } else {
                echo  "<script>alert('Unidade $nome nao foi alterada!!!');</script>";
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
