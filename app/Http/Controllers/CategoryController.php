<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    
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
        DB::beginTransaction();
        try {
            
            Category::create($request->all());

            DB::commit();

            return redirect()->route('categories.index')->with('Categoriag','ok');
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return redirect()->route('categories.create')->with('Categoriag','error');
        }
        
    }

  
    public function show(Category $category)
    {
        
    }

    public function edit($id)
    {
        $categoria=Category::find($id);
        return view('admin.category.edit')->with('categoria',$categoria);
    }


    public function Update(UpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $categoria=Category::find($id);
            $categoria->update($request->all());
            DB::commit();
            return redirect()->route('categories.index')->with('Categoriae','ok');
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return redirect()->route('categories.edit')->with('Categoriae','error');
        }
        
    }

   
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $categoria=Category::find($id);
            $categoria->delete();
            DB::commit();
            return redirect()->route('categories.index')->with('Categoriad','ok');
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return redirect()->route('categories.index')->with('Categoriad','error');
        }
    }
}
