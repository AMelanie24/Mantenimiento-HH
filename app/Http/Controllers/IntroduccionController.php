<?php

namespace App\Http\Controllers;

use App\Models\introduccion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IntroduccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('introduccion');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(introduccion $introduccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(introduccion $introduccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, introduccion $introduccion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(introduccion $introduccion)
    {
        //
    }
}
