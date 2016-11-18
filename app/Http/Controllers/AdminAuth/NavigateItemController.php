<?php

namespace App\Http\Controllers\AdminAuth;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAuth\NavigateItemRequest;
use App\Models\NavigateItem;

class NavigateItemController extends Controller
{
    public function index(){
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
    public function edit()
    {
        return view('admin.menu-item.update');
    }

    public function update()
    {

    }

    //Delete
    public function delete()
    {

    }

    public function destroy()
    {

    }
}
