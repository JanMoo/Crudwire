<tr>
    <th>
        <label for="name">name:</label>
        <input placeholder="username" form="createuser" type="text" name="name" wire:model.lazy="name"required maxlength="255">
        @error('name') <span class="error">{{ $message }}</span> @enderror
    </th>
    <th>
        <label for="email">email:</label>
        <input placeholder="email" form="createuser" type="email" name="email" wire:model.lazy="email" required maxlength="255">
        @error('email') <span class="error">{{ $message }}</span> @enderror
    </th>
    <th>
        <label for="password">password:</label>
        <input placeholder="password" form="createuser" type="password" name="password" wire:model.lazy="password" required maxlength="255">
        @error('password') <span class="error">{{ $message }}</span> @enderror
    </th>
    <th>
        <label for="password_confirmation">confirm password:</label>
        <input placeholder="password_confirmation" form="createuser" type="password" name="password_confirmation" required wire:model.lazy="password_confirmation" maxlength="255">
        @error('password_confirmation') <span class="error">{{ $message }}</span> @enderror
    </th>
    <th colspan="2">
        <form action="" id="createuser" wire:submit.prevent="create">
            <button type="submit">create</button>
        </form>
    </th>
</tr>
