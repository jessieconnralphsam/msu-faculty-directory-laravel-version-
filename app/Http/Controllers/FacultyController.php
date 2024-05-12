<?php

namespace App\Http\Controllers;
use App\Models\Faculty; 

use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function search(Request $request)
    {
        $searchText = $request->input('search');
    
        $results = Faculty::where('name', 'like', '%' . $searchText . '%')->get();
    
        return view('search_results', compact('results'));
    }

}
