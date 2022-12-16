<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Http\Traits\DataTrait;
use App\Http\Traits\SlugTrait;

class CategoryController extends Controller
{
    use DataTrait;
    use SlugTrait;


    public function __construct() {
        $this->authorizeResource(Category::class, 'category');
        // Category::class is the model to lookup the policy
        // category - parameter name, explained w/ can middleware
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        // Get data using Trait method
        $model = $this->getData(new Category());

        return view('categories.index')->with(['model'=>$model]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        
        // The incoming request is valid...
 
        // Retrieve the validated input data...
        //$validated = $request->validated();

        //$validated = $request->safe()->all();
    
        // Retrieve a portion of the validated input data...
        $validated = $request->safe()->only('name');
        $validated['slug'] = $this->generateSlug($validated['name']);
        Category::create($validated);
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categories.show')->with(compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit')->with(compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        
        $validated = $request->safe()->only('name');
        $category->name = $validated['name'];
        $category->slug = $this->generateSlug($validated['name']);
        $category->save();
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        return redirect()->route('category.index');
    }
}
