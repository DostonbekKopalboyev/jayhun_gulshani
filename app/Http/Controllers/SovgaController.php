<?php

namespace App\Http\Controllers;
use App\Http\Requests\SovgaRequest;
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
        $sovgas=Sovga::with('category')->get();
        return view('admin.sovga.index',['sovgas'=>$sovgas]);
    }

    public function create():View
    {
        $categories=Category::all();
        return view('admin.sovga.create',['categories'=>$categories]);
    }

    public function store(Request $request):RedirectResponse
    {
         $sovga=$request->all();

             if ($request->hasFile('image')) {
                 $image = $request->file('image');
                 $profileImage = '/images/image_' . date('YmdHis') . $image->getClientOriginalName();
                 $image->move('images/', $profileImage);
                 $sovga['image'] = $profileImage;
             }
//             dd($sovga);
//             $sovga->save();
             Sovga::create($sovga);

             return redirect()->route('sovga')->with('message', 'Muvafaqqiyatli saqlandi');
//         }
    }


    public function show($id)
    {
        //
    }

    public function edit(Sovga $sovga,$id)
    {
        $categories=Category::all();
        return view('admin.sovga.update',compact('sovga','categories'));
    }

    public function update(SovgaRequest $request, Sovga $sovga):RedirectResponse
    {
        $categories=Category::all();

        if ($request->hasFile('image')){
            unlink(public_path($sovga->image));
            $image = $request->file('image');
            $profilImage = date('YmdHis').'.'.$image->getClientOriginalName();
           $image->move(public_path('images/'), $profilImage);
           $sovga->image="/images/".$profilImage;
        }
        $sovga = Sovga::find($request->id);
        $sovga->name = $request->name;
        $sovga->description = $request->description;
        $sovga->narx = $request->narx;
        $sovga->image = $request->image;
        $sovga->category_name = $request->category_name;
        $sovga->save();
//        ]);

        return redirect()->route('sovga.index',['categories'=>$categories])->with('messege','Muvafaqqiyatli yangilandi');
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


