<?php

namespace App\Http\Controllers\Pages;

use FjordPages\ManagesFjordPages;
use Illuminate\Http\Request;

class BlogController
{
    use ManagesFjordPages;

    public function __invoke(Request $request, $slug)
    {
        $page = $this->getFjordPage($slug);

        return $page;
        // return view('pages.my-collection')->withPage($page);
    }
}
