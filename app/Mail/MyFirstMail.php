<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MyFirstMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;

    public $attachment;

    public $mailData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $attachment, $data)
    {
        //
        $this->subject = $subject;
        $this->attachment = $attachment;
        $this->mailData = $data;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'emails.firstMail',
            with:[
                'mailData' => $this->mailData
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return Attachment::fromPath($this->attachment['path'])->as($this->attachment['name'])->withMime($this->attachment['mime']);
        //return [];
    }
}
