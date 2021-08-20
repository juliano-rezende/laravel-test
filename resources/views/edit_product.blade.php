<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teste laravel junior</title>
    <link rel="stylesheet" href={{ asset('css/bootstrap.min.css') }}>
</head>
<body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Teste Laravel Junior Editar</h5>
</div>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('')}}">Produtos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edição</li>
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
    <div class="col col-md-6 col-xl-12">
        <form action="{{route('update.product',$product->id)}}" method="post">
            @csrf
            <div class="card">
                <div class="card-header">
                    <a href="{{URL::to('')."/"}}" class="btn btn-warning float-left" > Voltar a tela inicial</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Nome do produto</label>
                            <input type="text" class="form-control" id="description" name="description" required value="{{$product->description}}" placeholder="Digite a descrição do produto">
                        </div>
                        <div class="form-group col-3">
                            <label>Quantidade</label>
                            <input type="text" class="form-control" id="quantity" name="quantity" required value="{{$product->quantity}}" placeholder="Digite a quantidade">
                        </div>
                        <div class="form-group col-3">
                            <label>Valor (R$)</label>
                            <input type="text" class="form-control" id="amount" name="amount" required value="{{ number_format($product->amount, 2, ',', '.') }}" placeholder="Digite o valor do produto">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right"> Atualizar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
