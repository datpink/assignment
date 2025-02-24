<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TestSendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-send-mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data = ['name' => 'Tester'];

        Mail::send('mail', $data, function ($message) {
            $message->to('datgaming0210@gmail.com', 'Nguyễn Tiến Đạt')

                ->subject('Laravel Basic Testing Mail');
        });
    }
}
