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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shoppingCart = new Product();
        $shoppingCart->idProduct = $request->idProduct;
        $shoppingCart->idCategory = $request->idCategory;
        $shoppingCart->save();
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
        $shoppingCart = ShoppingCart::all();

        $result = ShoppingCart::join('users', 'shoppingcart.idUser', '=', 'users.id')
        ->join('product', 'shoppingcart.idProduct', '=', 'product.id')
        ->select('product.id', 'product.name', 'product.description','product.photo', 'product.price','users.id')
        ->where('users.id', $id)
        ->getQuery() // Optional: downgrade to non-eloquent builder so we don't build invalid User objects.
        ->get();


        return view('shoppingCart.checkout')->with('products',$result);
    }

/**
     * Return list of products
     *
     * @return \Illuminate\Http\Response
     */
    public function checkoutData()
    {
        $id = Auth::user()->id;
        $shoppingCart = ShoppingCart::all();

        $result = ShoppingCart::join('users', 'shoppingcart.idUser', '=', 'users.id')
        ->join('product', 'shoppingcart.idProduct', '=', 'product.id')
        ->select('product.id', 'product.name', 'product.description','product.photo', 'product.price','users.id')
        ->where('users.id', $id)
        ->getQuery() // Optional: downgrade to non-eloquent builder so we don't build invalid User objects.
        ->get();


        return $result;
    }

}
