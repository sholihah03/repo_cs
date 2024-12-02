@extends('rekap.includes.master')
@section('title', 'Edit Pegawai')

@section('content')
<div class="w-full px-6 py-6 mx-auto">
    <!-- Form Input Data Karyawan -->
    <div class="container z-10">
        <div class="flex flex-wrap mt-0 -mx-3">
            <div class="flex flex-col w-full max-w-full px-3 mx-auto md:flex-0" style="padding-top: 2px;">
                <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 bg-transparent border-b-0 rounded-t-2xl">
                        <h3 class="relative z-10 font-bold text-transparent bg-gradient-to-tl from-blue-600 to-cyan-400 bg-clip-text">Edit Data Karyawan</h3>
                    </div>
                    <div class="flex-auto p-6">
                        @if(session('success'))
                            <div class="alert alert-success mb-4">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger mb-4">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('karyawan.update', $karyawan->id_karyawan) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @method('PUT')

                            <!-- Jabatan -->
                            <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Jabatan</label>
                            <div class="mb-4">
                                <select name="jabatan_id" class="focus:shadow-soft-primary-outline text-sm leading-5.6 block w-full rounded-lg border border-solid border-gray-300 bg-white px-3 py-2">
                                    <option value="">Pilih Jabatan</option>
                                    @foreach($jabatan as $j)
                                        <option value="{{ $j->id_jabatan }}" {{ $karyawan->jabatan_id == $j->id_jabatan ? 'selected' : '' }}>{{ $j->nama_jabatan }}</option>
                                    @endforeach
                                </select>
                                @error('jabatan_id')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Nama Lengkap -->
                            <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Nama Lengkap</label>
                            <div class="mb-4">
                                <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $karyawan->nama_lengkap) }}" class="focus:shadow-soft-primary-outline text-sm leading-5.6 block w-full rounded-lg border border-solid border-gray-300 bg-white px-3 py-2" placeholder="Nama Karyawan" />
                                @error('nama_lengkap')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Username -->
                            <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Username</label>
                            <div class="mb-4">
                                <input type="text" name="username" value="{{ old('username', $karyawan->username) }}" class="focus:shadow-soft-primary-outline text-sm leading-5.6 block w-full rounded-lg border border-solid border-gray-300 bg-white px-3 py-2" placeholder="Username" />
                                @error('username')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Password -->
                            <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Password (Kosongkan jika tidak ingin diubah)</label>
                            <div class="mb-4">
                                <input type="password" name="password" class="focus:shadow-soft-primary-outline text-sm leading-5.6 block w-full rounded-lg border border-solid border-gray-300 bg-white px-3 py-2" placeholder="Password" />
                                @error('password')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Email -->
                            <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Email</label>
                            <div class="mb-4">
                                <input type="email" name="email" value="{{ old('email', $karyawan->email) }}" class="focus:shadow-soft-primary-outline text-sm leading-5.6 block w-full rounded-lg border border-solid border-gray-300 bg-white px-3 py-2" placeholder="Email" />
                                @error('email')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- No. Telp -->
                            <label class="mb-2 ml-1 font-bold text-xs text-slate-700">No. Telp</label>
                            <div class="mb-4">
                                <input type="text" name="no_telepon" value="{{ old('no_telepon', $karyawan->no_telepon) }}" class="focus:shadow-soft-primary-outline text-sm leading-5.6 block w-full rounded-lg border border-solid border-gray-300 bg-white px-3 py-2" placeholder="No. Telp" />
                            </div>

                            <!-- Profile Karyawan -->
                            <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Profile Karyawan (Kosongkan jika tidak ingin diubah)</label>
                            <div class="mb-4">
                                <input type="file" name="profile_karyawan" accept="image/*" class="focus:shadow-soft-primary-outline text-sm leading-5.6 block w-full rounded-lg border border-solid border-gray-300 bg-white px-3 py-2" />
                            </div>

                            <!-- Status -->
                            <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Status</label>
                            <div class="mb-4">
                                <select name="status" class="focus:shadow-soft-primary-outline text-sm leading-5.6 block w-full rounded-lg border border-solid border-gray-300 bg-white px-3 py-2">
                                    <option value="aktif" {{ $karyawan->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="tidak aktif" {{ $karyawan->status == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                            </div>

                            <!-- Mulai Bekerja -->
                            <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Mulai Bekerja</label>
                            <div class="mb-4">
                                <input type="date" name="mulai_bekerja" value="{{ old('mulai_bekerja', $karyawan->mulai_bekerja) }}" class="focus:shadow-soft-primary-outline text-sm leading-5.6 block w-full rounded-lg border border-solid border-gray-300 bg-white px-3 py-2" />
                            </div>

                            <!-- Akhir Bekerja -->
                            <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Akhir Bekerja</label>
                            <div class="mb-4">
                                <input type="date" name="akhir_bekerja" value="{{ old('akhir_bekerja', $karyawan->akhir_bekerja) }}" class="focus:shadow-soft-primary-outline text-sm leading-5.6 block w-full rounded-lg border border-solid border-gray-300 bg-white px-3 py-2" />
                            </div>

                            <div class="text-center">
                                <button type="submit" class="inline-block w-full px-6 py-3 font-bold text-white bg-gradient-to-tl from-blue-600 to-cyan-400 rounded-lg">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
