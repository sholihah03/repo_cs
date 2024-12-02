@extends('login.master')
@section('title', 'Login')

@section('content')
<div class="container sticky top-0 z-sticky">
    <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 flex-0">
        </div>
    </div>
</div>
<main class="mt-0 transition-all duration-200 ease-soft-in-out">
    <section>
        <div class="container z-10">
            <div class="flex flex-wrap mt-0 -mx-3">
                <div class="flex flex-col w-full max-w-full px-3 mx-auto md:flex-0 shrink-0 md:w-6/12 lg:w-5/12 xl:w-4/12">
                    <div class="relative flex flex-col min-w-0 mt-32 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border">
                        <div class="p-6 pb-0 mb-0 bg-transparent border-b-0 rounded-t-2xl">
                            <h3 class="relative z-10 font-bold text-transparent bg-gradient-to-tl from-blue-600 to-cyan-400 bg-clip-text">Selamat Datang</h3>
                            <p class="mb-0">Masukkan email dan password untuk sign in</p>
                        </div>
                        <div class="flex-auto p-5">
                            @if ($errors->any())
                                <div class="mb-4 text-red-500">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form role="form" method="POST" action="{{ route('loginrekap') }}">
                                @csrf
                                <div class="mt-4">
                                    <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Pilih Akun</label>
                                    <select name="account_type" id="accountType" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow">
                                    <option value="direktur">Direktur</option>
                                    <option value="manager">Manager</option>
                                    <option value="karyawan">Karyawan</option>
                                    <option value="cs">Customer Service</option>
                                    <option value="advertiser">Advertiser</option>
                                    </select>
                                </div>
                                <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Email</label>
                                <div class="mb-4">
                                    <input type="email" name="email" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Email" aria-label="Email" aria-describedby="email-addon" required />
                                </div>
                                <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Password</label>
                                <div class="mb-4">
                                    <input type="password" name="password" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Password" aria-label="Password" aria-describedby="password-addon" required />
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="inline-block w-full px-6 py-3 mt-6 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-blue-600 to-cyan-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">Sign in</button>
                                </div>
                            </form>
                        </div>

                        {{-- <div class="p-6 px-1 pt-0 text-center bg-transparent border-t-0 border-t-solid rounded-b-2xl lg:px-2">
                        <p class="mx-auto mb-6 leading-normal text-sm">
                            Don't have an account?
                            <a href="../pages/sign-up.html" class="relative z-10 font-semibold text-transparent bg-gradient-to-tl from-blue-600 to-cyan-400 bg-clip-text">Sign up</a>
                        </p>
                        </div> --}}
                    </div>
                </div>
                <div class="w-full max-w-full px-3 lg:flex-0 shrink-0 md:w-6/12">
                    <div class="absolute top-0 hidden w-3/5 h-full -mr-32 overflow-hidden -skew-x-10 -right-40 rounded-bl-xl md:block">
                        <div class="absolute inset-x-0 top-0 z-0 h-full -ml-16 bg-cover skew-x-10" style="background-image: url('{{ asset('assets/img/curved-images/curved6.jpg') }}');"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
