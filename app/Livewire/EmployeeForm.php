<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employee;
use Illuminate\Validation\Rule;

class EmployeeForm extends Component
{
    public $employee_id, $employees, $first_name, $last_name, $email,
        $phone, $date_of_birth, $position, $salary, $joined_date;

    public $updateMode = false;

    /**
     * Retrieves all employees from the database and returns the view for the Livewire employee component.
     *
     * @return \Illuminate\Contracts\View\View The rendered view for the Livewire employee component.
     */
    public function render()
    {
        $this->employees = Employee::all();

        return view('livewire.employee');
    }

    /**
     * Store a new employee in the database.
     *
     * @return void
     */
    public function store()
    {
        $this->validate($this->rules());

        Employee::create($this->modelData());

        session()->flash('message', 'Employee created successfully.');

        $this->resetInputFields();
    }

    /**
     * Resets the input fields of the employee form.
     *
     * @return void
     */
    private function resetInputFields()
    {
        $this->reset(['first_name', 'last_name', 'email', 'phone', 'date_of_birth', 'position', 'salary', 'joined_date']);
    }

    /**
     * Edit an employee by their ID.
     *
     * @param int $id The ID of the employee to edit.
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the employee with the given ID is not found.
     *
     * @return void
     */
    public function edit(int $id)
    {
        $employee = Employee::findOrFail($id);

        $this->fill($employee->toArray());

        $this->employee_id = $employee->id;

        $this->updateMode = true;
    }

    /**
     * Updates an existing employee record in the database.
     *
     * @return void
     */
    public function update()
    {
        $this->validate($this->rules(true));

        $employee = Employee::findOrFail($this->employee_id);

        $employee->update($this->modelData());

        $this->updateMode = false;

        session()->flash('message', 'Employee Updated Successfully.');

        $this->resetInputFields();
    }

    /**
     * Deletes an employee with the given ID.
     *
     * @param int $id The ID of the employee to delete.
     *
     * @return void
     */
    public function delete(int $id)
    {
        Employee::findOrFail($id)->delete();

        session()->flash('message', 'Employee Deleted Successfully.');
    }

    /**
     * Get the validation rules.
     *
     * @param bool $update Whether the validation rules are for an update.
     * @return array
     */
    protected function rules(bool $update = false): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                $update ? Rule::unique('employees')->ignore($this->employee_id) : 'unique:employees',
            ],
            'phone' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'position' => 'nullable|string|max:255',
            'salary' => 'nullable|numeric',
            'joined_date' => 'nullable|date',
        ];
    }

    /**
     * Get the model data.
     *
     * @return array
     */
    protected function modelData(): array
    {
        return [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'date_of_birth' => $this->date_of_birth,
            'position' => $this->position,
            'salary' => $this->salary,
            'joined_date' => $this->joined_date,
        ];
    }
}
