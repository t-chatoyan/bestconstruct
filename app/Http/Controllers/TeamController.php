<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use Validator;
class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team_members = Team::paginate(7);

        if (view()->exists('admin.team.list')) {
            return view('admin.team.list', compact('team_members'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (view()->exists('admin.team.add')) {
            return view('admin.team.add');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $team_member = $request->all();

        $valid = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'profession' => 'required',
            'image' => 'required|image',
        ]);

        if ($valid->fails()) {
            return redirect()->route('team.create')->withErrors($valid)->withInput();
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = uniqid() . '.' . $image->getClientOriginalExtension();
            $path = public_path('/img/team');
            $image->move($path, $name);
            $team_member['image'] = $name;
        }

        $feedback = Team::create($team_member);

        if ($feedback){
            return redirect('admin/team')->with('status', 'Team member added successfully');
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
        $team_member = Team::find($id);

        if ($team_member) {
            return view('admin.team.edit', compact('team_member'));
        }
        return redirect('admin/team')->with('status', 'Team not found');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $valid = Validator::make($data, [
            'first_name' => 'required',
            'last_name' => 'required',
            'profession' => 'required',
            'image'=> 'nullable|image',
        ]);

        if ($valid->fails()) {
            return redirect()->route('feedback.create')->withErrors($valid)->withInput();
        }

        $team_member = Team::find($id);

        if ($team_member) {

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = uniqid().'.'.$image->getClientOriginalExtension();
                $path = public_path('/img/team');
                $image->move($path, $name);
                $data['image'] = $name;
            }
            $updated__feedback = $team_member->update($data);

            if ($updated__feedback) {
                return redirect('admin/team')->with('status', 'Team member updated successfully');
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
        $team_member = Team::find($id);
        if ($team_member) {
            $deleted_team_member = $team_member->delete();
            if ($deleted_team_member){
                return redirect('admin/team')->with('status', 'Team deleted successfully!');
            }
        }
    }
}
