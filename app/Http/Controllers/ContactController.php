<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Validator;

class ContactController extends Controller
{
    public function sendMessage(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'subject' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $message = $request->all();
        if ($valid->fails()) {
            return response()->json(['errors' => $valid->errors()],400);
        }

        Mail::to('info@bestconstruct.ru')->send(new ContactMail($message));

        if ($message) {
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
}
