<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row mt-3">
            <div class="col-md-8 offset-md-2">
                <div class="card">

                    <div class="card-hader">
                        <div style="float: left;">
                            <h2>{{ __('laraveel 9 image crud') }}</h2>

                        </div>
                        <div style="float:right;">
                            <a class="btn btn-dark" href="{{ route('products.index') }}">{{ __('add new product') }}</a>

                        </div>

                    </div>
                    <div class="card-body">
                        @if (session('msg'))
                            <p class="alert alert-success">{{ session('msg') }}</p>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ __('ID') }}</th>
                                    <th>{{ __('Product Image') }}</th>
                                    <th>{{ __('Product Name') }}</th>
                                    <th>{{ __('Action') }}</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                    {{-- @dump(asset('/storage/')) --}}
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td><img style="height: 100px" src="{{ asset("/storage/{$product->image}") }}"
                                                alt=""></td>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            <a class="btn btn-success btn-sm"
                                                href="{{ route('edit.product', $product->id) }}">edit</a>
                                            <a class="btn btn-danger btn-sm"
                                                href="{{ route('delete.product', $product->id) }}">delet</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>

            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
