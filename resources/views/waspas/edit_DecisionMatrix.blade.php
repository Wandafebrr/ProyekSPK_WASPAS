@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Decision Matrix - {{ $alternatif->nama_alternatif }}</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form class="max-w-sm mx-auto" method="post" action="{{ route('decision-matrix.update', $alternatif->id) }}">
            @csrf
            @method('PUT')
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 rounded-s-lg" >
                                Kriteria
                            </th>
                            <th scope="col" class="px-6 py-3 rounded-e-lg">
                                Nilai
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kriteria as $kriteriaItem)
                            <tr class="bg-white border-b dark:bg-white dark:border-gray-700">
                                <td class="px-9 py-2 font-medium text-gray-900 dark:text-gray-900">
                                    {{ $kriteriaItem->nama_kriteria }}</td>
                                <td class="px-9 py-2 font-medium text-gray-900 dark:text-gray-900">
                                    <input type="text" name="value[{{ $kriteriaItem->id }}]" value="{{ $matrixTable[$kriteriaItem->id] ?? '' }}" class="form-control">
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="px-6 py-4">
                                <button type="submit"
                                    class="text-[#41403D] bg-[#E9E2D0] hover:bg-[#BEBAAE] focus:ring-2 focus:ring-gray-700 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Submit</button>
                            </td>
                        </tr>
                    </tbody>
                    
                </table>
                
            </div>
            <br>
            
        </form>
    </div>
@endsection
