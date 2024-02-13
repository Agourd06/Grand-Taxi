<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>

    <title>Document</title>
</head>

<body>
    @include('layout/passagerNav')
    <div class="w-full text-4xl text-center text-bold pt-8"> <span
            class="underline underline-offset-3 decoration-8 decoration-[#EACE00] dark:decoration-blue-600">Your Favorit
            Trips</span>
    </div>
    <section class="md:w-[90%] w-[85%] mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-16 max-md:max-w-lg mx-auto">
            @foreach($favoritRoads as $route)
            <div class="bg-slate-100 w-full h-60 shadow-black shadow-md rounded-md ">
                <div class="w-full text-center py-12">
                    <h2 class="text-xl font-bold">Trip : {{ $route->trip }}</h2>
                </div>
                <div class="flex justify-between p-8">
                    <div>
                        @if ((int) $route->favori === 1)
                            <form action="/favorit" method="POST">
                                @csrf
                                <input type="hidden" name="favori" value="0">
                                <input type="hidden" name="routeId" value="{{ $route->id }}">
                                <button type="submit"> <svg xmlns="http://www.w3.org/2000/svg" id="Layer_2"
                                        data-name="Layer 1" width="34" height="34" viewBox="0 0 122.88 107.39">
                                        <defs>

                                        </defs>
                                        <title>red-heart</title>
                                        <path class="fill-[#ed1b24] hover:fill-[#cccccc]"
                                            d="M60.83,17.18c8-8.35,13.62-15.57,26-17C110-2.46,131.27,21.26,119.57,44.61c-3.33,6.65-10.11,14.56-17.61,22.32-8.23,8.52-17.34,16.87-23.72,23.2l-17.4,17.26L46.46,93.55C29.16,76.89,1,55.92,0,29.94-.63,11.74,13.73.08,30.25.29c14.76.2,21,7.54,30.58,16.89Z" />
                                    </svg> </button>
                            </form>
                        @else
                            <form action="/favorit" method="POST">
                                @csrf

                                <input type="hidden" name="favori" value="1">
                                <input type="hidden" name="routeId" value="{{ $route->id }}">

                                <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" id="Layer_1"
                                        data-name="Layer 1" width="34" height="34" viewBox="0 0 122.88 107.39">
                                        <defs>

                                        </defs>
                                        <title>red-heart</title>
                                        <path class=" cursor-pointer hover:fill-[#ed1b24] fill-[#cccccc]"
                                            d="M60.83,17.18c8-8.35,13.62-15.57,26-17C110-2.46,131.27,21.26,119.57,44.61c-3.33,6.65-10.11,14.56-17.61,22.32-8.23,8.52-17.34,16.87-23.72,23.2l-17.4,17.26L46.46,93.55C29.16,76.89,1,55.92,0,29.94-.63,11.74,13.73.08,30.25.29c14.76.2,21,7.54,30.58,16.89Z" />
                                    </svg></button>
                            </form>
                        @endif
                    </div>
                    <div>
                        <form action="/filter" method="post">
                            @csrf
                            <input type="hidden" value="{{ $route->trip }}" name="filtertrip">
                            <button type="submit" name="wikiId"
                                class=" md:w-[150px] w-[70px] text-[10px] md:text-[15px] h-[40px] md:mr-4 lg:mr-0 bg-black rounded duration-300 hover:bg-[#EACE00]  text-white"
                                value="">Similar Destinations</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
     
        </div>

    </section>
    @include('layout/footer')

</body>

</html>
