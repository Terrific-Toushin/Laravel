<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    public function index() {
        return view('admin.category.add-category');
    }

    public function newCategory(Request $request) {

        $this->validate($request, [
            'category_name' => 'required|regex:/(^([a-zA-Z ]+)(\d+)?$)/u|min:3|max:7'
        ]);



//        DB::table('categories')->insert([
//            'category_name'         => $request->category_name,
//            'category_description'  => $request->category_description,
//            'publication_status'    => $request->publication_status,
//        ]);

//        $category = new Category();
//        $category->category_name        = $request->category_name;
//        $category->category_description = $request->category_description;
//        $category->publication_status   = $request->publication_status;
//        $category->save();

          $existCategory = Category::where('category_name', $request->category_name)->first();
          if($existCategory) {
              return redirect()->back()->with('message', 'This category name already exist. Please try another one.');
          } else {
              Category::create($request->all());
              return redirect('/category/add-category')->with('message', 'Create Successfully');
          }
    }

    public function manageCategory() {
//        $categories = Category::al();
//        $categories = Category::first();
//        $categories = Category::take('3')->get();
//        $categories = Category::skip('3')->take('3')->get();
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.category.manage-category', [
            'categories'   =>  $categories
        ]);
    }

    public function editCategory($id) {
        $category = Category::find($id);
//        $category = Category::where('id', $id)->first();
        return view('admin.category.edit-category', ['category'=>$category]);
    }

    public function updateCategory(Request $request) {
        $category = Category::find($request->id);

        $category->category_name        = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status   = $request->publication_status;
        $category->save();

        return redirect('/category/manage-category')->with('message', 'Category info update successfully');
    }

    public function deleteCategory($id) {
        $category = Category::find($id);
        $category->delete();
        return redirect('/category/manage-category')->with('message', 'Category info delete successfully');
    }
}









