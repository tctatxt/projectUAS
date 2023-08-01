@include('layout.header')
@extends('layout.master')
@section('container')
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
                        Payment
                    </h1>
                    @if (Session()->has('paymentGagal'))
                        <h2 style="color:red">{{ Session()->get('paymentGagal') }}</h2>
                    @endif

                    @if (auth()->user()->bayar == '0')
                        <form class="space-y-4 md:space-y-6" action="/paymentAcc" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    name="price">Price</label>
                                <p>Must be to pay : {{ auth()->user()->price }}</p>
                                <input type="tel" name="price" id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Price" required="" value="{{ old('price') }}">
                                @error('price')
                                    <h2 style="color:red">{{ $message }}</h2>
                                @enderror
                            </div>

                            <button type="submit"
                                class="w-full text-black bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Paid</button>
                        </form>
                    @else
                        @if (Session()->has('kelebihan'))
                            <h2 style="color:blue">{{ Session()->get('kelebihan') }}</h2>
                        @endif
                        <form action="/pricebiasa" method="post">
                            @csrf
                            {{-- <input type="hidden"> --}}
                            <button type="submit">
                                no
                            </button>
                        </form>
                        <form action="/pricekurangin" method="post">
                            @csrf
                            {{-- <input type="hidden"> --}}
                            <button type="submit">
                                Yes
                            </button>
                        </form>
                    @endif



                </div>
            </div>
        </div>
    </section>
@endsection
{{-- @include('layout.footer') --}}
