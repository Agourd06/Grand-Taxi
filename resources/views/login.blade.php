<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Document</title>
</head>

<body>

    <div class="font-[sans-serif] text-[#333] max-w-7xl mx-auto  max-h-screen overflow-none">
        <div class="grid md:grid-cols-2 items-center gap-8 h-[70vh] mb-6">
            <form action="/login" method="post" class="max-w-lg max-md:mx-auto w-full p-6">
                @csrf
                <div class="mb-10">
                    <h3 class="text-4xl font-extrabold">Sign in</h3>
                  
                </div>
                <div class="text-red-500 text-[20px] w-full text-center">
                    @if ($errors->any())
                        <div>{{ $errors->first() }}</div>
                    @endif
                </div>

                <div>
                    <label class="text-[15px] mb-3 block">Username</label>
                    <div class="relative flex items-center">
                        <input name="logname" type="text" 
                            class="w-full text-sm bg-gray-100 px-4 py-4 rounded-md outline-blue-600"
                            placeholder="Username" />

                    </div>
                </div>
                <div class="mt-6">
                    <label class="text-[15px] mb-3 block">Password</label>
                    <div class="relative flex items-center">
                        <input name="logpassword" type="password" 
                            class="w-full text-sm bg-gray-100 px-4 py-4 rounded-md outline-blue-600"
                            placeholder="Enter password" />
                    </div>
                </div>
                <div class="mt-10">
                    <button type="submit"
                        class="w-full shadow-xl py-3 px-4 text-sm font-semibold rounded text-white transition duration-300 hover:bg-[#EACE00] bg-black focus:outline-none">
                        Log in
                    </button>
                </div>
                <p class="text-sm mt-10 text-center">Don't have an account Register here<a href="/PaRegister"
                        class="text-[#EACE00] font-semibold hover:underline ml-1">As Passenger </a>Or<a href="/ChauRegister"
                        class="text-[#EACE00] font-semibold hover:underline ml-1">As Driver</a></p>
            </form>
            <div
                class="md:h-[70%]  md:py-6  flex items-center relative max-md:before:hidden before:absolute before:bg-gradient-to-r before:from-gray-50 before:via-[#EACE00] before:to-black before:h-full before:w-3/4 before:right-0 before:z-0">
                <img src="https://images.unsplash.com/photo-1504971737233-9a29c29c17cb?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fHRheGklMjBqYXVuZXxlbnwwfHwwfHx8MA%3D%3D"
                    class="rounded-md lg:w-4/5 md:w-[11/12] h-[80%] z-50 relative" alt="Dining Experience" />
            </div>
        </div>
    </div>

</body>

</html>
