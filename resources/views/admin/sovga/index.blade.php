@extends('admin.app')
@section('content')

    <a href="{{route('sovga.create')}}" class="btn btn-success" style="width:120px; margin: 50px 0 0 50px;padding:15px 25px;">Qo`shish</a>

{{--    @if($errors->any())--}}
{{--        @foreach($errors->all() as $error)--}}
{{--            <h1>{{$error}}</h1>--}}
{{--        @endforeach--}}
{{--    @endif--}}

    <div class="container">
        <table class="table table-dark table-striped mt-5 ">
            <thead>
            <tr>
                <td>ID</td>
                <td>Photo</td>
                <td>Name</td>
                <td>Description</td>
                <td>Narx</td>
                <td>Category Name</td>
                <td>Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($sovgas as $sovga)
{{--                <tr @if($loop->odd) class="bg-info " @endif >--}}
                    <td>{{$sovga->id}}</td>
                    <td><img src="{{asset($sovga->image)}}" alt="" style="width: 100px;"></td>
                    <td>{{$sovga->name}}</td>
                    <td >{{$sovga->description}}</td>
                    <td>{{$sovga->narx}}</td>
                    <td>{{$sovga->category->category_name}}</td>

                    <td>
                        <form action="{{route('sovga.destroy',$sovga->id)}}" method="POST" id="sovga_delete_form{{$sovga->id}}">
                            @csrf
                            @method('DELETE')
                            <a href="{{route('admin.sovga.update',$sovga->id)}}"><i class="fa fa-edit bg-success p-2 ml-1"></i></a>
                        </form>
                        <button onclick="sovga_delete({{$sovga->id}})" type="submit" ><i class="fa fa-trash bg-danger p-2 ml-1" ></i></button>
                        {{--                        <a href="{{route('sovga.destroy',$sovga->id)}}" id="sovga_delete_form"><i class="fa fa-trash bg-danger p-2 ml-1" onclick="sovga_delete()" ></i></a>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

{{--    @if(Session::has('message'))--}}
{{--        <script>--}}
{{--            --}}
{{--            swal('Message',"{{Session::get('message')}},'success,",{--}}
{{--                button:true,--}}
{{--                button:'OK',--}}
{{--            });--}}
{{--        </script>--}}

{{--    @endif--}}


    <script>
        function sovga_delete(id){
            var delete_form=document.getElementById('sovga_delete_form'+id);

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

   {{--saved=document.getElementById('saved');--}}
   {{--     Swal.fire({--}}
   {{--         showConfirmButton: false,--}}
   {{--         timer: 2000,--}}

   {{--         title:'{{session('message')}}',--}}
   {{--         icon:'success',--}}
   {{--     }).then((result) => {--}}
   {{--         if (result.showConfirmButton) {--}}
   {{--             saved.submit();--}}
   {{--         }--}}
   {{--     });--}}
   {{--     </script>--}}

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
{{--</script>--}}
{{----}}
{{--    </script>--}}

    <script>
// form=document.getElementById('sovga_delete_form')
//         $(function (){
//             $(document).on('click',form,function(e){
//                 e.preventDefault();
//                 var link =$(this).attr('action');
//
//             window.addEventListener('show-delete-confirmation',event=>{
//                 Swal.fire({
//                     title: 'O`chirmoqchimisiz?',
//                     text: "o`chirmiqchimisiz",
//                     icon: 'warning',
//                     showCancelButton: true,
//                     confirmButtonColor: '#3085d6',
//                     cancelButtonColor: '#d33',
//                     confirmButtonText: 'O`chirish',
//                     cancelButtonText:'Bekor qilish'
//                 }).then((result) => {
//                     if (result.isConfirmed) {
//                         Livewire.emit('sovga_delete');
//                     }
//                 })
//
//             })
        // })
        </script>
{{----}}
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
