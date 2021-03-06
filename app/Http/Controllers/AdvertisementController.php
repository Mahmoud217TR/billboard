<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Http\Requests\StoreAdvertisementRequest;
use App\Http\Requests\UpdateAdvertisementRequest;
use App\Models\Category;

class AdvertisementController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertisements = Advertisement::featuredFirst()->published()->latest()
        ->with(['category'])->paginate(18);
        return view('advertisement.index',compact('advertisements'));
    }

    public function uncategorized(){
        $advertisements = Advertisement::featuredFirst()->published()->uncategorized()->latest()->paginate(18);
        return view('advertisement.index',compact('advertisements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $advertisement= new Advertisement;
        $categories = Category::all();
        return view('advertisement.create',compact('advertisement','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdvertisementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdvertisementRequest $request)
    {
        $advertisement = auth()->user()->advertisements()->save(new Advertisement($request->all()));
        $advertisement->tags()->sync($request->tags);
        return redirect()->route('advertisement.show',$advertisement);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function show(Advertisement $advertisement)
    {
        $advertisement->with(['user','category','tags','user.profile']);
        return view('advertisement.show',compact('advertisement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisement $advertisement)
    {
        $this->authorize('update',$advertisement);
        $advertisement->with('tags');
        $categories = Category::all();
        return view('advertisement.edit',compact('advertisement','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdvertisementRequest  $request
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdvertisementRequest $request, Advertisement $advertisement)
    {
        $this->authorize('update',$advertisement);
        $advertisement->update($request->all());
        $advertisement->tags()->sync($request->tags);
        return redirect()->route('advertisement.show',$advertisement);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertisement $advertisement)
    {
        $this->authorize('delete',$advertisement);
        $advertisement->delete();
        return redirect()->route('advertisement.index');
    }
}
