<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;
use Validator;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = Feedback::paginate(7);

        if (view()->exists('admin.feedback.list')) {
            return view('admin.feedback.list', compact('feedbacks'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (view()->exists('admin.feedback.add')) {
            return view('admin.feedback.add');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $feedback = $request->all();

        $valid = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'position' => 'required',
            'image' => 'required|image',
            'description' => 'required',
        ]);

        if ($valid->fails()) {
            return redirect()->route('feedback.create')->withErrors($valid)->withInput();
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = uniqid() . '.' . $image->getClientOriginalExtension();
            $path = public_path('/img/clients');
            $image->move($path, $name);
            $feedback['image'] = $name;
        }

        $crated_feedback = Feedback::create($feedback);

        if ($crated_feedback){
            return redirect('admin/feedback')->with('status', 'Feedback added successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feedback = Feedback::find($id);

        if ($feedback) {
            return view('admin.feedback.edit', compact('feedback'));
        }
        return redirect('admin/feedback')->with('status', 'Feedback not found');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $new_feedback  = $request->all();

        $valid = Validator::make($new_feedback, [
            'first_name'=> 'required|max:255',
            'last_name'=> 'required|max:255',
            'position'=> 'required',
            'description'=> 'required',
            'image'=> 'nullable|image',
        ]);

        if ($valid->fails()) {
            return redirect()->route('feedback.create')->withErrors($valid)->withInput();
        }

        $feedback = Feedback::find($id);

        if ($feedback) {

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = uniqid().'.'.$image->getClientOriginalExtension();
                $path = public_path('/img/clients');
                $image->move($path, $name);
                $new_feedback['image'] = $name;
            }
            $updated__feedback = $feedback->update($new_feedback);

            if ($updated__feedback) {
                return redirect('admin/feedback')->with('status', 'Feedback updated successfully');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feedback = Feedback::find($id);
        if ($feedback) {
            $deleted_feedback = $feedback->delete();
            if ($deleted_feedback){
                return redirect('admin/feedback')->with('status', 'Feedback deleted successfully!');
            }
        }
    }
}
