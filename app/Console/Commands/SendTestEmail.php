<?php

namespace App\Console\Commands;

use App\Mail\TestEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendTestEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-test-email
        {--to=test@example.com : Email which we will send the email to}
        {--text=Hello world! : Text to send}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send test email to check if everything works okay.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Mail::to($this->option('to'))->send(new TestEmail($this->option('text')));

        $this->output->info("📩 Email sent!");
    }
}
