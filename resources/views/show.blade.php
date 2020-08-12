<tr @if($hidden) hidden @endif>
    @if ($edit=== true)
        <td><p>{{ $user->id }}</p></td>
        <td>
            <input form="edituser"type="text" name="" id="" value="{{ $name }}"        wire:model="name">
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </td>
        <td>
            <input form="edituser"type="text" name="" id="" value="{{ $email }}"       wire:model="email">
            @error('email') <span class="error">{{ $message }}</span> @enderror
        </td>
        <td>
            <input form="edituser"type="text" name="" id="" value="{{ $email_verified_at}}"  wire:model="email_verified_at">
            @error('email_verified_at') <span class="error">{{ $message }}</span> @enderror
        </td>
        <td>
            <button class="btn btn-danger" wire:click="cancel">cancel</button>
        </td>
        <td>
            <form  wire:submit.prevent="submit" id="edituser" action="">
                <button class="btn btn-success" type="submit">save</button>
            </form>
        </td>
    @else
        <td><p>{{ $user->id }}</p></td>
        <td><p>{{ $user->name }}</p></td>
        <td><p>{{ $user->email }}</p></td>
        <td><p>{{ $user->email_verified_at }}</p></td>
        <td><button class="btn btn-success" wire:click="edit">edit</button></td>
        <td><button class="btn btn-danger"  wire:click="destroy">delete</button></td>
    @endif
</tr>
