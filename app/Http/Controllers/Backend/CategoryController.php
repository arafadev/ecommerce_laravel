<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function CategoryView()
    {
        $categories = Category::latest()->get();
        return view('backend.category.category_view', compact('categories'));
    }
    public function CategoryStore(Request $request)
    {
        // 1- Validate
        $this->validate($request, [
            'category_name_en' => 'required',
            'category_name_hin' => 'required',
            'category_icon' => 'required'
        ], [
            'category_name_en.required' => 'Input Category English Name',
            'category_name_hin.required' => 'Input Category Hindi Name',
        ]);
        // 2- Insertion
        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_hin' => $request->category_name_hin,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_hin' => str_replace(' ', '-', $request->category_name_hin),
            'category_icon' => $request->category_icon
        ]);

        // 3- Notification
        $notification = [
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success',
        ];
        // 4- Redirection
        return redirect()->back()->with($notification);
    }
    public function CategoryEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('category'));
    }
    public function CategoryUpdate(Request $request)
    {

        $category_id = $request->id;

        Category::findOrFail($category_id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_hin' => $request->category_name_hin,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_hin' => str_replace(' ', '-', $request->category_name_hin),
            'category_icon' => $request->category_icon
        ]);

        $notification = [
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('all.category')->with($notification);
    }

    public function CategoryDelete($id){

        $category = Category::findOrFail($id);


        Category::findOrFail($id)->delete();

        $notification = [
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'warning',
        ];

        return redirect()->back()->with($notification);
    }
}
