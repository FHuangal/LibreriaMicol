<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category::get();
        return view('admin.category.index',compact('categories'));
    }

    
    public function create()
    {
        return view('admin.category.create');
    }

    public function Store(StoreRequest $request)
    {
        Category::create($request->all());
        return redirect()->route('categories.index');
    }

  
    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    public function edit($id)
    {
        $categoria=Category::find($id);
        return view('admin.category.edit')->with('categoria',$categoria);
    }


    public function Update(UpdateRequest $request, $id)
    {
        $categoria=Category::find($id);
        $categoria->update($request->all());
        return redirect()->route('categories.index');
    }

   
    public function destroy($id)
    {
        $categoria=Category::find($id);
        $categoria->delete();
        return redirect()->route('categories.index');
    }
}
