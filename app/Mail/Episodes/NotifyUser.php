<?php

namespace App\Mail\Episodes;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotifyUser extends Mailable
{
    use Queueable, SerializesModels;

    public string $_username, $_slug, $_episode_title, $_episode_description, $_presenter, $_presenter_description;

    /**
     * Create a new message instance.
     */
    public function __construct($username, $slug, $episode_title, $episode_description, $presenter, $presenter_description){
        $this->_username = $username;
        $this->_slug = $slug;
        $this->_episode_title = $episode_title;
        $this->_episode_description = $episode_description;
        $this->_presenter = $presenter;
        $this->_presenter_description = $presenter_description;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('no-reply@fondacijaekipa.ba', 'NoReply EKIPA'),
            subject: __('Nova epizoda KONT Masterclass serijala je online! '),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'admin.app.episodes.notifications.notify-user',
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
