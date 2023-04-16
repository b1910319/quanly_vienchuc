<?php

namespace App\Jobs;

use Mail;
use App\Mail\Lop;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class LopEmail implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
  protected $data;
  protected $vienchuc;
  /**
   * Create a new job instance.
   *
   * @return void
   */
  public function __construct($data, $vienchuc)
  {
    $this->data = $data;
    $this->vienchuc = $vienchuc;
  }

  /**
   * Execute the job.
   *
   * @return void
   */
  public function handle()
  {
    foreach ($this->vienchuc as $vc) {
      Mail::to($vc->user_vc)->send(new Lop($this->data));
    }
  }
}
