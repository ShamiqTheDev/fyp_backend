<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMenuSectionRequest;
use App\Http\Requests\UpdateMenuSectionRequest;
use App\Models\MenuSection;
use Illuminate\Http\Request;

class MenuSectionController extends Controller
{

    private $title;
    private $prefix;

    public function __construct() {
        $this->title = 'Menu Section';
        $this->prefix = 'menusection';
    }
    public function index()
    {
        $menuSections = MenuSection::with('main_menu')->paginate(10);
        $title = $this->title;
        $prefix = $this->prefix;

        return view($this->prefix.'.index', compact('menuSections', 'title', 'prefix'));
    }

    public function create()
    {
        try {

            $menuSections = MenuSection::paginate(10);
            $actionUrl = route($this->prefix.'.store');
            $title = $this->title;
            $prefix = $this->prefix;

            return view($this->prefix.'.create', compact('menuSections', 'actionUrl', 'title', 'prefix'));

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function store(CreateMenuSectionRequest $request)
    {
        try {

            $menuSection = new MenuSection;

            $menuSection->main_menu_id = $request->main_menu_id;

            $menuSection->title = $request->title;
            $menuSection->link = $request->link;
            $menuSection->img_link = $request->img_link;
            $menuSection->html_class = $request->html_class;
            $menuSection->sort = $request->sort;
            $menuSection->type = $request->type;

            $saved = $menuSection->save();

            if ( $saved ) {
                return redirect()->back()->with('success', 'Data Saved');
            } else {
                return redirect()->back()->with('failure', 'Data saving failed');
            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function edit(MenuSection $menuSection)
    {
        try {

            $menuSections = MenuSection::paginate(10);
            $actionUrl = route($this->prefix.'.update', $menuSection->id);
            $title = $this->title;
            $prefix = $this->prefix;

            return view($this->prefix.'.create', compact('menuSection', 'menuSections', 'actionUrl', 'title', 'prefix'));

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function update(MenuSection $menuSection, UpdateMenuSectionRequest $request)
    {
        try {
            $menuSection->main_menu_id = $request->main_menu_id;

            $menuSection->title = $request->title;
            $menuSection->link = $request->link;
            $menuSection->img_link = $request->img_link;
            $menuSection->html_class = $request->html_class;
            $menuSection->sort = $request->sort;
            $menuSection->type = $request->type;

            $saved = $menuSection->save();

            if ( $saved ) {
                return redirect()->back()->with('success', 'Data Saved');
            } else {
                return redirect()->back()->with('failure', 'Data saving failed');
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function view($menuSectionId)
    {
        try {
            $menuSection = MenuSection::with('main_menu')->find($menuSectionId);
            $title = $this->title;

            return view($this->prefix.'.view', compact('menuSection', 'title'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function destroy(MenuSection $menuSection)
    {
        try {
            $deleted = $menuSection->delete();

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
