<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\admin\PackageDataTable;
use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $folder = 'package';

    public function index(PackageDataTable $dataTable)
    {
        $folder = $this->folder;
        $page = $this->folder . '.index';
        return $dataTable->render('admin.layouts.master', compact('page', 'folder'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $folder = $this->folder;
        $page = $folder . '.create';
        return view('admin.layouts.master', compact('page', 'folder', 'page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);
        $insert = new Package();
        $insert->name = $request->name;
        $insert->save();
        return redirect()->route('admin.package.index')->with('success', 'Package created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Package::findOrFail($id);
        $folder = $this->folder;
        $page = $folder . '.edit';
        return view('admin.layouts.master', compact('page', 'folder', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        // Create the offer
        $package = Package::findOrFail($id);
        $package->name = $request->name;
        $package->save();


        return redirect()->route('admin.package.index')->with('success', 'Package updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Package::findOrFail($id);
        $data->delete();
        return response(['status' => '1', 'message' => 'Deleted Successfully']);
    }
}
