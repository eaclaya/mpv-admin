<?php

namespace App\Livewire;

use App\Models\Client;
use Livewire\Component;

class ClientForm extends Component
{
    public $client;
    public $name;
    public $domain;
    public $dueDate;

    protected $rules = [
        "name" => "required",
        "domain" => "required",
        "dueDate" => "nullable|date",
    ];

    public function saveClient()
    {
        $validated = $this->validate();
        $validated["due_date"] = empty($validated["dueDate"])
            ? null
            : $validated["dueDate"];

        if ($this->client->id) {
            $this->client->update($validated);

            session()->flash("message", "Client updated successfully.");
        } else {
            Client::create($validated);

            session()->flash("message", "Client created successfully.");
        }

        return redirect()->route("clients.index");
    }

    public function mount()
    {
        $this->name = $this->client->name;
        $this->domain = $this->client->domain;
        $this->dueDate = $this->client->due_date?->format("Y-m-d");
    }

    public function render()
    {
        return view("livewire.client-form");
    }
}
