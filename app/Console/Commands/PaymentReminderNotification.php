<?php

namespace App\Console\Commands;

use App\Mail\PaymentReminderMail;
use App\Models\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class PaymentReminderNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "app:payment-reminder-notification";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Command description";

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $clients = Client::all();
        foreach ($clients as $client) {
            if ($client->due_date && $client->email) {
                $date = date("Y-m-01", $client->due_date->timestamp);
                if (date("Y-m-d") === $date) {
                    Mail::to($client->email)->send(
                        new PaymentReminderMail($client)
                    );
                }
            }
        }
    }
}
