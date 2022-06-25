<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\View;

use App\Http\Requests\ProductRequest;

use Illuminate\Support\Facades\Validator;

use App\Rules\Uppercase;

use Illuminate\Support\Facades\DB;

// use DB;
class HomeController extends Controller
{
    public $data = [];

    public function index(){
        $this->data['title'] = 'Đào tạo lập trình web';

        $this->data['message'] = 'Đăng ký tài khoản thành công';
        
        $users = DB::select('SELECT * FROM users WHERE email=:email', [
            'email' => 'tienpk@gmail.com'
        ]);

        // dd($users);
        
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
        
        // $rules = [
        //     'product_name' => ['required', 'min:6', function($attributes, $value, $fail){
        //         isUpperCase($value, 'Trường :attribute không hợp lệ ', $fail);
        //     }],
        //     'product_price' => ['required','integer']
        // ];

        $rules = [
            'product_name' => ['required', 'min:6'],
            'product_price' => ['required','integer']
        ];

        $message = [
            'required' => 'Trường :attribute bắt buộc phải nhập',
            'min' => 'Trường :attribute không được nhỏ hơn :min ký tự',
            'integer' => 'Trường :attribute phải là sô'
        ];

        // $message = [
        //     'product_name.required' => ':attribute bắt buộc phải nhập',
        //     'product_name.min' => ':attribute không được ít hơn :min ký tự',
        //     'product_price.required' => ':attribute bắt buộc phải nhập',
        //     'product_price.integer' => ':attribute phải là số',
        // ];

        $attributes = [
            'product_name' => 'Tên sản phẩm',
            'product_price' => 'Giá sản phẩm'
        ];

        // $validator = Validator::make($request->all(), $rules, $message, $attributes);

        // $validator->validate();

        // $request->validate($rules, $message);

        return response()->json(['status' => 'success']);

        // $validator->validate();

        // if ($validator->fails()) {
        //     $validator->errors()->add('msg', 'Vui lòng kiểm tra lại dữ liệu');
        //     // return 'Validate thất bại';
        // } else {
        //     // return 'Validate thành công';
        //     return redirect()->route('product')->with('msg', 'Validate thành công');
        // }

        // return back()->withErrors($validator);
        

        

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

    // public function isUpperCase($value, $message, $fail) {
    //     if($value != mb_strtoupper($value, 'UTF-8')) {
    //         //Xảy ra lỗi
    //         $fail($message);
    //     }
    // }
}
