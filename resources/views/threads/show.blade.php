<x-app-layout>
                    <x-thread :$thread />

                    <div class="w-full flex flex-row px-4">
                   
                    <div class="mt-4 flex flex-col w-full ps-8 gap-2">

                    @foreach ($thread->replies as $thread)
                     <div class="px-0 md:px-12 relative">
                            <span class="absolute h-24 w-6 md:w-24 md:h-24 border-b-2 border-l-2 rounded-sm border-primary"></span>
                         </div>
                    <div class="flex items-end justify-end flex-row w-full">
                        <div class="border border-primary rounded-md p-2 shadow-md w-10/12">
                           <!-- User -->
                            <div class="flex items-center">                                
                                <!-- Username -->
                                <div class="flex gap-1  ml-3 justify-center items-center space-x-2">
                                    <p class="text-lg font-semibold">
                                        {{ $thread->author->name }}
                                    </p>
                                    <p class="text-gray-500 text-xs">
                                        {{ $thread->author->email }}
                                    </p>
                                </div>
                             </div>
                            <!-- User -->

                            <!-- Content -->
                            <div class="mt-2 px-5">
                                <p>
                                    {{ $thread->body }}    
                                </p>
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
                    @endforeach
                    </div>
                    </div>
</x-app-layout>
