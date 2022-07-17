<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Category as ModelCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct(ModelCategory $modelCategory){
        $this->modelCategory = $modelCategory;
    }


    public function index()
    {
        // заполнить с пагинацией вывод всех категорий
//        dd(__METHOD__);
        //view all categories with pagination
        $categories = $this->modelCategory->selectAllCategoryWithPagination(5);
        \Debugbar::addMessage($categories);
        return view('categories.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.add_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->modelCategory->createCategory($request['nameCategory']);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = $this->modelCategory->selectCategoryWithProducts($id);

        return view('categories.category')->with([
            'category' => $response['category'],
            'products' => $response['products']
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit_category')->with([
            'category'=> $category
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = $request->validate([
            'nameCategory' => 'required|unique:categories,name|min:3'
        ]);

//        Rule::unique('')
        $this->modelCategory->updateCategory($id,$request->nameCategory);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->modelCategory->deleteCategory($id);
        return redirect()->route('categories.index');
    }
}
