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
                        <div style="float:left; md-2">
                            <h2>{{ __('edit new product') }}</h2>

                        </div>
                        <div style="float:right;">
                            <a class="btn btn-dark" href="{{ route('all.product') }}">{{ __('Go product') }}</a>

                        </div>

                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('msg'))
                            <p class="alert alert-success">{{ session('msg') }}</p>
                        @endif

                        <form action="{{ route('update.product',$product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">product name</label>
                                <input type="text" name="name" value="{{$product->name}}" class="form-control">

                            </div>
                            <div class="form-group mb-3">
                                <label for="">product image</label>
                                <img style="height:100px" src="{{ asset("/storage/{$product->image}") }}" alt="">
                                <input type="file" name="image" class="form-control">

                            </div>
                            <button type="submit" class="btn btn-dark">submit</button>
                        </form>

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
