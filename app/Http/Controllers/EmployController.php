<?php

namespace App\Http\Controllers;

use App\Models\employ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Expr\Empty_;

class EmployController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $employ = new Employ();

        $employ->name = $request->name;
        $employ->mobile = $request->mobile;
        $employ->email = $request->email;
        $employ->address = $request->address;
        $employ->save();

        return redirect()->route('employ.all')->with('success', 'Employ added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employ  $employ
     * @return \Illuminate\Http\Response
     */
    public function allEmploy()
    {
        $employs = Employ::get();
        return view('dashboard.allemploy', compact('employs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employ  $employ
     * @return \Illuminate\Http\Response
     */
    public function editEmploy($id)
    {
        $employ = Employ::find($id);
        return view('dashboard.edit', compact('employ'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employ  $employ
     * @return \Illuminate\Http\Response
     */
    public function updateEmploy(Request $request)
    {
        $employ = Employ::find($request->id);

        $employ->name = $request->name;
        $employ->mobile = $request->mobile;
        $employ->email = $request->email;
        $employ->address = $request->address;
        $employ->update();

        return redirect()->route('employ.all')->with('success', 'Employ Update successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employ  $employ
     * @return \Illuminate\Http\Response
     */
    public function deleteEmploy($id)
    {
        Employ::where('id', $id)->delete();
        return redirect()->route('employ.all')->with('success', 'Employ recode deleted successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employ  $employ
     * @return \Illuminate\Http\Response
     */
    public function sendEmail($id)
    {
        $employ = Employ::find($id);

        $data = [
            'name' => $employ->name,
            'mobile' => $employ->mobile,
        ];

        Mail::plain('dashboard.sendEmail', $data, function ($message) use ($employ) {
            $message->from(Auth::user()->email, Auth::user()->name);
            $message->to($employ->email, $employ->name);
            $message->subject('Demo Mail');
        });

        return redirect()->route('employ.all')->with('success', 'Employ Mail send successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employ  $employ
     * @return \Illuminate\Http\Response
     */
    public function show(employ $employ)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employ  $employ
     * @return \Illuminate\Http\Response
     */
    public function edit(employ $employ)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employ  $employ
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, employ $employ)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employ  $employ
     * @return \Illuminate\Http\Response
     */
    public function destroy(employ $employ)
    {
        //
    }
}
