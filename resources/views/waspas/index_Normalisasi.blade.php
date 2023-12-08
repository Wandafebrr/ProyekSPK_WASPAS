@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="pull-left px-6 py-2 text-center">
            <p class="text-2xl font-bold">Tabel Normalisasi</p>
        </div>
        <br>
        @if(!empty($normalisasiTable))
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-3">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-white uppercase bg-[#726274] dark:text-white">
                    <tr>
                        <th>Alternatif</th>
                        @foreach($kriteriaNames as $kriteriaId => $kriteriaName)
                            <th>{{ $kriteriaName }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($normalisasiTable as $alternatifId => $kriteriaValues)
                        <tr class="bg-white border-b dark:bg-white dark:border-gray-700">
                            <th class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-gray-900">{{ \App\Models\Alternatif::find($alternatifId)->nama_alternatif }}</th>
                            @foreach($kriteriaNames as $kriteriaId => $kriteriaName)
                                <th class=" font-medium text-gray-900 dark:text-gray-900">{{ $kriteriaValues[$kriteriaId] ?? '' }}</th>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
            <p>Tidak ada data Decision Matrix yang tersimpan.</p>
        @endif
    </div>
@endsection
