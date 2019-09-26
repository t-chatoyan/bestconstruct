<?php

namespace App\Http\Controllers;

use App\Mail\OfferMail;
use App\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Validator;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::with('files')->paginate(7);

        if (view()->exists('admin.offer.list')) {
            return view('admin.offer.list', compact('offers'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'phone_number' => 'required',
            'email' => 'nullable|email',
            'message' => 'required',
        ]);

        if ($valid->fails()) {
            return response()->json(['errors' => $valid->errors()],400);
        }

        $offer = Offer::create($request->all());

        if ($request->hasFile('files')) {
            $files_array = [];
            $files = $request->file('files');
            foreach ($files as $file){
                $name = uniqid() . '.' . $file->getClientOriginalExtension();
                $path = public_path('/offer_files');
                $file->move($path, $name);
                array_push($files_array, ['name' => $name]);
            }
            $offer->files()->createMany($files_array);
        }
        Mail::to('info@bestconstruct.ru')->send(new OfferMail($offer));

        if ($offer) {
            return response()->json([
                'status'=> 'Ok',
                'message'=> 'success'
            ],200);
        }
        return response()->json([
            'status'=> 'Error',
            'message'=> 'error'
        ],400);
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
       //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offer = Offer::find($id);
        if ($offer) {
            $deleted_offer = $offer->delete();
            if ($deleted_offer){
                return redirect('admin/offer')->with('status', 'Offer deleted successfully!');
            }
        }
    }
}
