<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Document</title>
</head>

<body>

    <div class="font-[sans-serif] text-[#333] relative">
        <div class="h-[240px] font-[sans-serif]">
            <img src="https://media.istockphoto.com/id/1216596937/photo/portrait-of-driver-smiling.jpg?s=2048x2048&w=is&k=20&c=Dx2Q4Ko0ZNaV-X-RE28D_DoMYfxd3uV-wWsrhDWY7QE="
                alt="Banner Image" class="w-full h-full object-cover" />
        </div>
        <div class="relative -mt-40 m-4 ">
            <div class="max-w-4xl mx-auto font-[sans-serif] text-[#333] p-6 rounded-md shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] bg-white">
                <div class="text-center mb-16">
                    <a href="javascript:void(0)"><img src="{{ asset('storage/image/' . 'taxista.png') }}" alt="logo"
                            class='w-52 inline-block' />
                    </a>
                    <h4 class="text-base font-semibold mt-3">Sign up into your account</h4>
                </div>
                <form action="/passenger" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="text-red-500 text-[20px] w-full text-center">
                        @if ($errors->any())
                            <div>{{ $errors->first() }}</div>
                        @endif
                    </div>
                    <div class="grid sm:grid-cols-2 gap-y-7 gap-x-12">
                        <div>
                            <label class="text-sm mb-2 block">Full Name</label>
                            <input name="name" type="text"
                            value="{{old('name')}}"	
                                class="bg-gray-100 w-full text-sm px-4 py-3.5 rounded-md outline-blue-500"
                                placeholder="Enter Full name" />
                        </div>
                        <div>
                            <label class="text-sm mb-2 block">E-mail</label>
                            <input name="email" type="text"  value="{{old('email')}}"	
                                class="bg-gray-100 w-full text-sm px-4 py-3.5 rounded-md outline-blue-500"
                                placeholder="Enter E-mail" />
                        </div>
                        <div>
                            <label class="text-sm mb-2 block">password</label>
                            <input name="password" type="password" 
                                class="bg-gray-100 w-full text-sm px-4 py-3.5 rounded-md outline-blue-500"
                                placeholder="Enter password" />
                        </div>
                        <div>
                            <label class="text-sm mb-2 block">Confirm Password</label>
                            <input name="Cpassword" type="password"
                                class="bg-gray-100 w-full text-sm px-4 py-3.5 rounded-md outline-blue-500"
                                placeholder="Enter confirm password" />
                        </div>
                        <div>
                            <label class="text-sm mb-2 block">Car Registration</label>
                            <input name="immatricule" type="text" value="{{old('immatricule')}}"
                                class="bg-gray-100 w-full text-sm px-4 py-3.5 rounded-md outline-blue-500"
                                placeholder="xxxxxxx" />
                        </div>

                        
                        <div>
                            <label class="text-sm mb-2 block">Availability</label>
                            <select name="Desponability" type="text" value="{{old('Desponability')}}"
                                class="bg-gray-100 w-full text-sm px-4 py-3.5 rounded-md outline-blue-500">
                                <option value="Available">Available</option>
                                <option value="Reserved">Reserved</option>
                                <option value="In Use">In Use</option>
                            </select>
                        </div>
                        <div>
                            <label class="text-sm mb-2 block">Car Type</label>
                            <select name="VoitureType" type="text" value="{{old('VoitureType')}}"
                                class="bg-gray-100 w-full text-sm px-4 py-3.5 rounded-md outline-blue-500">
                                <option value="Taxi">Taxi</option>
                                <option value="Honda">Honda</option>
                                <option value="Bus">Bus</option>

                            </select>
                        </div>
                        <div>
                            <label class="text-sm mb-2 block">Payment Type</label>
                            <select name="TypeDePayment" type="text" value="{{old('TypeDePayment')}}"
                                class="bg-gray-100 w-full text-sm px-4 py-3.5 rounded-md outline-blue-500">
                                <option value="Cash">Cash</option>
                                <option value="Carte">Carte</option>

                            </select>
                        </div>
                        <div class="mt-2">
                            <label class="text-sm mb-2 block">Profil Image</label>
                            <div class="relative flex items-center">
                                <input type="file" name="profile_image" value="{{old('profile_image')}}"
                                    class="w-full text-black text-sm bg-gray-100 file:cursor-pointer cursor-pointer file:border-0 file:py-2 file:px-4 file:mr-4 file:bg-[#EACE00] file:hover:bg-[#EACE00] file:text-white rounded" />

                            </div>
                        </div>
                        <div>
                            <label class="text-sm mb-2 block">Driver Description</label>
                            <div class="relative flex items-center">
                                <textarea name="Description" placeholder="Enter Description" value="{{old('Description')}}"
                                    class="bg-gray-100 border border-gray-300 w-full text-sm px-4 py-2.5 rounded-md outline-none"> </textarea>
    
                            </div>
                        </div>
                        <input type="hidden" name="role" value="chauffeur">
                    </div>
                    <div class="!mt-10">
                        <button type="submit"
                            class="min-w-[150px] py-3 px-4 text-sm font-semibold rounded text-white transition duration-300 bg-[#EACE00] hover:bg-black focus:outline-none">
                            Sign up
                        </button>
                    </div>
                    <p class="text-sm mt-8 text-center">Already have an account? <a href="/" class="text-[#EACE00] font-semibold hover:underline ml-1">Login here</a></p>

                </form>
            </div>
        </div>
    </div>
</body>

</html>
