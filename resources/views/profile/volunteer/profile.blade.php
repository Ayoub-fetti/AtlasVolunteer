<x-app>
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-5">Volunteer Profile</h1>
    
        <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- Profile Picture --}}
            <div class="mb-4">
                <label for="profile_picture" class="block text-sm font-medium text-gray-700">Profile Picture</label>
                <input type="file" id="profile_picture" name="profile_picture" 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @if(optional($volunteer)->profile_picture)
                    <img src="{{ asset('storage/' . $volunteer->profile_picture) }}" alt="Profile Picture" class="mt-2 w-32 h-32 object-cover rounded-md">
                @endif
                @error('profile_picture')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            {{-- Cover --}}
            <div class="mb-4">
                <label for="cover" class="block text-sm font-medium text-gray-700">Cover</label>
                <input type="file" id="cover" name="cover" 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @if(optional($volunteer)->cover)
                    <img src="{{ asset('storage/' . $volunteer->cover) }}" alt="Cover" class="mt-2 w-full h-32 object-cover rounded-md">
                @endif
                @error('cover')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
    
            {{-- Name --}}
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">name</label>
                <input type="text" id="name" name="name" value="{{ old('name', optional($user)->name) }}" 
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" readonly>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', optional($user)->email) }}" 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" readonly>
            </div>
    
            {{-- Phone --}}
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone', optional($user)->phone) }}" 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('phone')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            {{-- bio --}}
            <div class="mb-4">
                <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                <textarea id="bio" name="bio" 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('bio', optional($user)->bio) }}</textarea>
                @error('bio')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            
            {{-- Function --}}
            <div class="mb-4">
                <label for="function" class="block text-sm font-medium text-gray-700">Function</label>
                <input type="text" id="function" name="function" value="{{ old('function', optional($user)->function) }}" 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('function')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
    
            {{-- Address --}}
            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" id="address" name="address" value="{{ old('address', optional($user)->address) }}" 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('address')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
    
            {{-- City --}}
            <div class="mb-4">
                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                <input type="text" id="city" name="city" value="{{ old('city', optional($user)->city) }}" 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('city')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
    
            {{-- zip --}}
            <div class="mb-4">
                <label for="zip" class="block text-sm font-medium text-gray-700">Zip Code</label>
                <input type="text" id="zip" name="zip" value="{{ old('zip', optional($user)->zip) }}" 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('zip')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
    
            {{-- State --}}
            <div class="mb-4">
                <label for="state" class="block text-sm font-medium text-gray-700">State</label>
                <input type="text" id="state" name="state" value="{{ old('state', optional($user)->state) }}" 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('state')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
    
            {{-- Country --}}
            <div class="mb-4">
                <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                <input type="text" id="country" name="country" value="{{ old('country', optional($user)->country) }}" 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('country')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            {{-- Date of Birth --}}
            <div class="mb-4">
                <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of birth</label>
                <input type="date" id="date_of_birth" name="date_of_birth" 
                value="{{ old('date_of_birth', $volunteer->date_of_birth ? $volunteer->date_of_birth->format('Y-m-d') : '') }}" 
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('date_of_birth')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            {{-- skills --}}
            <div class="mb-4">
                <label for="skills" class="block text-sm font-medium text-gray-700">skills</label>
                <input type="text" id="skills" name="skills" value="{{ old('skills', optional($volunteer)->skills) }}" 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('skills')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            {{-- interests --}}
            <div class="mb-4">
                <label for="interests" class="block text-sm font-medium text-gray-700">Interests</label>
                <input type="text" id="interests" name="interests" value="{{ old('interests', optional($volunteer)->interests) }}" 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('interests')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            
            {{-- Social Media Links --}}
            <div class="grid grid-cols-2 gap-4">
                @foreach (['facebook', 'twitter', 'instagram', 'linkedin'] as $social)
                    <div class="mb-4">
                        <label for="{{ $social }}" class="block text-sm font-medium text-gray-700">{{ ucfirst($social) }}</label>
                        <input type="url" id="{{ $social }}" name="{{ $social }}" value="{{ old($social, optional($user)->$social) }}" 
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error($social)
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                @endforeach
            </div>
    
            {{-- Gender --}}
            <div class="mb-4">
                <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                <select id="gender" name="gender" 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="male" {{ old('gender', optional($volunteer)->gender) == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender', optional($volunteer)->gender) == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender', optional($volunteer)->gender) == 'other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('gender')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
    
            {{-- Submit Button --}}
            <button type="submit" 
                class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 transition">
                Save Profile
            </button>
        </form>
    </div>
    </x-app>
    