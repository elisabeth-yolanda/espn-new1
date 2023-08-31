<?php

namespace App\Http\Controllers;

use App\Mail\SendMessageContactEmail;
use Illuminate\Http\Request;
use App\Models\ContactUsMessage;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{
    public function sendMessage(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'subject' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
            ], 400);
        }

        // $data['message'] = $data['message'] . "\n\n" . $data['name'] . "\n" . $data['email'] . "\n" . $data['phone'];
        // $data['subject'] = 'Contact Us';
        // $data['email'] = '';
        // $data = ContactUsMessage::create($input);

//        Mail::to(env('MAIL_TO'))->send(new SendMessageContactEmail($input));

        try {
            Mail::to('corporate.secretary@elevenia.co.id')->send(new SendMessageContactEmail($input));
            return response()->json([
                'status' => true,
                'message' => 'Message sent successfully',
            ], 204);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'An error occurred while sending the email.',
                'error' => $e->getMessage(),
            ], 500);
        }


//        return response()->json([
//            'status' => true,
//            'message' => 'Message sent successfully',
//        ], 200);
    }

    public function index()
    {
        return view('contact_us.index');
    }

    public function dataTable(Request $request)
    {
        $data = ContactUsMessage::select('id', 'name', 'email', 'created_at', 'subject', 'message')
                        ->latest()
                        ->filter($request);

        return DataTables::of($data)
                            ->addindexColumn()
                           ->addColumn('submitted_at', function($data) {
                                 return $data->created_at->format('d F Y H:i:s');
                           })->rawColumns(['submitted_at'])
                           ->smart(true)
                           ->make(true);

    }
}
