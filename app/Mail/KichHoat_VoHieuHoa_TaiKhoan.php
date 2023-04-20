<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class KichHoat_VoHieuHoa_TaiKhoan extends Mailable
{
  use Queueable, SerializesModels;
  public $data;
  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($data)
  {
    $this->data = $data;
  }

  public function build()
  {
    return $this->from('trinhb1910319@student.ctu.edu.vn')
      ->view('mails.kichhoat_vohieuhoa_taikhoan_mail')
      ->subject('Website quản lý viên chức');
  }
}
