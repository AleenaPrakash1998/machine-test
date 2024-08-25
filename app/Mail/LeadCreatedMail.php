<?php

namespace App\Mail;

use App\Models\Lead;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LeadCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $lead;

    public function __construct(Lead $lead)
    {
        $this->lead = $lead;
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Lead Created Mail',
        );
    }


    public function content(): Content
    {
        return new Content(
            view: 'pages.lead.email.index',
        );
    }


    public function attachments(): array
    {
        return [];
    }
}
