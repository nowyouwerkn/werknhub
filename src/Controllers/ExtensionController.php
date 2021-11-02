<?php

namespace Nowyouwerkn\WerknHub\Controllers;
use App\Http\Controllers\Controller;

use Session;
use Str;

use Nowyouwerkn\WerknHub\Models\Extensions;
use Illuminate\Http\Request;

class ExtensionController extends Controller
{

    public function index()
    {
        return view('werknhub::hub.index');
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
