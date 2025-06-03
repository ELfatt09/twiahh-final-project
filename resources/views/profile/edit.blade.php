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
        <h2 id="view-name" class="text-xl font-semibold text-gray-900">{{ $user->name ?: Auth::user()->name }}</h2>
      </div>
      <div class="flex gap-2">
        <p id="view-username" class="text-sm text-gray-600">{{ $user->email ?: Auth::user()->email }}</p>
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
                        <div class="mt-6 flex justify-center items-center w-full">
                        <div class="border border-primary w-10/12 rounded-md p-3 shadow-md">
                           <!-- User -->
                             <div class="flex items-center">                                
                                <!-- Username -->
                                <a href="{{ route('profile.show', $thread->author->id) }}" class="flex gap-1  ml-3 justify-center items-center space-x-2">
                                    <p class="text-lg font-semibold">
                                        {{ $thread->author->name }}
                                    </p>
                                    <p class="text-gray-500 text-xs">
                                        {{ $thread->author->email }}
                                    </p>
                                </a>
                             </div>
                            <!-- User -->

                            <!-- Content -->
                            <div class="mt-2 px-5">
                                <p>
                                    {{ $thread->body }}    
                                </p>
                                @if ($thread->repostedFrom != null)
                                    <div class="border border- rounded-md p-3 w-full my-2">
                           <!-- User -->
                             <div class="flex items-center">                                
                                <!-- Username -->
                                <div class="flex gap-1  ml-3 justify-center items-center space-x-2">
                                    <p class="text-lg font-semibold">
                                        {{ $thread->repostedFrom->author->name }}
                                    </p>
                                    <p class="text-gray-500 text-xs">
                                        {{ $thread->repostedFrom->author->email }}
                                    </p>
                                </div>
                             </div>
                            <!-- User -->

                            <!-- Content -->
                            <div class="mt-2 px-5">
                                <p>
                                    {{ $thread->repostedFrom->body }}    
                                </p>
                            </div>

                            <!-- Interaction -->
                             <div class="flex mt-4 mb-1 items-start justify-between gap-5 w-full px-5">
                                <div class="flex gap-4">
                                    <a href="{{ route('threads.show', $thread->repostedFrom->id) }}" class="cursor-pointer">
                                        <i class="fa-regular fa-heart text-black" id="likeIcon"></i>
                                        <span id="likeCount">{{ $thread->repostedFrom->likes->count() }}</span>
                                    </a>
                                </div>

                                <div class="flex gap-4">
                                    <a href="{{ route('threads.show', $thread->repostedFrom->id) }}" class="cursor-pointer">
                                        <i class="fa-solid fa-circle-info" id="detailIcon"></i>
                                        <span>Details</span>
                                    </a>
                                </div>
                                
                             </div>

                        </div>
                                @endif
                            </div>

                            <!-- Interaction -->
                             <div class="flex mt-4 mb-1 items-start justify-between gap-5 w-full px-5">
                                <div class="flex gap-4">
                                    <form action="{{ route('thread.like', $thread->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="thread_id" value="{{ $thread->id }}">
                                        <button class="cursor-pointer" type="submit">
                                            @if($thread->isLikedBy(auth()->user()))
                                                <i class="fa-solid fa-heart text-primary" id="likeIcon"></i>
                                            @else
                                                <i class="fa-regular fa-heart text-black" id="likeIcon"></i>

                                            @endif                                            
                                            <span id="likeCount">{{ $thread->likes->count() }}</span>
                                        </button>
                                    </form>
                                    <p class="cursor-pointer" onclick="openModal(null, {{ $thread->id }})">
                                        <i class="fa-solid fa-repeat" id="repostIcon"></i>
                                    </p>
                                </div>

                                <div class="flex gap-4">
                                    <a href="{{ route('threads.show', $thread->id) }}" class="cursor-pointer">
                                        <i class="fa-regular fa-reply" id="replyIcon"></i>
                                        <span id="replyCount">{{ $thread->replies->count() }}</span>
                                    </a>
                                </div>

                                                                <div class="flex gap-4">
                                    <a href="{{ route('threads.show', $thread->id) }}" class="cursor-pointer">
                                        <i class="fa-solid fa-circle-info" id="detailIcon"></i>
                                        <span>Details</span>
                                    </a>
                                </div>
                                
                                <div>
                                    <form action="{{ route('thread.save', $thread->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="thread_id" value="{{ $thread->id }}">
                                        <button class="cursor-pointer" type="submit">
                                            @if($thread->isBookMarkedBy(auth()->user()))
                                                <i class="fa-solid fa-bookmark text-primary" id="likeIcon"></i>
                                            @else
                                                <i class="fa-regular fa-bookmark text-black" id="likeIcon"></i>
                                            @endif
                                            <span id="likeCount">{{ $thread->saves->count() }}</span>
                                        </button>
                                    </form>
                                </div>
                             </div>

                        </div>
                    </div>
                    @endforeach
                    <!-- Single Post End -->

                    <!-- Single Post -->
                    
                    <!-- Single Post End -->
                    </div>
</x-app-layout>

