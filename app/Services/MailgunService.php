<?php

namespace App\Services;

class MailgunService
{
    protected string $baseUrl;

    protected string $key;

    protected array $data;

    public function configure($to, $mailfromname, $mailfrom, $subject, $html, $text, $tag) : void
    {
        $this->baseUrl = config('app.mailgun_url');

        $this->key = config('app.mailgun_key');

        $this->data = [
            'from'=> $mailfromname .'<'.$mailfrom.'>',
            'to'=>$to,
            'bcc'=>'alerts@togoparts.com',
            'subject'=>$subject,
            'html'=>$html,
            'text'=>$text,
            'o:tracking'=>'yes',
            'o:tracking-clicks'=>'yes',
            'o:tracking-opens'=>'yes',
            'o:tag'=>$tag,
            'h:Reply-To'=>'no-reply@togoparts.com '
        ];
    }

    public function send($file = null, string $fileName = '') : mixed
    {
        $session = curl_init($this->baseUrl . '/messages');

        if ($file !== null && $fileName !== '') {
            $this->data['attachment'] = curl_file_create($file, 'application/pdf', $fileName);
        }

        curl_setopt($session, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($session, CURLOPT_USERPWD, 'api:' . $this->key);
        curl_setopt($session, CURLOPT_POST, true);

        curl_setopt($session, CURLOPT_POSTFIELDS, $this->data);
        curl_setopt($session, CURLOPT_HEADER, false);

        curl_setopt($session, CURLOPT_ENCODING, 'UTF-8');
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($session);
        curl_close($session);
        var_dump($response); die;

        return json_decode($response, true);
    }
}
