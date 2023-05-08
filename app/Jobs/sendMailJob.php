<?php

namespace App\Jobs;

use App\Mail\MyFirstMail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class sendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $subject = 'Customized Mail by KT';
        $attachment = ['path'=> base_path(). Storage::url('app/public/career_banner.jpeg'),
                        'name' => 'Career',
                        'mime' => 'image/jpeg'];
        $data = ['name' => 'KT'];
        Mail::to('knowledgethrusters@gmail.com')->send(new MyFirstMail($subject, $attachment, $data));
        return 'success';
    }
}
