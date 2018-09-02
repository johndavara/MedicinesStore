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
        // pending logic to select query
        return view('search.searchProducts')->with('criteria', $criteria);
    }
}
