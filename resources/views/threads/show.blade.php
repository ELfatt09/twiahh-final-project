<x-app-layout>
                    <x-thread :$thread />

                    <div class="w-full flex flex-row px-4">
                   
                    <div class="mt-4 flex flex-col w-full gap-2">

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
                                    <p class="cursor-pointer" onclick="toggleLike()">
                                        <i class="fa-regular fa-heart text-black" id="likeIcon"></i>
                                        <span id="likeCount">{{ $thread->likes->count() }}</span>
                                    </p>
                                </div>

        
                             </div>

                        </div>
                    </div>
                    @endforeach
                    </div>
                    </div>
</x-app-layout>
