<?php

namespace App\Mail\Frontend\Contact;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class SendDemo.
 */
class SendDemo extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Request
     */
    public $request;

    /**
     * SendDemo constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to(config('mail.from.address'), config('mail.from.name'))
            ->view('frontend.mail.demo')
            ->text('frontend.mail.demo-text')
            ->subject(__('strings.emails.demo.subject', ['app_name' => app_name()]))
            ->from($this->request->business_email, $this->request->first_name)
            ->replyTo($this->request->business_email, $this->request->first_name);
    }
}
