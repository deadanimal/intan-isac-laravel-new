<?php

namespace App\Mail;

use App\Models\MohonPenilaian;
use App\Models\NotifikasiEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PeringatanPenilaian extends Mailable
{
    use Queueable, SerializesModels;

    protected $calon;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($calon)
    {
        $this->calon = MohonPenilaian::where('id', $calon)->first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.peringatan_penilaian')->subject('ISAC - Peringatan Penilaian ISAC')->with([
            'nama_calon' => $this->calon->nama,
            'tarikh'=>$this->calon->tarikh_sesi,
        ]);
    }
}
