<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function sectionIndex()
    {
        $sections = Section::get();
       // dd($sections);
        return view('admin.section.section_index')->with(compact('sections'));
    }
}
