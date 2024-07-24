<form class="mt-4">
    <div class="row">
        <input type="hidden" wire:model="id">
        <div class="col-md-6">
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" id="first_name" placeholder="Enter First Name" wire:model="first_name">
                <small>
                    Character count: <span x-text="$wire.first_name.length"></span>
                </small>
                @error('first_name') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" id="last_name" placeholder="Enter Last Name" wire:model="last_name">
                @error('last_name') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter Email" wire:model="email">
                @error('email') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" id="phone" placeholder="Enter Phone" wire:model="phone">
                @error('phone') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="date_of_birth">Date of Birth:</label>
                <input type="date" class="form-control" id="date_of_birth" wire:model="date_of_birth">
                @error('date_of_birth') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="position">Position:</label>
                <input type="text" class="form-control" id="position" placeholder="Enter Position" wire:model="position">
                @error('position') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="salary">Salary:</label>
                <input type="number" step="0.01" class="form-control" id="salary" placeholder="Enter Salary" wire:model="salary">
                @error('salary') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="joined_date">Joined Date:</label>
                <input type="date" class="form-control" id="joined_date" wire:model="joined_date">
                @error('joined_date') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>

    <br>

    <button wire:click.prevent="update()" class="btn btn-primary">Update</button>
</form>
