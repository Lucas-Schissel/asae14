<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Cliente;
use App\Produto;
use App\Venda;


class AppController extends Controller

{
	function dashboard(){
		if (session()->has("login")){			
			$cli = Cliente::All();
			$clientes = count($cli);
			$pdr = Produto::All();
			$produtos = count($pdr);
			$vnd = Venda::All();
			$vendas = count($vnd);
			$dinheiros = collect($vnd)->sum('valor');
			return view("modal.dashboard")->with(compact('clientes','produtos','vendas','dinheiros'));
		}
		return view('tela_login');
	}

	function menu(){
		if (session()->has("login")){			
		return view("resultado", ["mensagem" => "Bem Vindo"]);
		}
		return view('tela_login');
	}

    function tela_login(){
		if (session()->has("login")){
			return redirect()->route('menu');
		}
			return view('tela_login');

    }

    function login(Request $req){
    	$login = $req->input('login');
		$senha = $req->input('senha');
		

		$cli = Cliente::where('login','=', $login)->first();
		
    	if ($cli and $cli->senha == $senha){

			$variaveis = ["login" => $login,"nome" => $cli->nome];
			session($variaveis);

    		return redirect()->route('menu');
    	} else {
			echo  "<script>alert('Usuário ou senha inválidos. Tente cadastrar um usuario');</script>";
            return view('tela_login');
    	}
	}

	function logout(){
		session()->forget('login');
		return redirect()->route('tela_login');
	}

}
