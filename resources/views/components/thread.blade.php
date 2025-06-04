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
            @if ($thread->media != null)
            <div class="mt-3 mb-2 w-full flex justify-center items-center bg-gray-200 rounded-md">
                <img src="{{ asset('storage/' . $thread->media->path) }}" class="h-full max-h-80 w-auto object-cover">
            </div>
            @endif
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
                                    @if ($thread->repostedFrom->media != null)
            <div class="mt-3 mb-2 w-full flex justify-center items-center bg-gray-200 rounded-md">
                <img src="{{ asset('storage/' . $thread->repostedFrom->media->path) }}" class="h-full max-h-80 w-auto object-cover">
            </div>
            @endif
                        <p>
                            {{ $thread->repostedFrom->body }}
                        </p>
                    </div>
                    <div class="flex mt-4 mb-1 items-start justify-between gap-5 w-full px-5">
                                <div class="flex gap-4">
                                    <form action="{{ route('thread.like', $thread->repostedFrom->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="thread_id" value="{{ $thread->repostedFrom->id }}">
                                        <button class="cursor-pointer" type="submit">
                                            @if($thread->repostedFrom->isLikedBy(auth()->user()))
                                                <i class="fa-solid fa-heart text-primary" id="likeIcon"></i>
                                            @else
                                                <i class="fa-regular fa-heart text-black" id="likeIcon"></i>
                                            @endif                                            
                                            <span id="likeCount">{{ $thread->repostedFrom->likes->count() }}</span>
                                        </button>
                                    </form>
                                    <p class="cursor-pointer" onclick="openModal(null, {{ $thread->repostedFrom->id }})">
                                        <i class="fa-solid fa-repeat" id="repostIcon"></i>
                                    </p>
                                </div>

                                <div class="flex gap-4">
                                    <a href="{{ route('threads.show', $thread->repostedFrom->id) }}" class="cursor-pointer">
                                        <i class="fa-regular fa-reply" id="replyIcon"></i>
                                        <span id="replyCount">{{ $thread->repostedFrom->replies->count() }}</span>
                                    </a>
                                </div>

                                <div class="flex gap-4">
                                    <a href="{{ route('threads.show', $thread->repostedFrom->id) }}" class="cursor-pointer">
                                        <i class="fa-solid fa-circle-info" id="detailIcon"></i>
                                        <span>Details</span>
                                    </a>
                                </div>
                                
                                <div>
                                    <form action="{{ route('thread.save', $thread->repostedFrom->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="thread_id" value="{{ $thread->repostedFrom->id }}">
                                        <button class="cursor-pointer" type="submit">
                                            @if($thread->repostedFrom->isBookMarkedBy(auth()->user()))
                                                <i class="fa-solid fa-bookmark text-primary" id="likeIcon"></i>
                                            @else
                                                <i class="fa-regular fa-bookmark text-black" id="likeIcon"></i>
                                            @endif
                                            <span id="likeCount">{{ $thread->repostedFrom->saves->count() }}</span>
                                        </button>
                                    </form>
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
                                    <p class="cursor-pointer" onclick="openModalReply({{ $thread->id }})">
                                        <i class="fa-regular fa-reply" id="replyIcon"></i>
                                        <span id="replyCount">{{ $thread->replies->count() }}</span>
                                    </p>
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
                                @if(Auth::user()->is_admin or Auth::user()->id == $thread->user_id)
                                    <form action="{{ route('threads.destroy') }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="thread_id" value="{{ $thread->id }}">
                                        <button class="cursor-pointer text-red-500 hover:text-red-700" type="submit">
                                            <i class="fa-solid fa-trash" id="deleteIcon"></i>
                                        </button>
                                    </form>                                                                                                         
                                @endif
                             </div>

    </div>
</div>
