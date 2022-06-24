<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Requests\ProductRequest;

class HomeController extends Controller
{
    public $data = [];

    public function index(){
        $this->data['title'] = 'Đào tạo lập trình web';
        return view('clients.home', $this->data);
    }

    public function products() {
        $this->data['title'] = 'Sản phẩm';
        return view('clients.products', $this->data);
    }

    public function getAdd() {
        $this->data['title'] = 'Thêm sản phẩm';

        $this->data['errorsMessage'] = 'Vui lòng nhập dữ liệu';

        return view('clients.add', $this->data);
    }

    public function postAdd(ProductRequest $request) {
        dd($request);

        // $rules = [
        //     'product_name' => 'required|min:6',
        //     'product_price' => 'required|integer'
        // ];

        // $message = [
        //     'product_name.required' => 'Tên sản phẩm bắt buộc phải nhập',
        //     'product_name.min' => 'Tên sản phẩm không được ít hơn :min ký tự',
        //     'product_price.required' => 'Giá sản phẩm bắt buộc phải nhập',
        //     'product_price.integer' => 'Giá sản phẩm phải là số',
        // ];

        // $message = [
        //     'required' => 'Trường :attribute bắt buộc phải nhập',
        //     'min' => 'Trường :attribute không được nhỏ hơn :min ký tự',
        //     'integer' => 'Trường :attribute phải là sô'
        // ];

        // $request->validate($rules, $message);

        // Xử lý việc thêm dữ liệu vào database
    }

    public function putAdd(Request $request) {
        dd($request);
    }

    public function downloadImage(Request $request) {
        if(!empty($request->image)) {
            $image = trim($request->image);

            // Tự đặt tên cho file ảnh download đạng random
            $flieName = 'image_'.uniqid().'.jpg';

            // Lấy tên ảnh gốc
            // $flieName = basename($image);

            // Download với link ngoài project
            // return response()->streamDownload(function() use ($image){
            //     $imageContent = file_get_contents($image);
            //     echo $imageContent;
            // }, $flieName);

            // Download file nội bộ
            return response()->download($image, $flieName);
        }
    }
}
