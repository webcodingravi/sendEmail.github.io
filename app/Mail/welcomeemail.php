<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Contracts\Queue\ShouldQueue;

class welcomeemail extends Mailable
{
    use Queueable, SerializesModels;

    public $request;
    public $fileName;

    /**
     * Create a new message instance.
     */
    public function __construct($request, $fileName)
    {
        $this->request = $request;
        $this->fileName = $fileName;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Contact Form",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.emailSender',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $attachemnts = [];
         if($this->fileName) {
            $attachemnts = [
                Attachment::fromPath(public_path('/upload/'.$this->fileName))
            ];

            return $attachemnts;
         }
    }
}
