<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use Illuminate\Support\Facades\Redirect;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
    */

    private $category;

    public function __construct()
    {
        $this->category = new Categorie();
    }

    public function index()
    {
        $categorys = $this->category->paginate(10);

        return view('categoryList', compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = $this->category->all();
        return view('createCategory', compact('category'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $register = $this->category->create([
            'name'      => $request->name,
            'id_user'   => $request->user()->id
        ]);

        if($register){
            return Redirect::to('/listCategories');
        }
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
    public function edit(string $id)
    {
        $category = $this->category->find($id);

        if($category){
            return view('categoryForm', compact('category'));
        } else {
            return Redirect::to('/listCategories'); 
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = $this->category->where(['id' => $id])->update([
            'name'  => $request->name
        ]);

        if($update){
            return Redirect::to('/listCategories');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = $this->category->find($id);

        $destroy = $category->delete();

        if($destroy){
            return Redirect::to('/listCategories');
        }
    }
}
