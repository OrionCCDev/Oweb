@extends('layouts.admin')
@section('title', 'Contact Settings')
@section('content')
<div class="max-w-4xl mx-auto">
    <h2 class="text-2xl font-bold mb-6">Contact & Social Media Settings</h2>
    <form action="{{ route('admin.settings.contact.update') }}" method="POST" class="bg-white rounded-lg shadow p-6 space-y-6">
        @csrf
        <div class="border-b pb-4">
            <h3 class="text-lg font-semibold mb-4">Contact Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                    <input type="text" name="phone" value="{{ $settings['phone'] ?? '' }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" value="{{ $settings['email'] ?? '' }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
            </div>
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                <textarea name="address" rows="2" class="w-full px-4 py-2 border rounded-lg">{{ $settings['address'] ?? '' }}</textarea>
            </div>
        </div>
        
        <div>
            <h3 class="text-lg font-semibold mb-4">Social Media Links</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Facebook</label>
                    <input type="url" name="facebook" value="{{ $settings['facebook'] ?? '' }}" placeholder="https://facebook.com/..." class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Twitter</label>
                    <input type="url" name="twitter" value="{{ $settings['twitter'] ?? '' }}" placeholder="https://twitter.com/..." class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">LinkedIn</label>
                    <input type="url" name="linkedin" value="{{ $settings['linkedin'] ?? '' }}" placeholder="https://linkedin.com/..." class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Instagram</label>
                    <input type="url" name="instagram" value="{{ $settings['instagram'] ?? '' }}" placeholder="https://instagram.com/..." class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">YouTube</label>
                    <input type="url" name="youtube" value="{{ $settings['youtube'] ?? '' }}" placeholder="https://youtube.com/..." class="w-full px-4 py-2 border rounded-lg">
                </div>
            </div>
        </div>
        
        <div class="flex justify-end pt-4">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save Changes</button>
        </div>
    </form>
</div>
@endsection
