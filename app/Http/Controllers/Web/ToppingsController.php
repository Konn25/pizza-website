<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ToppingUpdateRequest;
use App\Models\Topping;
use Illuminate\Http\Request;

class ToppingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.toppings.index',['toppings' => Topping::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Topping $topping)
    {
        return view('pages.toppings.edit', ['topping' => $topping]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ToppingUpdateRequest $request, Topping $topping)
    {
        $data = $request->validated();

        if($request->hasFile('url')){
            $file = $request->file('url');

            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/toppings'), $filename);

            $data['url'] ='/images/toppings/'.$filename;
        }

        $topping->update($data);

        return redirect()->route('toppings.edit',$topping)->with(['success' => 'Topping updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
