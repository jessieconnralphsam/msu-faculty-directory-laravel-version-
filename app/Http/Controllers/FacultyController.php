<?php

namespace App\Http\Controllers;

use App\Models\Faculty; 
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    /**
     * Handles the search functionality for faculties.
     *
     * @param Request $request The incoming HTTP request containing the search query.
     * @return \Illuminate\View\View The view displaying the search results.
     */
    
    public function search(Request $request)
    {
        // Retrieve the search query from the request
        $searchText = $request->input('search');
        
        // Search for faculties where the name matches the search query (case insensitive)
        // '%' . $searchText . '%' is used for partial matching (contains)
        $results = Faculty::where('name', 'like', '%' . $searchText . '%')->get();
        
        // Return the view 'search_results' and pass the search results to it
        return view('search_results', compact('results'));
    }
}
