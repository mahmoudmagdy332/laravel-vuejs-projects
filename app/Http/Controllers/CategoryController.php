<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function index(){

       $mainCategories=Category::whereNull('category_id')->latest()->get();
       return view('category',compact('mainCategories'));

   }
   public function addCategory($id=null){
    return view('addCategory',compact('id'));
   }

   public function store(Request $request){

       Category::create([
           'name'=>$request->name,
           'category_id'=>$request->id,
       ]);
       return redirect()->route('index');
   }
    public function delete($id){
       $c=Category::find($id);
        $c->delete();
        return redirect()->route('index');
    }
    public function edit($id){
        $c=Category::find($id);
        return view('edit',compact('c'));
    }
    public function update(Request $request){
        $c=Category::find($request->id);
        $c->update([
            'name'=>$request->name,
        ]);
        return redirect()->route('index');
    }

}
