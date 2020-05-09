<!DOCTYPE html>
<html>
<head>
	<title>Template</title>
	<meta name= "viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel= "stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="{{asset('css/template.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('css/fontello.css')}}" type="text/css">
	
</head>
<body>
 <div class= "container-fluid">
     <div class= "row">

			<nav class= "navbar-expand-lg navbar navbar-dark bg-dark w-100">

			  <button class= "navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" arina-label="Toggle navigation">
			  <i class="icon-down-open"></i>
			  </button>

				<div class= "collapse navbar-collapse" id="navbarNav">

					<ul class= "navbar-nav">
					
					<li class= "nav-item">
					 <div class= "dropdown">

							<button class= "btn btn-secondary" type="button" data-toggle="dropdown">
								Aplicaçao
								<i class="icon-snowflake-o"></i>
							</button>
							
							<div class= "dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class= "dropdown-item" href="{{route('menu')}}"> 
								<i class="icon-home"></i>
								Menu								
								</a>
								<div class= "dropdown-divider"></div>
								<a class= "dropdown-item" href="{{route('logout')}}"> 
								<i class="icon-logout"></i>
								Logout								
								</a>								
							</div>

					 </div>
					</li>

					<li class= "nav-item">
					 <div class= "dropdown">

							<button class= "btn btn-secondary" type="button" data-toggle="dropdown">
								Cadastros
								<i class="icon-pencil"></i>
							</button>
							
							<div class= "dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class= "dropdown-item" href="{{route('usuario_cadastro')}}"> 
								<i class="icon-user-circle-o"></i>	
								Clientes														
								</a>
								<div class= "dropdown-divider"></div>
								<a class= "dropdown-item" href="{{route('produto_cadastro')}}"> 
								<i class="icon-tags"></i>
								Produtos								
								</a>
								<div class= "dropdown-divider"></div>
								<a class= "dropdown-item" href="{{route('categoria_cadastro')}}"> 
								<i class="icon-sitemap"></i>
								Categorias							
								</a>
								<div class= "dropdown-divider"></div>
								<a class= "dropdown-item" href="{{route('unidade_cadastro')}}"> 
								<i class="icon-balance-scale"></i>
								Unidades							
								</a>
								
							</div>

					 </div>
					</li>
					
					<li class="nav-item">
					 <div class="dropdown">

							<button class="btn btn-secondary" type="button" data-toggle="dropdown">
								Listas
								<i class="icon-table"></i>
							</button>

							<div class= "dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class= "dropdown-item" href="{{route('usuario_listar')}}"> 
								<i class="icon-user-circle-o"></i>	
								Clientes														
								</a>
								<div class= "dropdown-divider"></div>
								<a class= "dropdown-item" href="{{route('produto_listar')}}"> 
								<i class="icon-tags"></i>
								Produtos								
								</a>
								<div class= "dropdown-divider"></div>
								<a class= "dropdown-item" href="{{route('categoria_listar')}}"> 
								<i class="icon-sitemap"></i>
								Categorias							
								</a>
								<div class= "dropdown-divider"></div>
								<a class= "dropdown-item" href="{{route('unidade_listar')}}"> 
								<i class="icon-balance-scale"></i>
								Unidades							
								</a>
								
							</div>

					 </div>	
					</li>
					
					<li class ="nav-item">
					 <div class="dropdown">

							<button class="btn btn-secondary" type="button" data-toggle="dropdown">
								Vendas
								<i class="icon-basket"></i>
							</button>

							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class= "dropdown-item" href="{{route('vendas_total')}}">
								<i class="icon-th-list"></i>
								Listar Todas
								</a>
							<div class= "dropdown-divider"></div>	
								<a class="dropdown-item" href="{{route('venda_cadastro')}}">
								<i class="icon-cart-plus"></i>
								Vender
								</a>
														
					 </div>
					</li>
					
					<li class ="nav-item">
					 <div class="dropdown">

							<button class="btn btn-secondary" type="button" data-toggle="dropdown">
								Dashboard
								<i class="icon-database"></i>
							</button>

							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class= "dropdown-item view_data" href="{{route('dashboard')}}">
								<i class="icon-chart-line"></i>
								Indicadores
								</a>
							
							
					 </div>
					</li>

					
					</ul>
				</div>
			</nav>
     </div>
		
		<div class = "row">
			<div class = "col-md-2">
				<!-- coluna vazia esquerda -->
			</div>
			<div id="conteudo" class = "col-md-8 mt-2">
				@yield('conteudo')
			</div>
			<div class = "col-md-2">
				<!-- coluna vazia direita -->
			</div>
		</div>
 </div>



<script src = "https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src = "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src           = "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>