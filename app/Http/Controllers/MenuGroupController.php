<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMenuGroupRequest;
use App\Http\Requests\UpdateMenuGroupRequest;
use App\Models\MenuGroup;

class MenuGroupController extends Controller
{

    private $title;
    private $prefix;

    public function __construct() {
        $this->title = 'Menu Group';
        $this->prefix = 'menugroup';
    }

    public function index()
    {
        $menuGroups = MenuGroup::paginate(10);
        $title = $this->title;
        $prefix = $this->prefix;

        return view($this->prefix.'.index', compact('menuGroups', 'title', 'prefix'));
    }

    public function create()
    {
        try {

            $menuGroups = MenuGroup::paginate(10);
            $actionUrl = route($this->prefix.'.store');
            $title = $this->title;
            $prefix = $this->prefix;

            return view($this->prefix.'.create', compact('menuGroups', 'title','actionUrl', 'prefix'));

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function store(CreateMenuGroupRequest $request)
    {
        try {

            $menuGroup = new MenuGroup;
            $menuGroup->title = $request->title;
            $menuGroup->tag = $request->tag;
            $saved = $menuGroup->save();

            if ( $saved ) {
                return redirect()->back()->with('success', 'Data Saved');
            } else {
                return redirect()->back()->with('failure', 'Data saving failed');
            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function edit(MenuGroup $menuGroup)
    {
        try {

            $menuGroups = MenuGroup::paginate(10);
            $actionUrl = route($this->prefix.'.update', $menuGroup->id);
            $title = $this->title;
            $prefix = $this->prefix;

            return view($this->prefix.'.create', compact('menuGroup', 'menuGroups', 'actionUrl', 'title', 'prefix'));

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function update(MenuGroup $menuGroup, UpdateMenuGroupRequest $request)
    {
        try {
            $menuGroup->title = $request->title;
            $menuGroup->tag = $request->tag;
            $saved = $menuGroup->save();

            if ( $saved ) {
                return redirect()->back()->with('success', 'Data Saved');
            } else {
                return redirect()->back()->with('failure', 'Data saving failed');
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function view(MenuGroup $menuGroup)
    {
        try {
            $title = $this->title;
            $prefix = $this->prefix;

            return view($this->prefix.'.view', compact('menuGroup', 'title', 'prefix'));
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function destroy(MenuGroup $menuGroup)
    {
        try {
            $deleted = $menuGroup->delete();

            if ($deleted) {
                return redirect()->route($this->prefix.'.index')->with('success', 'Record deleted');
            } else {
                return redirect()->route($this->prefix.'.index')->with('failure', 'Delete failed');
            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

}
