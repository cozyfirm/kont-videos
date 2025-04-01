<?php

namespace App\Mail\Episodes;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MessageUser extends Mailable{
    use Queueable, SerializesModels;
    public string $_subject, $_content, $_api_token;

    /**
     * Create a new message instance.
     */
    public function __construct($subject, $content, $api_token){
        $this->_subject = $subject;
        $this->_content = $content;
        $this->_api_token = $api_token;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('no-reply@fondacijaekipa.ba', 'NoReply EKIPA'),
            subject: $this->_subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'admin.app.episodes.notifications.message-user',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
