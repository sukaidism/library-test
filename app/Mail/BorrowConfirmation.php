<?php

namespace App\Mail;

use App\Models\Book;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BorrowConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    // This public property makes the book data available to the email template
    public $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Library Receipt: ' . $this->book->title,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.borrow_confirmation', 
        );
    }
}
