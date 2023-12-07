<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('products.index', [
            'products' => $products,
        ]);
    }
    public function create(){
        return view('products.create');
    }
    public function store(Request $request){
        $validate = $request->validate([
            'name' => 'required|unique:products',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp,svg',
        ], [
            'name.required' => 'Trường tên sản phẩm là bắt buộc.',
            'name.unique' => 'Tên sản phẩm đã tồn tại, vui lòng chọn tên khác.',
            'price.required' => 'Trường giá sản phẩm là bắt buộc.',
            'price.numeric' => 'Giá sản phẩm phải là một số.',
            'price.min' => 'Giá sản phẩm phải lớn hơn 0.',
            'image.required' => 'Trường ảnh sản phẩm là bắt buộc.',
            'image.image' => 'Tệp phải là một hình ảnh.',
            'image.mimes' => 'Ảnh phải có định dạng: jpeg, png, jpg, gif, webp, svg.',
        ]);
        $product=new Product();
        $product->name=$request->name;
        $product->price=$request->price;
        $product->description=$request->description;
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('public/products');
            $product->image = $imagePath;
        }
        $product->save();
        return redirect()->route('index')->with('success','Thêm mới sản phẩm thành công');
    }
    public function edit($id){
        $product=Product::find($id);
        return view('products.update',[
            'product'=>$product
        ]);
    }
    public function update(Request $request, $id){
        $product=Product::find($id);
        $validate = $request->validate([
            'name' => ['required', Rule::unique('products')->ignore($id)],
            'price' => 'required|numeric|min:0',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp,svg',
        ], [
            'name.required' => 'Trường tên sản phẩm là bắt buộc.',
            'name.unique' => 'Tên sản phẩm đã tồn tại, vui lòng chọn tên khác.',
            'price.required' => 'Trường giá sản phẩm là bắt buộc.',
            'price.numeric' => 'Giá sản phẩm phải là một số.',
            'price.min' => 'Giá sản phẩm phải lớn hơn 0.',
            'image.image' => 'Tệp phải là một hình ảnh.',
            'image.mimes' => 'Ảnh phải có định dạng: jpeg, png, jpg, gif,webp, svg.',
        ]);
        $product->name=$request->name;
        $product->price=$request->price;
        $product->description=$request->description;
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('public/products');
            $product->image = $imagePath;
        }
        $product->save();
        return redirect()->route('index')->with('success','Cập  nhật sản phẩm thành công');

    }
    public function delete($id){
        $product=Product::find($id);
        if($product){
            $product->delete();
        return redirect()->route('index')->with('success','Xoá sản phẩm thành công');
        }else{
        return redirect()->route('index')->with('error','Không tìm thấy sản phẩm muốn xoá');
        }

    }
}
