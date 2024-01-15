<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\admin\aboutsDataTable;
use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(aboutsDataTable $dataTable)
    {
        //
        $about = About::first();
        $page = 'about.index';
        return $dataTable->render('admin.layouts.master', compact('page', 'about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page = 'about.create';
        return view('admin.layouts.master', compact('page'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'containt' => ['required', 'string'],

        ]);
        $insert = new About();
        $insert->title = $request->title;
        $insert->containt = $request->containt;
        $insert->save();
        toastr('Created successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $about = About::findOrFail($id);
        $page = 'about.edit';
        return view('admin.layouts.master', compact('page', 'about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'containt' => ['required', 'string'],
            'about_title1' => ['required', 'string'],
            'about1' => ['required', 'string'],
            'about_title2' => ['required', 'string'],
            'about2' => ['required', 'string'],
            'about_title3' => ['required', 'string'],
            'about3' => ['required', 'string'],
            'about_title4' => ['required', 'string'],
            'about4' => ['required', 'string'],

        ]);
        $update = About::findOrFail($id);
        $update->title = $request->title;
        $update->containt = $request->containt;
        $update->about_title1 = $request->about_title1;
        $update->about1 = $request->about1;
        $update->about_title2 = $request->about_title2;
        $update->about2 = $request->about2;
        $update->about_title3 = $request->about_title3;
        $update->about3 = $request->about3;
        $update->about_title4 = $request->about_title4;
        $update->about4 = $request->about4;
        $update->save();
        toastr('Updated successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}