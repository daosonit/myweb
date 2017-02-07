<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Listing
     */
    public function index(Request $request)
    {
        $name = $request->get('name', '');
        $type = $request->get('type', -1);

        $query = Navigate::select('*');

        if ($name != '') {
            $query->findName($name);
        }

        if ($type > -1) {
            $query->findType($type);
        }

        $listing = $query->orderBy('order', 'ASC')->paginate(10);
        $no = $listing->firstItem();
        return view('admin.menu.listing')->with(array('listing' => $listing, 'name' => $name, 'type' => $type, 'no' => $no));
    }

    /**
     * Add
     */
    public function create()
    {
        die('vao day');
        return view('admin.role-permision.insert-role');
    }

    /**
     * @param NavigateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(NavigateRequest $request)
    {
        try {
            $data = $request->all();
            Navigate::create($data);

            return redirect()->route('admin.menu.create')->with('status', 'Thêm mới thành công!');
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }
    }

    /**
     * Edit
     */
    public function edit($id)
    {
        try {
            $navigate = Navigate::findOrFail($id);
            return view('admin.menu.update')->with(array('navigate' => $navigate));
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

    public function update(NavigateEditRequest $request, $id)
    {
        try {
            $navigate = Navigate::findOrFail($id);

            $navigate->name = $request->name;
            $navigate->type = $request->type;
            if ($navigate->save()) {
                return back()->with('status', 'Update thành công.');
            } else {
                return back()->with('status', 'Update thất bại.');
            }

        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

    /**
     * Delete
     */
    public function destroy($id)
    {
        try {
            $navigate = Navigate::findOrFail($id);

            if ($navigate->delete()) {
                return back()->with('status', 'Delete success!');
            } else {
                return back()->with('status', 'Delete thất bại!');
            }

        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }
}
