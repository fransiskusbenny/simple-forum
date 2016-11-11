<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Category\ValidationRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the category.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::orderBy('name', 'ASC')
            ->with('topics')
            ->paginate(20);

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidationRequest $request)
    {
        $category = new Category;

        $category->name = $request->name;

        if ($category->save()) {
            return redirect()
                ->back()
                ->withSuccess(trans('category.message.created', ['name' => $category->name]));
        }

        return redirect()->back();
    }

    /**
     * Display the specified category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidationRequest $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->name = $category->name;

        if ($category->save() === true) {
            return redirect()
                ->route('category.index')
                ->withSuccess(trans('category.message.updated', ['name' => $category->name]));
        }

        return redirect()->back();
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if ($category->delete() === true) {
            return redirect()
                ->route('category.index')
                ->withSuccess(trans('category.message.deleted'));
        }

        return redirect()->back();
    }
}
