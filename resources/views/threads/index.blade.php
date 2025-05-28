<x-app-layout>

                    <!-- Tab Link -->
                      <div class="flex items-center gap-5 space capitalize">
                        <div>
                            <button href="#" onclick="active(this)" class="tab-btn text-black text-xl border-b-2 pb-1 border-primary focus:outline-none transition">
                            For You
                            </button>
                        </div>
                            <div>
                                <button href="#" onclick="active(this)" class="tab-btn text-black text-xl border-b-2 pb-1 border-black hover:border-primary focus:outline-none transition">
                                Following
                                </button>
                            </div>
                        </div>


                   <!-- For You Tab -->
                    <div class="flex flex-col justify-center items-center w-full" id="forYou">
                    <!-- Single Post -->
                    @foreach ($threads as $thread)
                        <div class="mt-6 flex justify-center items-center w-full">
                        <div class="border border-primary w-10/12 rounded-md p-3 shadow-md">
                           <!-- User -->
                             <div class="flex items-center px-5">                                
                                <!-- Username -->
                                <div class="flex gap-1 text-md ml-3 justify-center items-center">
                                    <p>
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
                                    <p class="cursor-pointer" onclick="toggleRepost()">
                                        <i class="fa-solid fa-repeat" id="repostIcon"></i>
                                    </p>
                                </div>
                                
                                <div>
                                    <p class="cursor-pointer" onclick="toggleSave()">
                                    <i class="fa-regular fa-bookmark" id="saveIcon"></i>
                                </p>
                                </div>
                             </div>

                        </div>
                    </div>
                    @endforeach
                    <!-- Single Post End -->

                    <!-- Single Post -->
                    
                    <!-- Single Post End -->
                    </div>
                    
                    <footer class="mt-12 text-gray-500 text-sm">
                        &copy 2025 Team 3 | TwiiAhh | All Rights Reserved
                    </footer>
</x-app-layout>