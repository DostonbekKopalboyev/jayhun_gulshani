



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
        <p class="text-muted">Bu yerda siz mijozlar uchun yangi sovg`alar qos`shishingiz mumkin</p>
    </div>

    <div class="container d-flex justify-content-center">

        <form action="{{url('admin/sovga')}}" method="POST" style="width: 30vw;" enctype="multipart/form-data">
            @csrf
{{--            @method('PATCH')--}}
            <div class="mb-3" >
                <br>
                <div class="md-3">
                    <label class="form-label">Sovg`a nomi: </label>
                    <input type="text" class="form-control" name="name" placeholder="Sovg`a nomi">
                </div>
                <br>

                <div class="md-3">
                    <label class="form-label">Izoh: </label>
                    <textarea type="text" class="form-control my-6" name="description" placeholder="Sovg`aga izoh" style="height: 100px;"></textarea>
                </div>
                <br>
                <div class="md-3">
                    <label class="form-label">Sovg`ani narxi: </label>
                    <input type="number" class="form-control" name="narx" placeholder="Sovg`ani narxi">
                </div>
                <br>

                <div class="mb-3">
                    <label class="form-label">Sovg`ani rasmi: </label>
                    <input type="file" class="form-control" name="image"  placeholder="Sovg`ani rasmi">
                </div>
            </div>
            <br>
            <div>
                <button type="submit" class="btn btn-success" name="submit">Save</button>
                <a href="#" class="btn btn-danger">Cancel</a>
            </div>
        </form>

    </div>
</div>









<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>
