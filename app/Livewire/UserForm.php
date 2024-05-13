<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UserForm extends Component
{
    public $user;
    public $name;
    public $email;
    public $password;

    protected function rules()
    {
        $rules = [
            "name" => "required",
            "email" => "required|unique:users,email",
            "password" => "required|min:8",
        ];

        if ($this->user->id) {
            $rules["email"] = "required|unique:users,email," . $this->user->id;
            $rules["password"] = "sometimes|nullable|min:8";
        }

        return $rules;
    }

    public function saveUser()
    {
        $validated = $this->validate();

        if ($this->user->id) {
            if (empty(data_get($validated, "password"))) {
                unset($validated["password"]);
            }

            $this->user->update($validated);

            session()->flash("message", "User updated successfully.");
        } else {
            User::create($validated);

            session()->flash("message", "User created successfully.");
        }

        return redirect()->route("users.index");
    }

    public function mount()
    {
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    public function render()
    {
        return view("livewire.user-form");
    }
}
