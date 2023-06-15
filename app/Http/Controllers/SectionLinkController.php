<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSectionLinkRequest;
use App\Http\Requests\UpdateSectionLinkRequest;
use App\Models\SectionLink;
use Illuminate\Http\Request;

class SectionLinkController extends Controller
{

    private $title;
    private $prefix;

    public function __construct() {
        $this->title = 'Section Links';
        $this->prefix = 'sectionlink';
    }
    public function index()
    {
        $sectionLinks = SectionLink::with('menu_section')->paginate(10);
        $title = $this->title;
        $prefix = $this->prefix;

        return view($this->prefix.'.index', compact('sectionLinks', 'title', 'prefix'));
    }

    public function create()
    {
        try {

            $sectionLinks = SectionLink::paginate(10);
            $actionUrl = route($this->prefix.'.store');
            $title = $this->title;
            $prefix = $this->prefix;

            return view($this->prefix.'.create', compact('sectionLinks', 'actionUrl', 'title', 'prefix'));

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function store(CreateSectionLinkRequest $request)
    {
        try {

            $sectionLink = new SectionLink;

            $sectionLink->menu_section_id = $request->menu_section_id;

            $sectionLink->title = $request->title;
            $sectionLink->link = $request->link;
            $sectionLink->img_link = $request->img_link;
            $sectionLink->html_class = $request->html_class;
            $sectionLink->sort = $request->sort;

            $saved = $sectionLink->save();

            if ( $saved ) {
                return redirect()->back()->with('success', 'Data Saved');
            } else {
                return redirect()->back()->with('failure', 'Data saving failed');
            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function edit(SectionLink $sectionLink)
    {
        try {

            $sectionLinks = SectionLink::paginate(10);
            $actionUrl = route($this->prefix.'.update', $sectionLink->id);
            $title = $this->title;
            $prefix = $this->prefix;

            return view($this->prefix.'.create', compact('sectionLink', 'sectionLinks', 'actionUrl', 'title', 'prefix'));

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function update(SectionLink $sectionLink, UpdateSectionLinkRequest $request)
    {
        try {
            $sectionLink->menu_section_id = $request->menu_section_id;

            $sectionLink->title = $request->title;
            $sectionLink->link = $request->link;
            $sectionLink->img_link = $request->img_link;
            $sectionLink->html_class = $request->html_class;
            $sectionLink->sort = $request->sort;

            $saved = $sectionLink->save();

            if ( $saved ) {
                return redirect()->back()->with('success', 'Data Saved');
            } else {
                return redirect()->back()->with('failure', 'Data saving failed');
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function view($sectionLinkId)
    {
        try {
            $sectionLink = SectionLink::with('menu_section')->find($sectionLinkId);
            $title = $this->title;

            return view($this->prefix.'.view', compact('sectionLink', 'title'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function destroy(SectionLink $sectionLink)
    {
        try {
            $deleted = $sectionLink->delete();

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
