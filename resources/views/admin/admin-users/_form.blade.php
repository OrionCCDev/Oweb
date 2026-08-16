@if ($errors->any())
    <div class="bg-red-100 text-red-800 px-4 py-3 rounded-lg">
        <ul class="list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div>
    <label class="block text-sm font-medium text-gray-700 mb-2">Name *</label>
    <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" required class="w-full px-4 py-2 border rounded-lg">
</div>

<div>
    <label class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
    <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" required class="w-full px-4 py-2 border rounded-lg">
</div>

<div>
    <label class="block text-sm font-medium text-gray-700 mb-2">Role *</label>
    <select name="role" required class="w-full px-4 py-2 border rounded-lg">
        <option value="admin" {{ old('role', $user->role ?? 'admin') === 'admin' ? 'selected' : '' }}>Admin — manage site content</option>
        <option value="super_admin" {{ old('role', $user->role ?? '') === 'super_admin' ? 'selected' : '' }}>Super Admin — also manage other admin accounts</option>
    </select>
</div>

<div>
    <label class="block text-sm font-medium text-gray-700 mb-2">Password @isset($user)<span class="text-gray-400 font-normal">(leave blank to keep current)</span>@else *@endisset</label>
    <input type="password" name="password" class="w-full px-4 py-2 border rounded-lg" {{ isset($user) ? '' : 'required' }}>
</div>

<div>
    <label class="block text-sm font-medium text-gray-700 mb-2">Confirm Password @isset($user)@else *@endisset</label>
    <input type="password" name="password_confirmation" class="w-full px-4 py-2 border rounded-lg" {{ isset($user) ? '' : 'required' }}>
</div>
