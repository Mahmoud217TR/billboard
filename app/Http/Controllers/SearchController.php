<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Advertisement;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function indexSearch(SearchRequest $request){
        $advertisements = Advertisement::featuredFirst()->published()->latest()
        ->where('title', 'like', '%'.$request['keyword'].'%')
        ->orWhere('description', 'like', '%'.$request['keyword'].'%')
        ->orWhereHas('category',function($query) use ($request){
            $query->where('name', 'like', '%'.$request['keyword'].'%');
        })
        ->paginate(18);
        return view('advertisement.results',compact('advertisements'));
    }
}
