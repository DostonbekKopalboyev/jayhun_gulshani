<?php

namespace App\Http\Controllers;

use App\Models\Savat;
use App\Models\Sovga;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;


class SavatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

//    public function addToCard(Request $request){
//        $value = $request->session()->get();
//
//        $value = $request->session()->get('key', function () {
//            return 'default';
//        });
//    }

    public function trashs(Sovga $sovga,  Request $request){
//        Session::put('user_id',auth()->user()->id);
//        Session::put('id',$sovga->id);
//        Session::put('count',$request->count);
//        dd(Session::all());
//        return  view('user.index');

    }
    public function mavjud($id, $cart){

        foreach($cart as $value){
            if($value['id']===$id){
                return $value;
            }

        }
    }
    public function trash(Sovga $sovga,  Request $request){
//session()->flush();
        if (!$request->session()->has('sovga')) {
            $cart = array();
            array_push($cart, [
                'product' => $sovga->id,
                'quantity' => $request->count,
                'user_id'=>auth()->user()->id,
            ]);
            $request->session()->put('sovga', $cart);
            dd($request->session()->get('sovga'));
        } else {
            $cart = $request->session()->get('sovga');
          //  dd($cart);
            foreach($cart as $value){
                if($value['id']===$sovga->id){
                    $index =  $value;
                }
            }
            //dd($index);
            //$index = $this->mavjud($sovga->id, $cart);
            if ($index == -1) {
                array_push($cart, [
                    'product' => $sovga->id,
                    'quantity' => $request->count,
                    'user_id'=>auth()->user()->id,
                ]);
            } else {
                $cart[$index]['quantity']=$request->count;
            }
            $request->session()->put('sovga', $cart);
        }
        dd(session()->get('sovga'));
        return redirect('cart');


        //
//        $carts = session()->get('cart');
//        $savat = array(
//            'id'=>$sovga->id,
//            'count'=>$request->count,
//            'user_id'=>auth()->user()->id
//        );
//        if($carts===null){
//            dd("salom card");
//            session()->put('cart',$savat);
//        }
//        else{
//            session()->forget('cart');
//            foreach($carts as $cart){
//                if($cart['id']==$sovga->id && $cart['user_id']===$savat['user_id']){
//                    $cart['count'] = $savat['count'];
//                }
//                session()->put('cart',$cart);
//            }
//
//            session()->put('cart',$savat);
//        }
//        dd(session()->get('cart'));
//        $cartItems = session('cart');
//        $productInfoToCart = array(
//            "id" => $sovga->id,
//            "count" => request('count'),
//            "user_id" => auth()->user()->id,
//        );
//        if ($cartItems !== null){
//            if (isset($cartItems[request('id')]))
//            {
//                return redirect ()->route('user.savat'); //...
//            }
//            $cartItems[$sovga->id] = $productInfoToCart;
//            Session::put('cart', $cartItems);
//            Session::flash('status', 'Product added to cart');
//            return redirect()->back();
//        }
//        $cartItems[$sovga->id] = $productInfoToCart;
//        Session::put('cart', $cartItems);
//        Session::flash('status', 'First Product added to cart');
//        return redirect()->route('user.savat');
//

    }
    public function savat(){
            $savat = Session::get('cart');
            dd("salom");
    }


//    public function indexs($id)
//    {
////        $savat=Savat::all();
//        $sessiya = Sovga::find($id);
////        dd($sessiya);
//
//        // Check if card is found
//        if ($sessiya) {
//            // Write card data to session
//            session()->put('session', $sessiya);
//
//            // Optionally, you can also write specific card data to session
//            session()->put('session.id', $sessiya->id);
//            session()->put('session.name', $sessiya->name);
//            session()->put('session.description', $sessiya->description);
//            session()->put('session.image', $sessiya->image);
//            session()->put('session.narx', $sessiya->narx);
////            dd(session('session.narx'));
//
//            // Redirect or return response
////            return view(session::get('sessiya'));
//            return  view('user.savat',['sessiya'=>$sessiya]);
//        } else {
//            // Card not found, handle error
//            return redirect()->back()->with('error', 'Card not found.');
//        }
////        return view('user.savat',['savat'=>$savat]);
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Savat  $savat
     * @return \Illuminate\Http\Response
     */
        public function show(Request $request, string $id): View
    {
        $value = $request->session()->get('key');

        // ...

        $sessiya = $this->users->find($id);

        return view('users', ['sessiya' => $sessiya]);
    }
//        $savat = Savat::findOrFail($id);
//        return view('user.savat', ['savat' => $savat]);


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Savat  $savat
     * @return \Illuminate\Http\Response
     */
    public function edit(Savat $savat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Savat  $savat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Savat $savat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Savat  $savat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Savat $savat)
    {
        //
    }

//    public function addToCart($id)
//    {
//        // Retrieve the item from the database using the ID
//        $item = Sovga::find($id);
//
//        // Get the current cart items from the session
//        $cartItems = session()->get('user.savat', []);
//
//        // Check if the item is already in the cart
//        if (array_key_exists($item->id, $cartItems)) {
//            // Increment the quantity of the existing item in the cart
//            $cartItems[$item->id]['quantity']++;
//        } else {
//            // Add the item to the cart
//            $cartItems[$item->id] = [
//                'id' => $item->id,
//                'name' => $item->name,
//                'description' => $item->description,
//                'photo' => $item->photo,
//                'price' => $item->price,
//                'quantity' => 1,
//            ];
//        }
//
//        // Save the updated cart items to the session
//        session()->put('user.savat', $cartItems);
//
//         return redirect()->route('user.savat',['savat'=>$item]);
//    }



//    public function addToCard($id)
//    {
//        // Retrieve card data based on the ID
//        $sessiya = Sovga::find($id);
//
//        // Check if card is found
//        if ($sessiya) {
//            // Write card data to session
//            session()->put('session', $sessiya);
//
//            // Optionally, you can also write specific card data to session
//            session()->put('session.id', $sessiya->id);
//            session()->put('session.name', $sessiya->name);
//            session()->put('session.name', $sessiya->name);
//
//            // Redirect or return response
//            return redirect()->back()->with('success', 'Card data has been stored in the session.');
//        } else {
//            // Card not found, handle error
//            return redirect()->back()->with('error', 'Card not found.');
//        }
//    }
}
