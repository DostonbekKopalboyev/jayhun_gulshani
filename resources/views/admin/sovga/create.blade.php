



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--    Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--    Font Awersome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>PHP CRUD Aplication</title>
</head>
<body>



<div class="container">
    <div class="text-center mb-4 pt-4">
        <h3 class="mt-4">Yangi sovg`a qo`shish</h3>
        <p class="text-muted">Bu yerda siz mijozlar uchun yangi sovg`alar qo'shishingiz mumkin</p>
    </div>

    <div class="container d-flex justify-content-center">

        <form action="{{route('sovga.store')}}" method="POST" style="width: 30vw;" enctype="multipart/form-data">
            @csrf
            <div class="mb-3" >
                <div class="md-3">
                    <label class="form-label">Sovg`a nomi: </label>
                    <input type="text" required="required" class="form-control" name="name" placeholder="Sovg`a nomi">
                </div>
                <br>

                <div class="md-3">
                    <label class="form-label">Izoh: </label>
                    <textarea type="text" class="form-control my-6" required="required" name="description" placeholder="Sovg`aga izoh" style="height: 100px;"></textarea>
                </div>
                <br>
                <div class="md-3">
                    <label class="form-label">Sovg`ani narxi: </label>
                    <input type="number" class="form-control" required="required" name="narx" placeholder="Sovg`ani narxi">
                </div>
                <br>

                    <label for="title">Enter Category Name</label>
                    <select class="form-select form-select-sm"  name="category_id" required aria-label=".form-select-sm example" id="title">
                        @foreach($categories as $sovga)
                            <option value="{{$sovga->id}}"  class="form-control">{{$sovga->category_name}}</option>
                        @endforeach
                    </select>
                <br>

                <div class="mb-3">
                    <label class="form-label">Sovg`ani rasmi: </label>
                    <input type="file" required class="form-control" name="image"  placeholder="Sovg`ani rasmi">
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-success">Save</button>
                <a href="{{route('sovga')}}" class="btn btn-danger">Cancel</a>
            </div>
        </form>

    </div>
</div>

@if(Session::has('message'))
    <script>
        console.log({{session('message')}})
        swal('Message',"{{Session::get('message')}},'success,",{
            button:true,
            button:'OK',
        });
    </script>

@endif









<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>
