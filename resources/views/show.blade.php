<tr @if($hidden) hidden @endif>
        @foreach ($columns as $columnName)
            <td><p>{{ $user->$columnName }}</p></td>
        @endforeach
        @if($confirmation === $user->id )
            <td colspan="2">
                <p>are you sure?</p>
                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                        <button class="btn btn-danger"  wire:click="destroy">Yes, delete</button>
                        <button class="btn btn-success"  wire:click="cancel">No</button>
                    </div>
                </div>
            </td>
        @else
            <td><a class="btn btn-success" href="{{route('crudwire.user.edit', ['user' => $user->id])}} ">edit</a></td>
            <td><button class="btn btn-danger"  wire:click="kill">delete</button></td>
        @endif
</tr>
