<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResourcesController extends Controller
{
    public function index()
    {
        return view('admin.resources.trainings');
    }

}
