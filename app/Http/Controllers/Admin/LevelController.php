<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class LevelController extends Controller
{
    public function index() 
    {
        try {
            $levels = Level::all();
            return view('admin.level.index', compact('levels'));
        } catch (Exception $error) {
            dd($error->getMessage());
            return redirect()->back()->with(['error_message' => 'Something went wrong.']);
        }
    }

    public function create()
    {
        return view('admin.level.create');
    }

    public function store(Request $request)
    {
        try {
            Level::create([
                'name' => Str::ucfirst($request['level']),
                'slug' => Str::slug($request['level']),
                'status' => $request['status']
            ]);
            Session::flash('success_message', 'Level is created successfully.');
            return redirect()->route('level.index');
        } catch (Exception $error) {
            dd($error->getMessage());
            return redirect()->back()->with(['error_message' => 'Something went wrong on adding level.']);
        }
    }
    
    public function edit($id)
    {
        $level = Level::findOrFail($id);
        return view('admin.level.edit', compact('level'));
    }

    public function update(Request $request, $id)
    {
        try {
            $level = Level::find($id);
            $level->update([
                'name' => Str::ucfirst($request['level']),
                'slug' => Str::slug($request['level']),
                'status' => $request['status']
            ]);
            Session::flash('success_message', 'Level is updated successfully.');
            return redirect()->route('level.index');
        } catch (Exception $error) {
            dd($error->getMessage());
            return redirect()->back()->with(['error_message' => 'Something went wrong on level update.']);
        }
    }

    public function destroy($id)
    {
        try {
            $level = Level::find($id);
            $level->delete();
            Session::flash('success_message', 'Level is deleted successfully.');
            return redirect()->route('level.index');
        } catch (Exception $error) {
            dd($error->getMessage());
            return redirect()->back()->with(['error_message' => 'Something went wrong on level delete.']);
        }
    }
}
