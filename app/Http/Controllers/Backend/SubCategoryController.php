<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    public function SubCategoryView()
    {
        $subcategories = SubCategory::latest()->get();
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        return view('backend.category.subcategory_view', compact('subcategories', 'categories'));
    }

    public function SubCategoryStore(Request $request)
    {
        $this->validate($request, [
            'subcategory_name_en' => 'required',
            'subcategory_name_hin' => 'required',
            'category_id' => 'required'
        ], [
            'subcategory_name_en.required' => 'Input SubCategory English Name',
            'subcategory_name_hin.required' => 'Input SubCategory Hindi Name',
            'category_id' => 'Input Category Required'
        ]);


        SubCategory::insert([
            'subcategory_name_en'  =>  $request->subcategory_name_en,
            'subcategory_name_hin' => $request->subcategory_name_hin,
            'subcategory_slug_en'  =>  strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_hin' => str_replace(' ', '-', $request->subcategory_name_hin),
            'category_id' => $request->category_id
        ]);

        $notification = [
            'message' => 'SubCategory Inserted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }

    public function SubCategoryEdit($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $categories = Category::orderBy('category_name_en', 'Asc')->get();
        return view('backend.category.subcategory_edit', compact('subcategory', 'categories'));
    }
    public function SubCategoryUpdate(Request $request)
    {
        $subcategory_id = $request->id;

        SubCategory::findOrFail($subcategory_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_hin' => $request->subcategory_name_hin,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_hin' => str_replace(' ', '-', $request->subcategory_name_hin),
        ]);

        $notification = array(
            'message' => 'SubCategory Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.subcategory')->with($notification);
    }

    public function SubCategoryDelete($id)
    {

        SubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'SubCategory Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    // ========================================   Sub Sub Category =====================================================//


    public function SubSubCategoryView()
    {
        // $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        return view('backend.category.sub_subcategory_view', compact('subsubcategories', 'categories', 'subcategories'));
    }

    // Show Subcategory deal Category
    public function GetSubCategory($category_id)
    {
        $subcategories = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name_en', 'ASC')->get();
        return json_encode($subcategories);
    }

    // Show SubSubcategory deal SubCategory    
    public function GetSubSubCategory($subcategory_id)
    {
        $subsubcat = SubSubCategory::where('subcategory_id', $subcategory_id)->orderBy('subsubcategory_name_en', 'ASC')->get();
        return json_encode($subsubcat);
    }

    public function SubSubCategoryStore(Request $request)
    {

        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_hin' => 'required'
        ], [
            'category_id.required' => 'Please Select Any Option',
            'subsubcategory_name_en.required' => 'Input SubSubCategory English Name',
        ]);

        SubSubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_hin' => $request->subsubcategory_name_hin,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_hin' => str_replace(' ', '-', $request->subsubcategory_name_hin),
        ]);
        $notification = [
            'message' => 'Sub-SubCategory Inserted Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function SubSubCategoryEdit($id)
    {
        $subsubcategory = SubSubCategory::findOrFail($id);
        $categories = Category::orderBy('category_name_en', 'Asc')->get();
        $subcategories = SubCategory::orderBy('subcategory_name_en', 'ASC')->get();

        return view('backend.category.sub_subcategory_edit', compact('subsubcategory', 'categories', 'subcategories'));
    }
    public function SubSubCategoryUpdate(Request $request)
    {

        $subsubcat_id = $request->id;

        SubSubCategory::findOrFail($subsubcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_hin' => $request->subsubcategory_name_hin,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_hin' => str_replace(' ', '-', $request->subsubcategory_name_hin),


        ]);

        $notification = array(
            'message' => 'Sub-SubCategory Update Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.subsubcategory')->with($notification);
    }



    public function SubSubCategoryDelete($id)
    {

        SubSubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Sub-SubCategory Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
