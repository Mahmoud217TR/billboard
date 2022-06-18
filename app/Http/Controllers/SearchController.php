<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Http\Requests\TagSearchRequest;
use App\Models\Advertisement;
use App\Models\Tag;
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

    public function tagSearch(){
        $keyword = request()->get('keyword');
        $results = Tag::where('name','like',$keyword.'%')->limit(6)->pluck('name','id');
        $match = $results->contains($keyword);
        return ['results'=>$results, 'match'=>$match];
    }
}
