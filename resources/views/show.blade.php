<tr @if($hidden) hidden @endif>

        <td><p>{{ $user->id }}</p></td>
        <td><p>{{ $user->name }}</p></td>
        <td><p>{{ $user->email }}</p></td>
        <td><p>{{ $user->email_verified_at }}</p></td>
        <td><a class="btn btn-success" wire:click="edit" href="crudwire/user/{{$user->id}}">edit</a></td>
        <td><button class="btn btn-danger"  wire:click="destroy">delete</button></td>

</tr>
