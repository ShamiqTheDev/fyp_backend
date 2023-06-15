<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMainMenuRequest;
use App\Http\Requests\UpdateMainMenuRequest;
use App\Models\MainMenu;
use Illuminate\Http\Request;

class MainMenuController extends Controller
{

    private $title;
    private $prefix;

    public function __construct() {
        $this->title = 'Main Menu';
        $this->prefix = 'mainmenu';
    }
    public function index()
    {
        $mainMenues = MainMenu::with('menu_group')->paginate(10);
        $title = $this->title;
        $prefix = $this->prefix;

        return view($this->prefix.'.index', compact('mainMenues', 'title', 'prefix'));
    }

    public function create()
    {
        try {

            $mainMenues = MainMenu::paginate(10);
            $actionUrl = route($this->prefix.'.store');
            $title = $this->title;
            $prefix = $this->prefix;

            return view($this->prefix.'.create', compact('mainMenues', 'actionUrl', 'title', 'prefix'));

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function store(CreateMainMenuRequest $request)
    {
        try {

            $mainMenu = new MainMenu;

            $mainMenu->menu_group_id = $request->menu_group_id;

            $mainMenu->title = $request->title;
            $mainMenu->link = $request->link;
            $mainMenu->html_class = $request->html_class;
            $mainMenu->sort = $request->sort;

            $saved = $mainMenu->save();

            if ( $saved ) {
                return redirect()->back()->with('success', 'Data Saved');
            } else {
                return redirect()->back()->with('failure', 'Data saving failed');
            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function edit(MainMenu $mainMenu)
    {
        try {

            $mainMenues = MainMenu::paginate(10);
            $actionUrl = route($this->prefix.'.update', $mainMenu->id);
            $title = $this->title;
            $prefix = $this->prefix;

            return view($this->prefix.'.create', compact('mainMenu', 'mainMenues', 'actionUrl', 'title', 'prefix'));

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function update(MainMenu $mainMenu, UpdateMainMenuRequest $request)
    {
        try {
            $mainMenu->menu_group_id = $request->menu_group_id;

            $mainMenu->title = $request->title;
            $mainMenu->link = $request->link;
            $mainMenu->html_class = $request->html_class;
            $mainMenu->sort = $request->sort;

            $saved = $mainMenu->save();

            if ( $saved ) {
                return redirect()->back()->with('success', 'Data Saved');
            } else {
                return redirect()->back()->with('failure', 'Data saving failed');
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function view($mainMenuId)
    {
        try {
            $mainMenu = MainMenu::with('menu_group')->find($mainMenuId);
            $title = $this->title;

            return view($this->prefix.'.view', compact('mainMenu', 'title'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function destroy(MainMenu $mainMenu)
    {
        try {
            $deleted = $mainMenu->delete();

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
