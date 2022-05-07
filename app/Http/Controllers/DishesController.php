<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\DishStoreRequest;
use Illuminate\Support\Facades\Validator;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dish=Dish::all();

         return view('kitchen.dish',compact('dish'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all();
        return view('kitchen.dish_create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(DishStoreRequest $request)
    {
        $dish=new Dish();
        $dish->name=$request->name;
        $dish->category_id=$request->category;
        $imageName=date('YmdHis'). "." .$request->dish_image->getClientOriginalExtension();
        $request->dish_image->move(public_path('images'),$imageName);
        $dish->image=$imageName;
        $dish->save();
        return redirect()->route('dishes.index')->with('success','Dish created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dish=Dish::find($id);
        $category=Category::all();
        return view('kitchen.dish_edit',compact('dish','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
         request()->validate([
            'name'=>'required',
            'category'=>'required',
          ]);
          $dish->name=$request->name;
          $dish->category_id=$request->category;
          if ($request->image) {
              $imageName=date('YmdHis'). "." .$request->image->getClientOriginalExtension();
                $request->image->move(public_path('images'),$imageName);
                $dish->image=$imageName;
          }
          $dish->save();
          return redirect()->route('dishes.index')->with('success','Dish updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $dish_delete=Dish::find($id);
       $dish_delete->delete();
       return redirect()->route('dishes.index')->with('success','Dish deleted successfully');
    }
}
