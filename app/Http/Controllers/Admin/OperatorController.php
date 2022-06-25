<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\Operator;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OperatorController extends Controller
{
    public function index()
    {
        try {
            $operators = Level::whereHas('operators', function($query) {
                $query->orderBy('level_id');
            })->get();
            return view('admin.operator.index', compact('operators'));
        } catch (Exception $error) {
            dd($error->getMessage());
            return redirect()->back()->with(['error_message' => 'Something went wrong on fetching data.']);
        }
    }

    public function create()
    {
        $operators = Operator::where('status', 1)->get();
        $levels = Level::where('status',1)->get();
        return view('admin.operator.create', compact('operators','levels'));
    }

    public function store(Request $request)
    {
        try {
            $level = Level::find($request->level);
            $level->operators()->attach($request->type);
            Session::flash('success_message', 'Operators is created successfully.');
            return redirect()->route('operator.index');
        } catch (Exception $error) {
            dd($error->getMessage());
            return redirect()->back()->with(['error_message' => 'Something went wrong on adding operator.']);
        }
    }

    public function edit($id)
    {
        try {
            $operators = Operator::where('status', 1)->get();
            $levelOperator = Level::where('id', $id)->with('operators')->first();
            $levels = Level::where('status',1)->get();
            return view('admin.operator.edit', compact('operators','levelOperator','levels'));
        } catch (Exception $error) {
            dd($error->getMessage());
            return redirect()->back()->with(['error_message' => 'Something went wrong on operator update.']);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $level = Level::find($id);
            $level->operators()->detach();
            $level->operators()->attach($request->type);
            Session::flash('success_message', 'Operators is updated successfully.');
            return redirect()->route('operator.index');
        } catch (Exception $error) {
            dd($error->getMessage());
            return redirect()->back()->with(['error_message' => 'Something went wrong on operator update.']);
        }
    }

    public function destroy($id)
    {
        try {
            $level = Level::find($id);
            $level->operators()->detach();
            Session::flash('success_message', 'Operator is deleted successfully.');
            return redirect()->route('operator.index');
        } catch (Exception $error) {
            dd($error->getMessage());
            return redirect()->back()->with(['error_message' => 'Something went wrong on operator delete.']);
        }
    }
}
