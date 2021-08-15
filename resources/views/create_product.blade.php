<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teste laravel junior</title>
    <link rel="stylesheet" href="{{ asset('css/datatable/bootstrap.css') }}">
</head>
<body>
<header>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-1 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal">Teste Laravel Junior Grid</h5>
    </div>
</header>
<main>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('')}}">Produtos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cadastro</li>
            </ol>
        </nav>
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach()
            </div>
        @endif
        @if(Session::has('success_msg'))
            <div class="alert alert-success">{{ Session::get('success_msg') }}</div>
        @endif
        <form action="{{route('new.product')}}" method="post">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Cadastro de produto</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Nome do produto</label>
                            <input type="text" class="form-control" id="description" name="description" required placeholder="Digite a descrição do produto">
                        </div>
                        <div class="form-group col-3">
                            <label>Quantidade</label>
                            <input type="text" class="form-control" id="quantity" name="quantity" required placeholder="Digite a quantidade">
                        </div>
                        <div class="form-group col-3">
                            <label>Valor (R$)</label>
                            <input type="text" class="form-control" id="amount" name="amount" required placeholder="Digite o valor do produto">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right btn-proccess"> Gravar Novo</button>
                </div>
            </div>
        </form>
        <hr>
        <form action="{{route('import.product')}}" method="post" id="import">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Importar lista de produtos (.csv)</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-6">
                            <input type="file" class="form-control" id="description" required placeholder="Digite a descrição do produto">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning float-right"> Importar</button>
                </div>
            </div>
        </form>
    </div>
</main>
<footer class="container pt-3">
    <div class="row">
        <div class="col col-8"><p>© 2011–2021 Teste Junior Laravel</p></div>
        <div class="col col-4"><p class="float-end float-right"><a href="#">Voltar ao topo</a></p></div>
    </div>
</footer>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
