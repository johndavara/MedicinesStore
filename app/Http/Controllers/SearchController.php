<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class SearchController extends Controller
{
    /**
     * Search for porduct or products with a serach criteria.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function search(Request $request)
    {
        $criteria = $request->input('search');
        $products = Product::where('name', $criteria)
        ->orWhere('name', 'like', '%' . $criteria . '%')
        ->orWhere('description', 'like', '%' . $criteria . '%')->get();
        return view('search.searchProducts')->with('products', $products)->with('criteria', $criteria);
    }

        /**
     * Search for porduct or products with a serach criteria.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function directSearch($criteria)
    {
        $products = Product::where('name', $criteria)
        ->orWhere('name', 'like', '%' . $criteria . '%')
        ->orWhere('description', 'like', '%' . $criteria . '%')->get();
        return view('search.searchProducts')->with('products', $products)->with('criteria', $criteria);
    }
}
