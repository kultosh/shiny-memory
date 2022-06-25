<?php

namespace App\Http\Controllers\Admin;

use App\Constants\SelectAnswer as ConstantsSelectAnswer;
use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Level;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AnswerController extends Controller
{
    public function index()
    {
        $answers = Answer::with('level')->get();
        return view('admin.answer.index', compact('answers'));
    }

    public function create()
    {
        try {
            $levels = Level::where('status', 1)->get();
            $options = ConstantsSelectAnswer::SELECT_ANSWER;
            return view('admin.answer.create', compact('levels','options'));
        } catch (Exception $error) {
            dd($error->getMessage());
            return redirect()->back()->with(['error_message' => 'Something went wrong on creating answer.']);
        }
    }

    public function store(Request $request)
    {
        try {
            $list = $this->randomNumber($request);
            $random = collect($list)->shuffle();
            Answer::create([
                'level_id' => $request['level'],
                'value' =>json_encode($random),
                'answer' => json_encode($request->answer),
                'selected' => $request['select_answer'],
                'status' => $request->status
            ]);
            Session::flash('success_message', 'Answer is created successfully.');
            return redirect()->route('answer.index');
        } catch (Exception $error) {
            dd($error->getMessage());
            return redirect()->back()->with(['error_message' => 'Something went wrong on adding answer.']);
        }
    }

    public function edit($id)
    {
        try {
            $levels = Level::where('status', 1)->get();
            $answer = Answer::with('level')->where('id', $id)->first();
            $answer->answer = json_decode($answer->answer);
            $options = ConstantsSelectAnswer::SELECT_ANSWER;
            return view('admin.answer.edit', compact('answer','levels','options'));
        } catch (Exception $error) {
            dd($error->getMessage());
            return redirect()->back()->with(['error_message' => 'Something went wrong on editing answer.']);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $list = $this->randomNumber($request);
            $random = collect($list)->shuffle();
            $answer = Answer::find($id);
            $answer->update([
                'level_id' => $request['level'],
                'value' =>json_encode($random),
                'answer' => json_encode($request->answer),
                'selected' => $request['select_answer'],
                'status' => $request->status
            ]);
            Session::flash('success_message', 'Answer is updated successfully.');
            return redirect()->route('answer.index');
        } catch (Exception $error) {
            dd($error->getMessage());
            return redirect()->back()->with(['error_message' => 'Something went wrong on answer update.']);
        }
    }

    public function destroy($id)
    {
        try {
            $answer = Answer::find($id);
            $answer->delete();
            Session::flash('success_message', 'Answer is deleted successfully.');
            return redirect()->route('answer.index');
        } catch (Exception $error) {
            dd($error->getMessage());
            return redirect()->back()->with(['error_message' => 'Something went wrong on answer delete.']);
        }
    }

    private function randomNumber($request) {
        $ranges = range(1, 99);
        $list = [];
        foreach($request->answer as $index => $answer)
        {
            $list[$index]['value'] = $answer;
            $list[$index]['selected'] = ($request->select_answer == ($index+1)) ? true : false; 
            $ranges = array_diff($ranges, array($answer));
        }
        $ranges = collect($ranges)->shuffle()->slice(0,4);
        $count = 4;
        foreach($ranges as $index => $range)
        {
            $count = $count + 1;
            $list[$count]['value'] = $range;
            $list[$count]['selected'] = false; 
        }
        return $list;
    }

}
