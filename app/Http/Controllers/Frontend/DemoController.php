<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\Frontend\Demo\SendDemo;
use App\Http\Requests\Frontend\Demo\SendDemoRequest;

/**
 * Class DemoController.
 */
class DemoController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.demo');
    }

    /**
     * @param SendDemoRequest $request
     *
     * @return mixed
     */
    public function send(SendDemoRequest $request)
    {
        Mail::send(new SendDemo($request));

        return redirect()->back()->withFlashSuccess(__('alerts.frontend.demo.sent'));
    }
}
