<div class="container mt-5">

    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($updateMode)
        @include('livewire.update-employee')
    @else
        @include('livewire.create-employee')
    @endif
    <div class="card mt-5">
        <div class="card-header">
            <h3 class="card-title">Employee List</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Date of Birth</th>
                            <th>Position</th>
                            <th>Salary</th>
                            <th>Joined Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->first_name }}</td>
                                <td>{{ $employee->last_name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->date_of_birth }}</td>
                                <td>{{ $employee->position }}</td>
                                <td>{{ $employee->salary }}</td>
                                <td>{{ $employee->joined_date }}</td>
                                <td>
                                    <button wire:click="edit({{ $employee->id }})"
                                        class="btn btn-danger btn-sm">edit</button>
                                </td>
                                <td>
                                    <button wire:click="delete({{ $employee->id }})"
                                        wire:confirm="Are you sure you want to delete this employee?"
                                        class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
