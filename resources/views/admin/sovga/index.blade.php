@extends('admin.app')
@section('admin.sovga.index')



    <a href="{{url('/admin/sovga/create')}}" class="btn btn-success" style="width:120px; margin: 50px 0 0 50px;padding:15px 25px;">Qo`shish</a>

    <div class="container">
        <table class="table table-dark table-striped mt-5 ">
            <thead>
            <tr>
                <td>ID</td>
                <td>Photo</td>
                <td>Name</td>
                <td>Description</td>
                <td>Narx</td>
                <td>Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($sovgas as $value)
{{--                <tr @if($loop->odd) class="bg-info " @endif >--}}
                    <td>{{$value->id}}</td>
                    <td><img src="{{asset($value->image)}}" alt="" style="width: 100px;"></td>
                    <td>{{$value->name}}</td>
                    <td >{{$value->description}}</td>
                    <td>{{$value->narx}}</td>
                    <td><a href="{{route('admin.sovga.update',$value->id)}}"><i class="fa fa-edit bg-success p-2 ml-1"></i></a>

                        <form action="{{route('sovga.destroy',$value->id)}}" method="POST" id="sovga_delete_form">
                            @csrf
                            @method('DELETE')
                        </form>
                            <button type="submit"><i class="fa fa-trash bg-danger p-2 ml-1" onclick="sovga_delete()" ></i></button>
{{--                        <a href="{{route('sovga.destroy',$value->id)}}" id="sovga_delete_form"><i class="fa fa-trash bg-danger p-2 ml-1" onclick="sovga_delete()" ></i></a>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script>
        delete_form=document.getElementById('sovga_delete_form');
        function sovga_delete(){
                Swal.fire({
                title: 'O`chirmoqchimisiz?',
                text: "o`chirmiqchimisiz",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'O`chirish',
                cancelButtonText:'Bekor qilish'
                 }).then((result) => {
                if (result.isConfirmed) {
                    delete_form.submit();
                }
             })
        }
        </script>

{{--    @if (session('message'))--}}
{{--        $(document).ready(function() {--}}

{{--            Swal.fire({--}}
{{--                showConfirmButton: false,--}}
{{--                timer: 2000,--}}

{{--                title:'{{session('message')}}',--}}
{{--                icon:'success',--}}

{{--            });--}}
{{--        });--}}

{{--    @endif--}}

{{--    </script>--}}

{{--    <script>--}}
{{--form=document.getElementById('sovga_delete_form')--}}
{{--        $(function (){--}}
{{--            $(document).on('click',form,function (e){--}}
{{--                e.preventDefault();--}}
{{--                var link =$(this).attr('action');--}}


{{--                Swal.fire({--}}
{{--                    title: 'O`chirmoqchimisiz?',--}}
{{--                    text: "o`chirmiqchimisiz",--}}
{{--                    icon: 'warning',--}}
{{--                    showCancelButton: true,--}}
{{--                    confirmButtonColor: '#3085d6',--}}
{{--                    cancelButtonColor: '#d33',--}}
{{--                    confirmButtonText: 'O`chirish',--}}
{{--                    cancelButtonText:'Bekor qilish'--}}
{{--                }).then((result) => {--}}
{{--                    if (result.isConfirmed) {--}}
{{--                        // delete_form.submit();--}}
{{--                    }--}}
{{--                })--}}

{{--            })--}}
{{--        })--}}
{{--        </script>--}}
    
{{--    --}}{{--    saved=document.getElementById('saved');--}}
    {{--    function saved() {--}}
    {{--        const Toast = Swal.mixin({--}}
    {{--            toast: true,--}}
    {{--            position: 'center',--}}
    {{--            showConfirmButton: false,--}}
    {{--            timer: 2000,--}}
    {{--            timerProgressBar: true,--}}
    {{--            didOpen: (toast) => {--}}
    {{--                toast.addEventListener('mouseenter', Swal.stopTimer)--}}
    {{--                toast.addEventListener('mouseleave', Swal.resumeTimer)--}}
    {{--            }--}}
    {{--        }).then((result) => {--}}
    {{--            if (result.resumeTimer) {--}}
    {{--                saved.submit();--}}
    {{--            }--}}
    {{--        })--}}
    {{--        Toast.fire({--}}
    {{--            icon: 'success',--}}
    {{--            title: 'Signed in successfully'--}}
    {{--        })--}}
    {{--    }--}}
    {{--</script>--}}







@endsection
