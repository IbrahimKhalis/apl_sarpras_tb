<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PeminjamanMail extends Mailable
{
    use Queueable, SerializesModels;
    public $kode;
    public $status;
    public $ket;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($kode, $status = 'pengajuan', $ket = '')
    {
        $this->kode = $kode;
        $this->status = $status;
        $this->ket = $ket;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Peminjaman',
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
            view: 'peminjaman_public.mail',
            with: [
                'kode' => $this->kode,
                'status' => $this->status,
                'ket' => $this->ket,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
