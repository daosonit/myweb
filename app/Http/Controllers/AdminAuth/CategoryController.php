<?php

namespace App\Http\Controllers\AdminAuth;

use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAuth\CategoryRequest;
use App\Libraries\Image\UploadImage;
use Config;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.category.listing');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        try {

            $data = $request->all();
            if ($request->hasFile('image')) {
                $upload_image = new UploadImage();
                $upload_image->make($this->option())->save($request->file('image'));

                if (count($upload_image->error()) == 0) {
                    $data['image'] = $upload_image->fileName();
                }
            } else {
                $data['image'] = '';
            }

            $result = Category::create($data);

            if ($result) {
                return back()->with('status', 'Thêm mới thành công');
            }

        } catch (ModelNotFoundException $e) {

        }
    }

    /**
     * Kích thước hình ảnh
     */
    private function option()
    {
        return array('prefix_size' => Config::get('upload_image.sizeCategory'),
                     'first_name'  => Config::get('upload_image.nameCategory'),
                     'path'        => Config::get('upload_image.pathCategory'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
