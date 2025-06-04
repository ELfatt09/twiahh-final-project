<x-app-layout>

      <div class="w-11/12 mx-auto bg-teritary p-6 rounded-2xl shadow-md">

        <!-- Tabs -->
        @if ($user?->id == Auth::user()->id)
          <div class="flex gap-2 mb-6">
          <button id="btn-view" onclick="showTab('view-tab')" class="bg-transparent border border-secondary text-black px-4 py-2 rounded-full hover:bg-transparent hover:border-secondary hover:text-secondary transition duration-300">View</button>
          <button id="btn-edit" onclick="showTab('edit-tab')" class="bg-primary text-black border border-primary px-4 py-2 rounded-full hover:bg-transparent hover:border-secondary hover:text-secondary transition duration-300">Edit</button>
        </div>
        @endif
    <div id="view-tab">
        @if ($user?->id != Auth::user()->id)
            <form method="POST" action="{{ route('profile.follow', $user->id ?: Auth::user()->id) }}" class="flex items-center space-x-4">
    @csrf
    <div>
      <div class="flex gap-2 items-center">
        <h2 id="view-name" class="text-xl font-semibold text-gray-900">{{ $user ? $user->name : Auth::user()->name }}</h2>
      </div>
      <div class="flex gap-2">
        <p id="view-username" class="text-sm text-gray-600">{{ $user ? $user->email : Auth::user()->email }}</p>
      </div>
    </div>
    <input type="hidden" name="follow_id" value="{{ $user->id ?: Auth::user()->id }}">
    <button type="submit" class="ml-4 px-4 py-2 rounded-full {{ $user->isFollowedByUser(Auth::id()) ? 'text-secondary bg-transparent' : 'bg-primary text-white' }}">
      {{ $user->isFollowedByUser(Auth::id()) ? 'Unfollow' : 'Follow' }}
    </button>
  </form>
        @endif
  <div class="mt-6 grid grid-cols-3 text-center text-sm text-gray-700">
  <div>
    <p class="font-bold text-lg">{{ $user ? $user->threads->count() : Auth::user()->threads->count() }}</p>
    <span>Posts</span>
  </div>
  <div class="cursor-pointer" onclick="toggleList('followers-list')">
    <p id="followers-count" class="font-bold text-lg">{{ $user ? $user->followers->count() : Auth::user()->followers->count() }}</p>
    <span>Followers</span>
  </div>
  <div class="cursor-pointer" onclick="toggleList('following-list')">
    <p id="following-count" class="font-bold text-lg">{{ $user ? $user->follows->count() : Auth::user()->following->count() }}</p>
    <span>Following</span>
  </div>
</div>
    </div>
    <div id="edit-tab" class="hidden" >
        <div id="edit-form" class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
    
      </div>
      <div class="flex flex-col justify-center items-center w-full" id="forYou">
                    <!-- Single Post -->
                    @foreach ($user ? $user->threads : Auth::user()->threads as $thread)
                        <x-thread :$thread />
                    @endforeach
                    <!-- Single Post End -->

                    <!-- Single Post -->
                    
                    <!-- Single Post End -->
                    </div>
</x-app-layout>

