<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Sovga;
use Illuminate\Console\View\Components\Alert;
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
        return view('admin.sovga.index',['sovgas'=>$sovgas]);
    }


    public function create():View
    {
        $sovgas=Sovga::all();
        $categories=Category::all();

        return view('admin.sovga.create',['sovgas'=>$sovgas,'categories'=>$categories]);
    }


    public function store(Request $request):RedirectResponse
    {
//dd($request);
        $request->validate([
            'name'=>'required',
            'image'=>'required|file',
            'description' => 'required',
            'narx' => 'required',
//            'category_name'=>'required'
        ]);
//dd($request);

         $sovga=$request->all();
//         if (!isset($sovga)) {


//         dd($sovga);
             if ($request->hasFile('image')) {
                 $image = $request->file('image');
                 $profileImage = '/images/image_' . date('YmdHis') . $image->getClientOriginalName();
                 $image->move('images/', $profileImage);
                 $sovga['image'] = $profileImage;
             }
             Sovga::create($sovga);

             return redirect()->back()->with('message', 'Muvafaqqiyatli saqlandi');
//         }
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
            "narx" => 'required',
            "image" => 'required|file',
            'category_name'=>'required'
        ]);
        if ($request->hasFile('image')){
            unlink(public_path($sovga->image));
            $image = $request->file('image');
            $profilImage = date('YmdHis').'.'.$image->getClientOriginalName();
           $image->move(public_path('images/'), $profilImage);
           $sovga->image="/images/".$profilImage;
        }
//        $sovga->update([
        $sovga = Sovga::find($request->id);
        $sovga->name = $request->name;
        $sovga->description = $request->description;
        $sovga->narx = $request->narx;
        $sovga->image = $request->image;
        $sovga->category_name = $request->category_name;
        $sovga->save();
//        ]);

        return redirect()->back()->with('messege','Muvafaqqiyatli yangilandi');
    }

    public function destroy($id)
    {
        Sovga::destroy($id);
        return redirect()->back()->with('message','Muvafaqqiyatli o`chirildi');
    }

    public function sovga_update( $id):View
    {
        $sovga = Sovga::where('id',$id)->first();
        return view('admin.sovga.update',['sovga'=>$sovga])->with('messege','Muvafaqqiyatli o\'chirildi');
    }


}


