<?php

namespace App\Http\Controllers;
use App\Models\Sovga;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Nette\Utils\Image;
use Symfony\Component\HttpKernel\Profiler\Profile;

class SovgaController extends Controller
{

    public function index()
    {
        $sovgas=Sovga::all();
        return view('admin.sovga.index')->with('sovgas',$sovgas);
    }


    public function create():View
    {
        $sovgas=Sovga::all();
       return view('/admin/sovga/create',['sovgas'=>$sovgas]);
    }


    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'name'=>'required',
            'image'=>'required|file',
            'description' => 'required',
            'narx' => 'required'
        ]);
        $sovga = $request->all();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $profileImage ='/images/image_' . date('YmdHis') . $image->getClientOriginalName();
            $image->move('images/', $profileImage);
            $sovga['image'] = "$profileImage";
        }
        Sovga::create($sovga);
        return redirect('admin/sovga')->with('message','Muvafaqqiyatli saqlandi');

    }


    public function show($id)
    {
        //
    }

    public function edit(Sovga $sovga,$id)
    {
        return view('admin.sovga.update',compact('sovga'));
    }

    public function update(Request $request, Sovga $sovga):RedirectResponse
    {


        $request->validate([
            'name'=>'required',
            'description' => 'required',
            "narx" => 'required'
        ]);
        if ($request->hasFile('image')){
            unlink(public_path($sovga->image));
            $image = $request->file('image');
            $profilImage = date('YmdHis').'.'.$image->getClientOriginalName();
           $image->move(public_path('images/'), $profilImage);
           $sovga->image="/images/".$profilImage;
        }
        $sovga->update([
            $sovga->name = $request->name,
        $sovga->description = $request->description,
        $sovga->narx = $request->narx,
        $sovga->save(),
        ]);

        return redirect('admin/sovga');
    }

    public function destroy($id)
    {
        Sovga::destroy($id);
        return redirect()->back()->with('message','Muvafaqqiyatli o`chirildi');
    }

    public function sovga_update( $id):View
    {
        $sovga = Sovga::where('id',$id)->first();
        return view('admin.sovga.update',['sovga'=>$sovga]);
    }


}


