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
    @include('layout/passagerBurgerMenu')

    <section class="h-full w-full bg-yellow-200">
    <div class="flex flex-col justify-center font-[sans-serif] text-[#333] p-4">
        <div class="max-w-md w-full mx-auto shadow-[0_2px_10px_-3px_rgba(6,81,237,0.5)] p-8 relative mt-12">
            <div
                class="bg-white w-24 h-24 border-[8px] p-1.5 absolute left-0 right-0 mx-auto -top-10 rounded-full overflow-hidden">
                <a href="javascript:void(0)"><img src="{{ asset('storage/image/' . 'taxista.png') }}" alt="logo"
                        class='w-full h-full inline-block' />
                </a>
            </div>
            <form class="mt-12" action="/confirmeResrvation" method="POST">
                @csrf
                <h3 class="text-xl font-bold text-gray-300 mb-8 text-center">Reserve Now</h3>
                <div class="space-y-4">
            
                    <div>
                        <label for="trip"> Your Trip</label>
                        <input name="trip" type="text" value="{{ old('driver',optional($DriverReservationtrip)->trip ?? '') }}" readonly
                            class="bg-gray-100 w-full text-sm px-4 py-4 focus:bg-transparent outline-orange-300 transition-all"
                        />
                    </div>
            
                    <div>
                        <label for="date"> Trip Date</label>
                        <input name="date" type="datetime-local"
                            class="bg-gray-100 w-full text-sm px-4 py-4 focus:bg-transparent outline-orange-300 transition-all"
                            placeholder="Enter email" />
                    </div>
            
                    <div>
                        <label for="driver">Your Driver</label>
                        <input name="driver" type="text" value="{{ old('driver', optional($DriverReservationtrip)->user->name ?? '') }}" readonly
                            class="bg-gray-100 w-full text-sm px-4 py-4 focus:bg-transparent outline-orange-300 transition-all"
                        />
                    </div>
            
                    <input type="hidden" name="driverId" value="{{ old('driverId' , optional($DriverReservationtrip)->id ?? '') }}">
            
                </div>
                <div class="mt-8">
                    <button type="submit"
                        class="w-full py-4 px-4 text-sm font-semibold text-white bg-black hover:bg-gray-900 focus:outline-none">
                        Reserve Trip
                    </button>
                </div>
            </form>
            
        </div>
    </div>
</section>
@include('layout/footer')
<script>
    function toggleModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.toggle('hidden');
    }
    document.getElementById('Profil').addEventListener('click', () => toggleModal('ProfilPop'));

    function burgermenu() {
            const sideBar = document.getElementById('burgerbar')
            sideBar.classList.toggle('hidden');
        }
</script>
</body>

</html>
