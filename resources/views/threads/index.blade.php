<x-app-layout>

                    <!-- Tab Link -->
                      <div class="flex items-center gap-5 space capitalize">
                        <div>
                            <a href="{{ route('threads.index') }}" onclick="active(this)" class="tab-btn text-black text-xl border-b-2 pb-1 @if (request()->routeIs('threads.index')) border-primary @else border-black hover:border-primary @endif focus:outline-none transition">
                            For You
                            </a>
                        </div>
                            <div>
                                <a href="{{ route('threads.following') }}" onclick="active(this)" class="tab-btn text-black text-xl border-b-2 pb-1 @if (request()->routeIs('threads.following')) border-primary @else border-black hover:border-primary @endif focus:outline-none transition">
                                Following
                                </a>
                            </div>
                            <div>
                                <a href="{{ route('threads.bookmarks') }}" onclick="active(this)" class="tab-btn text-black text-xl border-b-2 pb-1 @if (request()->routeIs('threads.bookmarks')) border-primary @else border-black hover:border-primary @endif focus:outline-none transition">
                                Bookmarks
                                </a>
                            </div>
                        </div>
                        


                   <!-- For You Tab -->
                    <div class="flex flex-col justify-center items-center w-full" id="forYou">
                    <!-- Single Post -->
                    @foreach ($threads as $thread)
                        <x-thread :$thread />
                    @endforeach
                    <!-- Single Post End -->

                    <!-- Single Post -->
                    
                    <!-- Single Post End -->
                    </div>
                    
                    <footer class="mt-12 text-gray-500 text-sm">
                        &copy 2025 Team 3 | TwiiAhh | All Rights Reserved
                    </footer>
</x-app-layout>