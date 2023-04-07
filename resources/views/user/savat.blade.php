<section class="h-100 h-custom" style="background-color: #eee;">
    <div class="container py-5 h-100">
{{--        <div class="row d-flex justify-content-center align-items-center h-100">--}}
{{--            <div class="col">--}}
{{--                <div class="card">--}}
                    <div class="card-body p-4">

                        <div class="row">
                            <table class="table table-striped" style="text-align: center">
                                <thead>
                                <tr>
                                    <th> </th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Product Name & Details</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @dd("salom")
                                    <th><input type="checkbox"></th>
                                    <th scope="row"><img src="{{session('session.image')}}" alt="" style="width: 100px;"></th>
                                    <th>{{session('session.name')}} <br> {{session('session.description')}}</th>
                                    <th>{{session('session.narx')}}</th>
                                    <td><input type="number" min="1" style="width: 50px;" value="1"></td>
                                    <td><button type="button" class="btn-close" aria-label="Close"></button></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
