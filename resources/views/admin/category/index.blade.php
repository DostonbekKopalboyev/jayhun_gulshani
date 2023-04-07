@extends('admin.app')
@section('content')


<button id="showModal" style="margin: 30px;" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Category Qo'shish</button>

    <div class="container">
        @if($errors->any())
            @foreach($errors->all() as $error)
            <h1>{{$error}}</h1>
            @endforeach
            @endif
        <table class="table table-dark table-striped mt-5 ">
            <thead>
            <tr>
                <td>ID</td>
                <td>Category Name</td>
                <td>Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($category as $value)
                <td>{{$value->id}}</td>
                <td>{{$value->category_name}}</td>
                <td>
                    <form action="{{route('category.destroy',$value->id)}}" method="POST" id="sovga_delete_form">
                        @csrf
                        @method('DELETE')
                        <a onclick="update({{$value}})"><i class="fa fa-edit bg-success p-2 ml-1" id="showModal" data-toggle="modal" data-target="#exampleModal2" ></i></a>
                        <button type="submit" onclick="del()" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


{{--    category qoshish--}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('category.store')}}" method="POST" >
                    @csrf
                    <div class="modal-body">
                        <label for="category_name">Enter Category name</label>
                        <input type="text" id="category_name" name="category_name" class="form-control" >

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Yopish</button>
                            <button type="submit" class="btn btn-primary">Saqlash</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>



{{--    edit category--}}
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
{{--            @foreach($category as $value)--}}
            <form method="POST" id = "update_form">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <label for="category_name_update">Update Category name</label>
                    <input type="text"  id="category_name_update" name="category_name" class="form-control" required>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Yopish</button>
                        <button type="button" onclick="form_sub()" class="btn btn-primary">Tahrirlash</button>
                    </div>
                </div>
            </form>
{{--            @endforeach--}}
        </div>

    </div>
</div>
<script>
    let id;
    function update(category){
        document.getElementById('category_name_update').value = category.category_name
        id = category.id;
    }
    function form_sub(){
        let form = document.getElementById('update_form')
        form.action = "category/"+id
        form.submit()
    }


</script>
<script>
    @if(Session::has('message'))
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: 'success',
        text: '{{ session('message') }}',
    })

    @endif
</script>

@endsection()
