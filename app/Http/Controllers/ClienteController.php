<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Cliente;
use App\Venda;
use Auth;

class ClienteController extends Controller
{   

    function telaCadastro(){
        if (Auth::check()){
            return view("telas_cadastro.cadastro_clientes");
        }
        return view('auth.login');
    }

    function telaAlteracao($id){
        if (Auth::check()){
            $cliente = Cliente::find($id);
            return view("telas_updates.alterar_cliente", [ "cli" => $cliente ]);
        }
        return view('auth.login');
    }

    function adicionar(Request $req){
    	$nome = $req->input('nome');
    	$login = $req->input('login');
        $senha = $req->input('senha');
    
        $compara_login = DB::table('clientes')->where('login',$login)->value('login');

        if($compara_login){
            echo  "<script>alert('O login: $login ja esta em uso!');</script>";
            return view("telas_cadastro.cadastro_clientes");
        }else{

            $cli = new Cliente();
            $cli->nome = $nome;
            $cli->login = $login;
            $cli->senha = $senha;

            if ($cli->save()){
                echo  "<script>alert('Cliente $nome cadastrado com Sucesso!');</script>";
            } else {
                echo  "<script>alert('Cliente $nome nao foi cadastrado!');</script>";
            }
            return view("telas_cadastro.cadastro_clientes");
        }
    }

    function alterar(Request $req, $id){
        if (Auth::check()){
            $cli = Cliente::find($id);

            $nome_inicial = $cli->nome;
            $login_inicial = $cli->login;
            $senha_inicial = $cli->senha;

            $nome = $req->input('nome');
            $login = $req->input('login');
            $senha = $req->input('senha');

            $cli->nome = $nome;
            $cli->login = $login;
            $cli->senha = $senha;

            $compara_login = DB::table('clientes')->where('login',$login)->value('login');
            if(($compara_login == $login) && ($login != $login_inicial)){
                echo  "<script>alert('O login: $login ja esta em uso!');</script>";
                return view("telas_updates.alterar_cliente", [ "cli" => $cli ]);
            }else if ($nome_inicial != $nome || $login_inicial != $login || $senha_inicial != $senha){

                if ($cli->save()){
                    session([
                        'mensagem' =>"Cliente: $nome, foi adicionado com sucesso!"
                    ]);
                } else {
                    session([
                        'mensagem' =>"Cliente: $nome, nao foi adicionado !!!"
                    ]);
                }
                return  ClienteController::listar();
            }else{
                session([
                    'mensagem' =>"Ok, voce nao alterou nada, mas nao se preocupe seus dados foram preservados!!"
                ]);
                return  ClienteController::listar();
            }
        }
        return view('auth.login');
    }

    function excluir($id){
        if (Auth::check()){     
                
                    $cli = Cliente::find($id);
                    
                    if ($cli->delete()){
                        session([
                            'mensagem' =>"Cliente: $cli->nome ,foi excluído com sucesso!"
                        ]);
                        return ClienteController::listar();
                    } else {
                        session([
                            'mensagem' =>"Cliente: $cli->nome , nao foi excluído!"
                        ]);
                        return ClienteController::listar();
                        }
        }else{
            return view('auth.login');
        }
    
    }

    function listar(){
        if (Auth::check()){
            $cliente = Cliente::all();
            return view("listas.lista_clientes", [ "cli" => $cliente ]);
		}else{
            return view('auth.login');
        }
        
    }

}
