<?php

namespace App\Http\Controllers;

use App\Section;
use App\Type;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
    public function index(Request $request) {
        $sections = Section::all();
        $types = Type::all();

        $data = [
            'sections' => $sections,
            'types' => $types
        ];

        return view('app', $data);
    }
}
