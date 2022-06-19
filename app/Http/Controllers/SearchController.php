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
        $advertisements = Advertisement::search($request->keyword)
        ->paginate(18);
        return view('advertisement.results',compact('advertisements'));
    }

    public function tagSearch(){
        $keyword = request()->get('keyword');
        $exclude = request()->get('exclude');
        $results = Tag::where('name','like',$keyword.'%')
        ->when($exclude, function($query) use ($exclude){
            $query->whereNotIn('id', $exclude);
        })
        ->limit(6)->pluck('name','id');
        $match = $results->contains($keyword);
        return ['results'=>$results, 'match'=>$match];
    }
}
