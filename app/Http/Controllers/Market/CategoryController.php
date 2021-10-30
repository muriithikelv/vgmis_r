<?php

namespace App\Http\Controllers\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Market\CategoryRequest;

use App\Model\Market\Category;


use App\Model\Market\Product;

class CategoryController extends Controller
{

    public function index()
    {
        $results = Category::get();
        return view('admin.market.category.index', ['results' => $results]);
    }


    public function create()
    {
        return view('admin.market.category.form');
    }

    public function show($id)
    {
        $editModeData = Category::findorFail($id);
        $category = Category::where('category_id',$id)->first();
        return view('admin.market.category.form',compact('category','editModeData'));
    }


    public function store(CategoryRequest $request)
    {
        $input = $request->all();
        try {
            Category::create($input);
            $bug = 0;
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
        }

        if ($bug == 0) {
            return redirect('category')->with('success', 'Category successfully saved.');
        } else {
            return redirect('category')->with('error', 'Something Error Found !, Please try again.');
        }
    }


    public function edit($id)
    {
        $editModeData = Category::findOrFail($id);
        return view('admin.market.category.form', ['editModeData' => $editModeData]);
    }


    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $input = $request->all();
        try {
            $category->update($input);
            $bug = 0;
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
        }

        if ($bug == 0) {
            return redirect()->back()->with('success', 'Category successfully updated ');
        } else {
            return redirect()->back()->with('error', 'Something Error Found !, Please try again.');
        }
    }


    public function destroy($id)
    {

        $count = Product::where('category_id', '=', $id)->count();

        if ($count > 0) {

            return  'hasForeignKey';
        }


        try {
            $category = Category::FindOrFail($id);
            $category->delete();
            $bug = 0;
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
        }

        if ($bug == 0) {
            echo "success";
        } elseif ($bug == 1451) {
            echo 'hasForeignKey';
        } else {
            echo 'error';
        }
    }

    public function APICategories()
    {
        $categories = Category::all();
        $status = false;
        $message = 'No category found';
        if (isset($categories)) {
            $status = true;
            $message = "OK";
        }
        return response()
            ->json(['success' => $status, 'message' => $message, 'data' => $categories]);
    }
}
