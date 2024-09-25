<?php

namespace App\Console\Commands;

use App\Mail\PaymentReminderMail;
use App\Models\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Exception;

class PaymentReminderNotification extends Command
{
    protected $signature = "app:payment-reminder-notification";
    protected $description = "Send payment reminder notifications to clients";

    public function handle()
    {
        $this->info('Starting payment reminder notifications...');

        try {
            $clients = $this->getClients();
            $this->processClients($clients);
        } catch (Exception $e) {
            $this->handleException($e);
        }

        $this->info('Payment reminder notifications completed.');
    }

    private function getClients()
    {
        return Client::whereNotNull('due_date')
            ->whereNotNull('email')
            ->get();
    }

    private function processClients($clients)
    {
        $sentCount = 0;
        $errorCount = 0;

        foreach ($clients as $client) {
            try {
                if ($this->shouldSendReminder($client)) {
                    $this->sendReminderEmail($client);
                    $sentCount++;
                }
            } catch (Exception $e) {
                $this->handleClientException($client, $e);
                $errorCount++;
            }
        }

        $this->info("Processed {$clients->count()} clients. Sent {$sentCount} reminders. Encountered {$errorCount} errors.");
    }

    private function shouldSendReminder(Client $client)
    {
        $dueDate = date("Y-m-01", $client->due_date->timestamp);
        return date("Y-m-d") === $dueDate || true;
    }

    private function sendReminderEmail(Client $client)
    {
        Mail::to($client->email)->send(new PaymentReminderMail($client));
        $this->info("Sent reminder to {$client->email}");
    }

    private function handleClientException(Client $client, Exception $e)
    {
        $message = "Error processing client {$client->id}: " . $e->getMessage();
        $this->error($message);
        Log::error($message);
    }

    private function handleException(Exception $e)
    {
        $message = "An error occurred: " . $e->getMessage();
        $this->error($message);
        Log::error($message);
    }
}
