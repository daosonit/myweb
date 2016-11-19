<?php

namespace App\Http\Controllers\AdminAuth;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAuth\NavigateItemRequest;
use App\Models\NavigateItem;
use App\Http\Requests\AdminAuth\NavItemUpRequest;

class NavigateItemController extends Controller
{
    public function index()
    {
        $listing = NavigateItem::orderBy('nav_id', 'ASC')->orderBy('order', 'ASC')->paginate(10);
        $no = $listing->firstItem();

        return view('admin.menu-item.listing')->with(array('listing' => $listing, 'no' => $no));
    }

    //Add
    public function create()
    {
        return view('admin.menu-item.insert');
    }

    public function store(NavigateItemRequest $request)
    {
        try {
            $data = $request->all();
            $data['name'] = trim($data['name']);
            $data['route'] = trim($data['route']);
            $data['nav_id'] = (integer)($data['nav_id']);

            NavigateItem::create($data);

            return redirect()->route('admin.menu-item.create')->with('status', 'Thêm mới thành công!');
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }
    }

    //Edit
    public function edit($id)
    {
        try {
            $nav_item = NavigateItem::findOrFail($id);
            return view('admin.menu-item.update')->with(array('nav_item' => $nav_item));
        } catch (ModelNotFoundException $e) {
            abort(404);
        }

    }

    public function update(NavItemUpRequest $request, $id)
    {
        try {
            $nav_item = NavigateItem::findOrFail($id);

            $data = $request->all();
            $result = $nav_item->update($data);
            if ($result) {
                return back()->with('status', 'Cập nhật thành công.');
            } else {
                return back()->with('status', 'Cập nhật thất bại.');
            }
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

    //Delete
    public function delete()
    {

    }

    public function destroy($id)
    {
        try {
            $nav_item = NavigateItem::findOrFail($id);
;
            if ($nav_item->delete()) {
                return back()->with('status', 'Xóa thành công.');
            } else {
                return back()->with('status', 'Xóa thất bại.');
            }
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }
}
