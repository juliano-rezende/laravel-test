<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teste laravel junior</title>
    <link rel="stylesheet" href="{{ asset('css/datatable/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/responsivebootstrap4.min.css') }}">
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
                <li class="breadcrumb-item"><a href="#">Produtos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Listagem</li>
            </ol>
        </nav>
        @if(Session::has('success_msg'))
            <div class="alert alert-success">{{ Session::get('success_msg') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                 <a href="{{URL::to('')."/cadastro"}}" class="btn btn-warning float-right" > Adcionar Novo produto</a>
            </div>
            <div class="card-body">
                <table class="table" id="myTable">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Descrição</th>
                        <th scope="col"  class="text-center">Vlr Unitário</th>
                        <th scope="col"  class="text-center">Quantidade</th>
                        <th scope="col"  class="text-center">Vlr Estoque</th>
                        <th scope="col"  class="text-center">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <th scope="row">{{$product->id}}</th>
                            <td>{{$product->description}}</td>
                            <td class="text-center">{{  'R$ '.number_format($product->amount, 2, ',', '.') }}</td>
                            <td class="text-center">{{$product->quantity}}</td>
                            <td class="text-center">{{  'R$ '.number_format( ( $product->amount*$product->quantity ), 2, ',', '.') }}</td>
                            <td class="text-center">
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary" >Editar</a>
                                <a href="{{ route('product.delete', $product->id) }}" class="btn btn-danger" onclick="return confirm('Você deseja realmente remover este produto?')">Deletar</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a href="{{URL::to('')."/cadastro"}}" class="btn btn-warning float-right"> Adcionar Novo produto</a>
            </div>
        </div>
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
<script src="{{ asset('js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.responsive.min.js') }}"></script>
<script type="application/javascript">
    $(document).ready( function () {
        $('#myTable').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true,
            "language": {
                "search": "Pesquisar: _INPUT_",
                "lengthMenu": "",
                "zeroRecords": "Não encotramos registros",
                "info": "Páginas _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(filtrado do total de _MAX_ registros)",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Proximo"
                }
            }
        });
    });
</script>
</body>
</html>
