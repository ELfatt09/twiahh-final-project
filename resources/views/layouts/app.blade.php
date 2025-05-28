<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | TwiiAhh</title>

    
  <!-- Logo -->
   <link rel="icon" href="images/TwiiAhh Logo 2.svg" type="image/svg+xml">
    
    <!-- CSS -->    
    <style>
        .text-10px {
            font-size: 10px;
        }
    </style>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-thin.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-light.css">

            @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="h-screen overflow-y-hidden">

    <!-- Navbar -->
    <header class="w-full backdrop-blur-md bg-opacity-70">
        <nav class="flex justify-center px-6 border-b border-primary py-4">

            <!-- Search Bar -->
           <div class="w-6/12 items-center justify-center">
             <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                    <i class="fas fa-search"></i>
                </span>
                    <input
                    type="text"
                    placeholder="Search..."
                    class="w-full pl-10 pr-4 py-2 border border-primary rounded-full shadow-sm focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition"
                    />
                </div>
           </div>
        </nav>
    </header>

        <div class="flex flex-row">

            <!-- Burger -->
             <button id="menu-toggle" class=" absolute top-4 left-4 z-50 p-2">
                <i class="fas fa-bars text-primary text-2xl"></i>
            </button>
            <!-- Burger -->

            <!-- Pop Up -->
              <div id="modal" class="z-50 fixed backdrop-blur-md inset-0 hidden justify-center items-center px-4 md:px-0">
                    <div class="flex justify-center items-center h-full w-full">
                        <div class="bg-white shadow-lg rounded-lg w-full md:w-1/2 fade-in modal-content z-50 ">

                            <div class="mb-4 border-b-2 border-primary pb-5 w-full">

                                <div class="flex items-center pt-4 px-10 gap-6">
                                <button id="closeModal">
                                    <i class="fa-solid fa-right-from-bracket cursor-pointer text-xl text-primary hover:text-secondary transition"></i>
                                </button>
                                    <h2 class="text-xl text-primary flex">New Post</h2>
                                </div>

                                </div>

                                <form class="px-10 w-full" action="{{ route('threads.store') }}" method="post" enctype="multipart/form-data"a>
                                    @csrf
                                    @method('POST')
                                    <div class="flex gap-2">
                                        <i class="fa-solid fa-circle-user text-4xl mb-4 "></i>
                                        <h2 class="items-center flex mb-4">lorem</h2>
                                        <h2 class="text-gray-500 items-center flex mb-4">lorem@gmail.com</h2>
                                    </div>
                                    
                                       <div class="w-full">
                                        <textarea id="text-col" class="focus:outline-none w-full max-h-10 resize-none" type="text" name="body" id="" placeholder="What's Up"></textarea>
                                       </div>

                                        <div class="w-full px-2 py-2">
                                            <label for="media"><i class="fa-solid fa-camera cursor-pointer text-primary"></i></label>
                                            <input type="file" class="hidden" id="media" name="media">
                                        </div>

                                <div class="border-t-2 border-primary px-10 py-4">
                                    <div class="justify-center items-center flex">
                                        <button type="submit" class="justify-center items-center flex border border-primary rounded-full bg-primary pt-1 h-10 w-1/2 font-bold text-black hover:bg-transparent hover:border-secondary hover:text-secondary transition">POST</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
                <!-- Pop Up -->

            <!-- Left Bar -->
             <section id="sidebar" class="fixed sm:sticky w-full pb-20 md:pb-0 md:w-96 h-screen max-h-screen flex flex-col py-6 px-6 justify-items-start border-r border-primary bg-teritary space-y-6 
                transition-all duration-300 z-40 lg:l overflow-x-hidden whitespace-nowrap overflow-y-auto">
                <!-- Logo -->
                 <div class="flex px-4">
                    <img src="images/TwiiAhh Logo.svg" class="w-10/12" alt="">
                 </div>

                <!-- Date -->
                 <div class="px-4 mt-4 flex">
                    <h1>Monday, 1st January, 2025</h1>
                 </div>

                <!-- Link -->
                 <div class="flex px-4 flex-col items-start space-y-8">
                    <a class="text-xl text-secondary transition flex items-center gap-5" href="index.html">
                        <i class="fa-solid fa-house"></i>
                        <span>Home</span>
                    </a>
                    <a class="text-xl ml-0.5 hover:text-secondary transition flex items-center gap-6" href="bookmarks.html">
                        <i class="fa-solid fa-bookmark"></i>
                        <span>Bookmarks</span>
                    </a>
                    <a class="text-xl hover:text-secondary transition flex items-center gap-6" href="profile.html">
                        <i class="fa-solid fa-user"></i>
                        <span>Profile</span>
                    </a>
                    <a class="text-xl hover:text-secondary transition flex items-center gap-5" href="settings.html">
                        <i class="fa-solid fa-gear"></i>
                        <span>Settings</span>
                    </a>
                    <a class="text-xl hover:text-secondary transition flex items-center gap-5" href="credit.html">
                        <i class="fa-regular fa-square-ellipsis"></i>
                        <span>Credit</span>
                    </a>
                </div>

                <!-- Stats -->
                 <div class="px-3 py-2 text-base text-black space-y-1">
                    <p>Posts: <span class="font-semibold text-secondary">5</span></p>
                    <p>Followers: <span class="font-semibold text-secondary">102</span></p>
                    <p>Following: <span class="font-semibold text-secondary">2</span></p>
                </div>

                <!-- Post -->
                 <div class="my-5">
                    <button id="openModal" class="flex text-2xl bg-primary border border-primary justify-center p-2 w-52 rounded-full hover:text-secondary hover:border-secondary transition hover:bg-transparent uppercase" >
                        Post
                    </button>
                 </div>
             </section>
            <!-- Left Bar -->

                <!-- Feeds -->
                 <main class= "flex flex-col items-center w-full h-full max-h-screen overflow-y-scroll py-8 pb-40">
                        {{$slot}}
                </main>
                 <!-- Feeds -->


                <!-- Right Bar -->
                    <section class="hidden md:flex w-0 md:w-96 h-full max-h-screen overflow-y-scroll text-lg flex-col pb-20 px-6 border-l border-primary bg-teritary space-y-6" >
                         <!-- Auth Button / Account -->
                    <div class="flex items-center justify-center gap-3 w-full mt-4">
                        @auth
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="border border-primary bg-transparent py-1 px-6 rounded-full hover:border-secondary hover:text-secondary transition" type="submit">
                                    Logout
                                </button>
                            </form>
                        @else
                            <a class="border border-primary bg-transparent py-1 px-6 rounded-full hover:border-secondary hover:text-secondary transition" href="{{   route('login') }}">
                                Login
                            </a>
                            <a class="max-w-full flex border bg-primary border-primary hoverbg-transparent py-1 px-4 rounded-full hover:border-secondary hover:text-secondary transition hover:bg-transparent" href="{{  route('register') }}">
                                Sign Up
                            </a>
                        @endauth
                    </div>

                    <div class="flex justify-center items-center gap-4 hidden">
                        <img src="images/avatar.png" class="w-12" alt="">
                        <div class="space-y-0">
                            <h1>Lorem Ipsum</h1>
                            <p class="text-gray-500 text-10px">@lorem_ipsum</p>
                        </div>
                        <a class="text-primary hover:text-secondary transition text-sm ml-4" href="">Logout</a>
                    </div>

                        <!-- Trends -->
                         <div class="">
                            <h1 class="capitalize mb-4">Trends for you</h1>
                            <div class="space-y-3">
                                <!-- Single Trends -->
                                <div class="flex items-center justify-between bg-white rounded-xl shadow p-4 w-full max-w-md border border-primary">
                                <!-- Text Section -->
                                <div class="flex flex-col">
                                    <span class="text-xs text-black font-semibold mb-1">Space</span>
                                    <p class="text-sm font-medium">Lunar photography improves the discovery of the moon</p>
                                    <span class="text-xs text-secondary mt-2">10,094 people are Twiiting about this</span>
                                </div>

                                <!-- Image Section -->
                                <div class="w-16 h-16 rounded-xl overflow-hidden ml-4 flex-shrink-0">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/FullMoon2010.jpg/220px-FullMoon2010.jpg" alt="moon" class="object-cover w-full h-full">
                                </div>
                                </div>
                                <!-- Single Trends -->
                                <!-- Single Trends -->
                                <div class="flex items-center justify-between bg-white rounded-xl shadow p-4 w-full max-w-md border border-primary">
                                <!-- Text Section -->
                                <div class="flex flex-col">
                                    <span class="text-xs text-black font-semibold mb-1">Space</span>
                                    <p class="text-sm font-medium">Lunar photography improves the discovery of the moon</p>
                                    <span class="text-xs text-secondary mt-2">10,094 people are Twiiting about this</span>
                                </div>

                                <!-- Image Section -->
                                <div class="w-16 h-16 rounded-xl overflow-hidden ml-4 flex-shrink-0">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/FullMoon2010.jpg/220px-FullMoon2010.jpg" alt="moon" class="object-cover w-full h-full">
                                </div>
                                </div>
                                <!-- Single Trends -->
                            </div>
                         </div>

                         <!-- Who to Follow -->
                          <div class="mb-6">
                            <h1 class="mb-4">Who to Follow</h1>
                            <div class="space-y-4">
                                <!-- Single User -->
                                 <div class="flex space-x-8">
                                    <div class=" flex space-x-3">
                                        <img src="images/avatar.png" class="w-12 h-auto" alt="">

                                   <div class="flex flex-col items-center">
                                        <h1 class="text-sm">Lorem Ipsum</h1>
                                        <p class="text-10px  mt-4 mr-4 text-gray-500">@lorem_ipsum</p>
                                   </div>
                                    </div>

                                    <div>
                                        <button id="followBtn" class="text-sm text-secondary focus:outline-none focus:ring-0" onclick="toggleFollow()">
                                            Follow
                                        </button>
                                    </div> 

                                 </div>
                                <!-- Single User -->
                                 <div class="flex space-x-8">
                                    <div class=" flex space-x-3">
                                        <img src="images/avatar.png" class="w-12 h-auto" alt="">

                                   <div class="flex flex-col items-center">
                                        <h1 class="text-sm">Lorem Ipsum</h1>
                                        <p class="text-10px mt-4 mr-4 text-gray-500">@lorem_ipsum</p>
                                   </div>
                                    </div>

                                    <div>
                                        <button id="followBtn" class="text-sm text-secondary focus:outline-none focus:ring-0" onclick="toggleFollow()">
                                            Follow
                                        </button>
                                    </div> 

                                 </div>
                                <!-- Single User -->
                                 <div class="flex space-x-8">
                                    <div class=" flex space-x-3">
                                        <img src="images/avatar.png" class="w-12 h-auto" alt="">

                                   <div class="flex flex-col items-center">
                                        <h1 class="text-sm">Lorem Ipsum</h1>
                                        <p class="text-10px mt-4 mr-4 text-gray-500">@lorem_ipsum</p>
                                   </div>
                                    </div>

                                    <div>
                                        <button id="followBtn" class="text-sm text-secondary focus:outline-none focus:ring-0" onclick="toggleFollow()">
                                            Follow
                                        </button>
                                    </div> 

                                 </div>
                            </div>
                          </div>
                    </section>
                <!-- Right Bar -->

                @vite('resources/js/components.js')

</body>
</html>