<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\MailgunService;

class MailController extends Controller
{
    protected MailgunService $mailer;

    public function __construct(MailgunService $mailer)
    {
        $this->mailer = $mailer;
    }

    public function test(Request $request, $eventId)
    {
        $this->mailer->configure(auth()->user()->email, 'No reply', 'no-reply@togoparts.com', 'test', 'test', 'text', 'tag');
        var_dump($this->mailer->send());
        die;
    }
}
