<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShoppingCart;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shoppingCart = ShoppingCart::all();
        return $shoppingCart;
    }



/**
     * Delete the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $shoppingCart = ShoppingCart::findOrFail($request->id);
        $shoppingCart->delete();
    }


/**
     * Get checkout view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
        $id = Auth::user()->id;

        $result = ShoppingCart::join('users', 'shoppingcart.idUser', '=', 'users.id')
        ->join('product', 'product.id', '=', 'shoppingcart.idProduct')
        ->select('product.id', 'product.name', 'product.description','product.photo', 'product.price','users.id')
        ->where('users.id', $id)
        ->get();


        return view('shoppingCart.checkout')->with('products',$result);
    }


/**
     * Get checkout view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkoutData()
    {
        $id = Auth::user()->id;

        $result = ShoppingCart::join('users', 'shoppingcart.idUser', '=', 'users.id')
        ->join('product', 'product.id', '=', 'shoppingcart.idProduct')
        ->select('shoppingcart.id as idProductCheckout','product.id', 'product.name', 'product.description','product.photo', 'product.price','users.id')
        ->where('users.id', $id)
        ->get();


        return $result;
    }
    /**
     * Return list of products
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteItemCheckout(Request $request)
    {
        try {
            $shoppingCart = ShoppingCart::where('id',$request->id)->firstOrFail();
            if($shoppingCart != null){
                $shoppingCart->delete();
            }
        } catch (Exception $e) {
        }
 }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function addToCheckout(Request $request)
    {
        $idUser = Auth::user()->id;
        $shoppingCart = new ShoppingCart();
        $shoppingCart->idUser = $idUser;
        $shoppingCart->idProduct = $request->id;
        $shoppingCart->save();
    }


}
