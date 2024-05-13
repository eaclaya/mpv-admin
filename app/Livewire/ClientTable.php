<?php

namespace App\Livewire;

use App\Models\Client;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;
use Livewire\Attributes\On;

final class ClientTable extends PowerGridComponent
{
    use WithExport;
    protected $selectedRowId;

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make("export")
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()->showPerPage()->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Client::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()->add("id")->add("created_at");
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id"),
            Column::make("Name", "name")->sortable()->searchable(),
            Column::make("Domain", "domain")->sortable()->searchable(),
            Column::action("Action"),
        ];
    }

    public function filters(): array
    {
        return [];
    }

    #[On("edit")]
    public function edit($rowId): void
    {
        $this->js("alert(" . $rowId . ")");
    }

    public function actions(Client $row): array
    {
        return [
            Button::add("edit")
                ->slot("Edit")
                ->class(
                    "bg-blue-500 text-white py-2 px-3 rounded-md flex text-sm"
                )
                ->route("clients.edit", ["client" => $row->id]),

            Button::add("delete-button")->bladeComponent("delete-button", [
                "id" => $row->id,
            ]),
        ];
    }

    public function confirmDelete($rowId)
    {
        $this->dispatch("showDeleteConfirmation", [
            "id" => $rowId,
        ]);
    }

    #[On("delete")]
    public function delete($params)
    {
        $client = Client::findOrFail(data_get($params, "id"));
        $client->delete();

        session()->flash("message", "Client deleted successfully.");

        return redirect()->route("clients.index");
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
