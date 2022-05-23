<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use Illuminate\Http\Request;
use Image;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{


    public function BrandView()
    {
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_view', compact('brands'));
    }


    public function BrandStore(Request $request)

        {

        $this->validate($request, [
            'brand_name_en' => 'required',
            'brand_name_hin' => 'required',
            'brand_image' => 'required'
        ], [
            'brand_name_en.required' => 'Input Brand English Name',
            'brand_name_hin.required' => 'Input Brand Hindi Name',
        ]);

        if ($request->file('brand_image')) {

            $image = $request->file('brand_image');
            $fileName = date('YmdHi') . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/brand/' . $fileName);
            $save_url = 'upload/brand/' . $fileName;
            Brand::insert([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_hin' => $request->brand_name_hin,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_hin' => str_replace(' ', '-', $request->brand_name_hin),
                'brand_image' => $save_url
            ]);

            $notification = [
                'message' => 'Brand Inserted Successfully',
                'alert-type' => 'success',
            ];
            return redirect()->back()->with($notification);
        }
    }


    public function BrandEdit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('backend.brand.brand_edit', compact('brand'));
    }


    public function BrandUpdate(Request $request)
    {
        $brand_id = $request->id;
        $old_image = $request->old_image;

        if ($request->file('brand_image')) {
            unlink($old_image);
            $image = $request->file('brand_image');
            $fileName = date('YmdHi') . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/brand/' . $fileName);

            $save_url = 'upload/brand/' . $fileName;
            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_hin' => $request->brand_name_hin,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_hin' => str_replace(' ', '-', $request->brand_name_hin),
                'brand_image' => $save_url
            ]);

            $notification = [
                'message' => 'Brand Updated Successfully',
                'alert-type' => 'success',
            ];
            return redirect()->back()->with($notification);
        } else {
            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_hin' => $request->brand_name_hin,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_hin' => str_replace(' ', '-', $request->brand_name_hin),
                'brand_image' => $old_image
            ]);

            $notification = [
                'message' => 'Brand Updated Successfully',
                'alert-type' => 'info',
            ];
            return redirect()->route('all.brand')->with($notification);
        }
    }

    public function BrandDelete($id)
    {
        $brand = Brand::findOrFail($id);

        unlink($brand->brand_image);

        Brand::findOrFail($id)->delete();

        $notification = [
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'warning',
        ];

        return redirect()->back()->with($notification);
    }
}
