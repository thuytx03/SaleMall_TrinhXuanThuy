<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
     public function index()
    {
        $products = Product::latest()->paginate(5);
        return response()->json(['products' => $products], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:products',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ], [
            'name.required' => 'Trường tên sản phẩm là bắt buộc.',
            'name.unique' => 'Tên sản phẩm đã tồn tại, vui lòng chọn tên khác.',
            'price.required' => 'Trường giá sản phẩm là bắt buộc.',
            'price.numeric' => 'Giá sản phẩm phải là một số.',
            'price.min' => 'Giá sản phẩm phải lớn hơn 0.',
            'image.required' => 'Trường ảnh sản phẩm là bắt buộc.',
            'image.image' => 'Tệp phải là một hình ảnh.',
            'image.mimes' => 'Ảnh phải có định dạng: jpeg, png, jpg, gif, svg.',
        ]);
        if ($validator->fails()) {
            return  [
              'status'=> 400,
              'message' =>   $validator->errors()->first(),
              'error' =>   $validator->errors()->toArray()
            ];
        }

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/products');
            $product->image = $imagePath;
        }

        $product->save();

        return response()->json(['message' => 'Thêm mới sản phẩm thành công'], 201);
    }
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Không tìm thấy sản phẩm'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => ['required', Rule::unique('products')->ignore($id)],
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ], [
            'name.required' => 'Trường tên sản phẩm là bắt buộc.',
            'name.unique' => 'Tên sản phẩm đã tồn tại, vui lòng chọn tên khác.',
            'price.required' => 'Trường giá sản phẩm là bắt buộc.',
            'price.numeric' => 'Giá sản phẩm phải là một số.',
            'price.min' => 'Giá sản phẩm phải lớn hơn 0.',
            'image.required' => 'Trường ảnh sản phẩm là bắt buộc.',
            'image.image' => 'Tệp phải là một hình ảnh.',
            'image.mimes' => 'Ảnh phải có định dạng: jpeg, png, jpg, gif, svg.',
        ]);
        if ($validator->fails()) {
            return  [
              'status'=> 400,
              'message' =>   $validator->errors()->first(),
              'error' =>   $validator->errors()->toArray()
            ];
        }
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/products');
            $product->image = $imagePath;
        }

        $product->save();

        return response()->json(['message' => 'Cập nhật sản phẩm thành công'], 200);
    }

    public function delete($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Không tìm thấy sản phẩm'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Xoá sản phẩm thành công'], 200);
    }
}
