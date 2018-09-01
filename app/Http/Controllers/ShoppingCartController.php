<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShoppingCart;

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


}
