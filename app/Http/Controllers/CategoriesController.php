<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    public function __construct(Request $request)
    {
        /**
         * Nếu là trang ds chuyên mục => hiển thị ra dòng chữ: xin chào 
         * unicode
         */
        if($request->is('categories')){
            echo 'Xin chòa unicode';
        }
    }

    // Hiển thị danh sách chuyên mục (Phương thức Get)
    public function index(Request $request){
        // $allData = $request->all();
        // dd($allData);
        // echo $request->path();

        // $path = $request->path();

        // $url = $request->url();
        // $fullUrl =$request->fullUrl();

        // $method = $request->method(); lấy method

        // $ip =$request->ip(); lấy địa chỉ ip

        // $server = $request->server();

        // $header = $request->header();

        // $input = $request->input('id');
        // $input = $request->input('id.*.name');
        // $id = $request->id;
        // $id = $request->query('id');

        // dd($id);
        
        // $query = $request->query();
        // dd($query);
        // $name = $request->name();


        return view('client/categories/list');
    }

    // Lấy ra 1 chuyên mục theo id (Phương thức GET)
    public function getCategory($id){
        return view('client/categories/edit');
    }

    // Cập nhật 1 chuyên mục (Phương thức POST)
    public function updateCategory($id) {
        return 'Submit sửa chuyên mục id ' .$id;
    }

    // Show form thêm dữ liệu  (Phương thức Get)
    public function addCategory(Request $request){
        // $path = $request->path();
        // echo $path;
        // $old = $request->old('category_name');
        return view('client/categories/add');
    }

    // Thêm dữ liệu vào chuyên mục (Phương thức POST)
    public function handleAddCategory(Request $request){
        // return redirect(route('categories.add'));
        // return 'Submit thêm chuyên mục';
        // print_r($_POST);
        // dd($request->all());

        // $cateName = $request->category_name;

        if($request->has('category_name')) {
            $cateName = $request->category_name;
            $request->flash(); // set session flash

            return redirect(route('categories.add'));
            // dd($cateName);
        }
        else {
            return 'Không có category_name';
        }
    }

    // Xóa dữ liệu (Phương thức Delete)
    public function deleteCategory($id){
        return 'Submit xóa chuyên mục ' .$id;
    }

    public function getUpload() {
        return view('client/categories/file');
    }

    // Xử lý lấy thông tin file
    public function handleFile(Request $request) {
        // $file = $request->file('photo');
        if($request->hasFile('photo')) {
            if($request->photo->isValid()) {
                $file = $request->photo;
                dd($file);
            }
        }
        else {
            return 'Vui lòng chọn file';
        }
    }
}
