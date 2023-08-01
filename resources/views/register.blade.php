@extends('layout.master')
@section('container')
    @php
        $harga = rand(100000, 125000);
    @endphp
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
                Connect FRIENDS
            </a>
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Create and account
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="/registerAcc" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                name="email">Your
                                email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@company.com" required="" value="{{ old('email') }}">
                            @error('email')
                                <h2 style="color:red">{{ $message }}</h2>
                            @enderror
                        </div>
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                name="name">Your
                                Linkedin</label>
                            <input type="text" name="linkedin" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Linkedin" required="" value="{{ old('linkedin') }}">
                            @error('linkedin')
                                <h2 style="color:red">{{ $message }}</h2>
                            @enderror
                        </div>
                        <div>
                            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                name="phone">Your
                                Number</label>
                            <input type="tel" name="phoneNumber" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Number" required="" value="{{ old('number') }}" pattern="[0-9]{9,15}">
                            @error('phoneNumber')
                                <h2 style="color:red">{{ $message }}</h2>
                            @enderror
                        </div>
                        <input type="hidden" value="{{ $harga }}" name="price">
                        <input type="hidden" value="0" name="name">
                        <div>
                            <input type="hidden" value="0" name="bayar">
                            <div>
                                <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    name="image">Your Image Profession</label>
                                <input
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    id="image" type="file" name="image" value="{{ old('image') }}">
                                @error('image')
                                    <h2 style="color:red">{{ $message }}</h2>
                                @enderror
                            </div>
                            <div>
                                <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    name="gender">Your Gender</label>
                                <div class="flex items-center mb-4">
                                    <input id="gender" type="radio" value="0" name="gender"
                                        value="1"{{ old('gender') == '1' ? 'checked' : '' }}
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="gender"
                                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Male</label>
                                </div>
                                <div class="flex items-center">
                                    <input checked id="gender" type="radio" value="1" name="gender"
                                        value="2"{{ old('gender') == '2' ? 'checked' : '' }}
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="gender"
                                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Female</label>
                                </div>
                                @error('gender')
                                    <h2 style="color:red">{{ $message }}</h2>
                                @enderror
                            </div>
                            <div>
                                <label for="cities"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                                    City</label>
                                <select id="cities"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    name="city_id">
                                    <option selected>Choose City</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}"
                                            {{ old('city_id') == $city->id ? 'selected' : '' }}>
                                            {{ $city->cityName }}</option>
                                    @endforeach
                                </select>
                                @error('city_id')
                                    <h2 style="color:red">{{ $message }}</h2>
                                @enderror
                            </div>
                            <div>
                                <label for="prof1"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                                    Field</label>
                                <select id="prof1"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    name="prof1">
                                    <option selected>Choose Field</option>
                                    @foreach ($fields as $f)
                                        <option value="{{ $f->id }}">
                                            {{ $f->fieldName }}</option>
                                    @endforeach
                                </select>
                                @error('prof1')
                                    <h2 style="color:red">{{ $message }}</h2>
                                @enderror
                            </div>
                            <div>
                                <label for="prof2"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                                    Field</label>
                                <select id="prof2"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    name="prof2">
                                    <option selected>Choose Field</option>
                                    @foreach ($fields as $f)
                                        <option value="{{ $f->id }}">
                                            {{ $f->fieldName }}</option>
                                    @endforeach
                                </select>
                                @error('prof2')
                                    <h2 style="color:red">{{ $message }}</h2>
                                @enderror
                            </div>
                            <div>
                                <label for="prof3"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                                    Field</label>
                                <select id="prof3"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    name="prof3">
                                    <option selected>Choose Field</option>
                                    @foreach ($fields as $f)
                                        <option value="{{ $f->id }}">
                                            {{ $f->fieldName }}</option>
                                    @endforeach
                                </select>
                                @error('prof3')
                                    <h2 style="color:red">{{ $message }}</h2>
                                @enderror
                            </div>
                            <div>
                                <label for="password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <input type="password" name="password" id="password" placeholder="••••••••"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required="">
                                @error('password')
                                    <h2 style="color:red">{{ $message }}</h2>
                                @enderror
                            </div>

                            <button type="submit"
                                class="w-full text-black bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Create
                                an account</button>
                            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                Already have an account? <a href="/login"
                                    class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login
                                    here</a>
                            </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
