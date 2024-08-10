@extends('layout')

@section('custom_style')
    <style>
        #job-detail ul, ol {
            list-style: revert;
            padding-left: 1rem;
        }
    </style>
@endsection

@section('content')
    <section id="job-detail" class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16 mt-8">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="mx-auto max-w-5xl">
                <div class="my-8 xl:mb-16 xl:mt-12 flex justify-center">
                    <img class="max-w-xl dark:hidden rounded-lg" src="{{ asset('storage/' . $loker->thumbnail) }}"
                        alt="" />
                    {{-- <img class="hidden max-w-xl dark:block rounded-lg" src="{{ asset('storage/'. $loker->thumbnail) }}" alt="" /> --}}
                </div>
                <h2 class="mx-auto max-w-3xl mb-10 text-4xl font-bold text-black dark:text-gray-400 ">{{ $loker->name }}</h2>
                <div class="mx-auto max-w-3xl space-y-6">
                    <p class="text-xl font-semibold text-gray-800 dark:text-white sm:text-2xl">Description</p>

                    <div class="text-base text-gray-500 dark:text-gray-500">
                        {!! $loker->description !!}
                    </div>
                </div>
                <div class="mx-auto max-w-3xl space-y-6 mt-8">
                    <p class="text-xl font-semibold text-gray-800 dark:text-white sm:text-2xl">Requirement</p>

                    <div class="text-base text-gray-500 dark:text-gray-500">
                        {!! $loker->requirement !!}
                    </div>
                </div>

                <div class="mt-10 block mx-auto max-w-3xl p-6 bg-white border border-gray-200 rounded-lg shadow">
                    <form action="{{ route('submit_form', $loker->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <p class="mb-2 text-xl font-bold text-gray-800 dark:text-white sm:text-2xl">Form Pendaftaran</p>

                        @if (session()->has('success'))
                        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                            {{ session('success') }}
                          </div>
                            
                        @endif

                        @if ($errors->any())
                            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-medium">Error!</span>
                                <ol>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ol>
                            </div>
                        @endif
                        {{-- Nama, No.Telp, Email, Posisi, Upload CV --}}
                        <div class="mb-5">
                            <label for="fullname"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                            <input type="text" id="fullname" name="fullname"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="nama lengkap" required />
                        </div>
                        <div>
                            <label for="call"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.Telp </label>
                        <input type="number" id="call" name="call"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="08xx" required />
                        </div>
                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" id="email" name="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="email@gmail.com" required />
                        </div>
                        <div>
                            <label for="position"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Posisi</label>
                            <input type="text" id="position" disabled
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="{{ $loker->name }}" required />
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="file_input">Upload file</label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                accept="application/pdf"
                                aria-describedby="file_input_help" id="file" name="file" type="file">
                            <p class= "text-right mt-1 text-xs text-gray-500 dark:text-gray-300"
                                id="file_input_help">PDF (max size: 5mb)</p>
                        </div>
                        <div class="flex items-start mb-5">
                            <div class="flex items-center h-5">
                                <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
