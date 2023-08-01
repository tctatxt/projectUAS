@include('layout.header')
@extends('layout.master')
@section('container')
    @php
        use App\Models\User;
        use App\Models\Connect;
        use App\Models\City;
        $cities = City::all();
    @endphp
    {{-- @dd($people) --}}
    {{-- {{ $people->links('home') }} --}}
    <div class="border border-indigo-600 flex flex-col justify-center align-center px-72 ">

        <form action="/selectgender" method="post">
            @csrf
            <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Gender</label>
            <select id="gender"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                name="thegender">
                <option selected>Choose Gender</option>
                <option value="1">Male</option>
                <option value="">Female</option>
            </select>
            <button type="submit">search</button>
        </form>
        <div class="grid grid-cols-4 gap-4">
            @if (empty($selectGender))
                @php
                    $people = User::all();
                @endphp
                @foreach ($people as $p)
                    {{-- @php
                            $matchCek = Connect::where('userFemale', '=', auth()->user()->id)
                                ->where('userMale', '=', $p->id)
                                ->first();

                    @endphp --}}
                    {{-- @if (empty($ConnectCek)) --}}
                    <div
                        class="w-[15vw] h-[19vw] bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex flex-col items-center pb-10">
                            <img class="w-[65%] h-[10vw] mb-3  shadow-lg" src="{{ asset('storage/' . $p->image) }}"
                                alt="" />
                            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $p->name }}</h5>
                            <span class="text-sm text-gray-500 dark:text-gray-400">{{ $p->City->cityName }}</span>
                            <div class="flex mt-4 space-x-3 md:mt-6">
                                <form action="/connect" method="post">
                                    @csrf
                                    {{-- <input type="hidden" name="kdState"> --}}
                                    <input type="hidden" value="{{ $p->id }}" name="user2">
                                    <button type="submit"
                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-pink-500 rounded-lg hover:bg-pink-700 dark:hover:bg-blue-700 ">Connect</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- @endif --}}
                @endforeach
            @else
                @php
                    $people = User::where('gender', '=', $selectGender)->get();
                @endphp
                @foreach ($people as $p)
                    {{-- @php
                        if (auth()->user()->gender == '0') {
                            $matchCek = Connect::where('userMale', '=', auth()->user()->id)
                                ->where('userFemale', '=', $p->id)
                                ->first();
                        } else {
                            $matchCek = Connect::where('userFemale', '=', auth()->user()->id)
                                ->where('userMale', '=', $p->id)
                                ->first();
                        }
                    @endphp --}}
                    {{-- @if (empty($ConnectCek)) --}}
                    <div
                        class="w-[15vw] h-[19vw] bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex flex-col items-center pb-10">
                            <img class="w-[65%] h-[10vw] mb-3  shadow-lg" src="{{ asset('storage/' . $p->image) }}"
                                alt="" />
                            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $p->name }}</h5>
                            <span class="text-sm text-gray-500 dark:text-gray-400">{{ $p->City->cityName }}</span>
                            <div class="flex mt-4 space-x-3 md:mt-6">
                                <form action="/connect" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $p->id }}" name="user2">
                                    <button type="submit"
                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-pink-500 rounded-lg hover:bg-pink-700 dark:hover:bg-blue-700 ">Connect</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- @endif --}}
                @endforeach
            @endif

        </div>

        @if (auth()->check())
            <h1>Who want to Connect with you</h1>
            <div class="grid grid-cols-4 gap-4">
                @php
                    $liker = Connect::where('diconnect', '=', auth()->user()->id)
                        ->where('kdState', '=', '1')
                        ->get();
                    // @dd($liker);
                @endphp
                @foreach ($liker as $l)
                    @php
                        if (auth()->user()->gender == '0') {
                            $up = User::where('id', '=', $l->user1)->first();
                        } else {
                            $up = User::where('id', '=', $l->user2)->first();
                        }
                        // @dd($up);
                    @endphp
                    <div
                        class="w-[15vw] h-[19vw] bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex flex-col items-center pb-10">
                            <img class="w-[65%] h-[10vw] mb-3  shadow-lg" src="{{ asset('storage/' . $up->image) }}"
                                alt="" />
                            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $up->name }}</h5>
                            <span class="text-sm text-gray-500 dark:text-gray-400">{{ $up->City->cityName }}</span>
                            <div class="flex mt-4 space-x-3 md:mt-6">
                                <form action="/yukconnect" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $l->id }}" name="matchers">
                                    <button type="submit"
                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-pink-500 rounded-lg hover:bg-pink-700 dark:hover:bg-blue-700 ">Connect</button>
                                </form>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <h1>Your Suggestion to connect</h1>
            <div class="grid grid-cols-4 gap-4">
                @php
                    $flag2 = 0;
                    $waiting = Connect::where('user1', '=', auth()->user()->id)
                        ->where('diconnect', '!=', auth()->user()->id)
                        ->where('kdState', '=', '1')
                        ->get();
                    if ($waiting == null) {
                        $flag2 = 1;
                        $waiting = Connect::where('user2', '=', auth()->user()->id)
                            ->where('diconnect', '!=', auth()->user()->id)
                            ->where('kdState', '=', '1')
                            ->get();
                    }
                @endphp
                @foreach ($waiting as $w)
                    @php
                        if ($flag2 = 0) {
                            $upw = User::where('id', '=', $w->user2)->first();
                        } else {
                            $upw = User::where('id', '=', $w->user1)->first();
                        }
                    @endphp
                    <div
                        class="w-[15vw] h-[19vw] bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex flex-col items-center pb-10">
                            <img class="w-[65%] h-[10vw] mb-3  shadow-lg" src="{{ asset('storage/' . $upw->image) }}"
                                alt="" />
                            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $upw->name }}</h5>
                            <span class="text-sm text-gray-500 dark:text-gray-400">{{ $upw->City->cityName }}</span>
                            <div class="flex mt-4 space-x-3 md:mt-6">
                                <form action="/matcher" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $w->id }}" name="matchers">
                                    <button type="submit"
                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-gray-500 rounded-lg hover:bg-gray-700 dark:hover:bg-blue-700 ">Waiting</button>
                                </form>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


            <h1>You can video Call with </h1>
            @php
                $flag1 = 0;
                $Connect = Connect::where('user1', '=', auth()->user()->id)
                    ->where('kdState', '=', '2')
                    ->get();
                if ($Connect == null) {
                    $flag1 = 1;
                    $Connect = Connect::where('user2', '=', auth()->user()->id)
                        ->where('kdState', '=', '2')
                        ->get();
                }
            @endphp
            @foreach ($Connect as $m)
                @php
                    if ($flag1 == 0) {
                        $upw = User::where('id', '=', $m->user2)->first();
                    } else {
                        $upw = User::where('id', '=', $m->user1)->first();
                    }
                @endphp
                <div
                    class="w-[15vw] h-[19vw] bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex flex-col items-center pb-10">
                        <img class="w-[65%] h-[10vw] mb-3  shadow-lg" src="{{ asset('storage/' . $upw->image) }}"
                            alt="" />
                        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $upw->name }}</h5>
                        <span class="text-sm text-gray-500 dark:text-gray-400">{{ $upw->City->cityName }}</span>
                        <div class="flex mt-4 space-x-3 md:mt-6">
                            {{-- <form action="/unmatch" method="post">
                            @csrf
                            <input type="hidden" value="{{ $m->id }}" name="unmatch">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-pink-500 rounded-lg hover:bg-pink-700 dark:hover:bg-blue-700 ">UnMatch</button>
                        </form> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>
    <script>
        function validateWallet(price, wallet) {
            if (wallet < price) {
                alert("Your wallet gak cukup!");
                return false;
            } else {
                alert("Your love is success");
                return true;
            }

        }
    </script>
@endsection
