@extends('mylayouts.main')

@section('content')

{{-- <div class="card">
    <div class="card-body">
        <h4 class="card-title">Sekolah</h4>
        <a href="{{ route('sekolah.create') }}" class="btn btn-primary">Tambah</a>
        <div class="table table-responsive table-hover text-center">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Name</th>
                        <th scope="col">NPSN</th>
                        <th scope="col" class="">Kepala Sekolah</th>
                        <th scope="col">Alamat</th>
                        @if (auth()->user()->can('edit_sekolah') || auth()->user()->can('delete_sekolah'))
                        <th scope="col">Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schools as $sekolah)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>
                            @if ($sekolah->logo != '/img/tutwuri.png')
                            <img src="{{ asset('storage/' . $sekolah->logo) }}" alt=""
                                style="width: 50px;height:50px;object-fit: cover">
                            @else
                            <img src="{{ $sekolah->logo }}" alt="" style="width: 50px;height:50px;object-fit: cover">
                            @endif
                        </td>
                        <td>{{ $sekolah->nama }}</td>
                        <td>{{ $sekolah->npsn }}</td>
                        <td>{{ $sekolah->kepala_sekolah }}</td>
                        <td>{{ $sekolah->alamat }}</td>
                        @if (auth()->user()->can('edit_sekolah') || auth()->user()->can('delete_sekolah'))
                        <td>
                            <a href="{{ route('sekolah.show', $sekolah->id) }}"
                                class="btn btn-primary btn-sm rounded">Detail</a>
                            @if (auth()->user()->can('delete_sekolah'))
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="deleteData('{{ route('sekolah.destroy', [$sekolah->id]) }}')"
                                style="width: 5rem; margin: 0.1rem; border-radius: 5px; font-weight: 500;">Hapus</button>
                            @endif
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> --}}

<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-Medium mr-auto">
        Sekolah
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <button class="btn btn-primary shadow-md mr-2">
            <a href="{{ route('sekolah.create') }}">
                Tambah Sekolah
            </a>
        </button>
        <div class="dropdown ml-auto sm:ml-0">
            <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i> </span>
            </button>
            <div class="dropdown-menu w-40">
                <ul class="dropdown-content">
                    <li>
                        <a href="" class="dropdown-item"> <i data-lucide="file-plus" class="w-4 h-4 mr-2"></i> New Category </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-item"> <i data-lucide="users" class="w-4 h-4 mr-2"></i> New Group </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="intro-y box p-5 mt-5">
    <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
        <form id="tabulator-html-filter-form" class="xl:flex sm:mr-auto" >
            <div class="sm:flex items-center sm:mr-4">
                <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Field</label>
                <select id="tabulator-html-filter-field" class="form-select w-full sm:w-32 2xl:w-full mt-2 sm:mt-0 sm:w-auto">
                    <option value="name">Name</option>
                    <option value="category">Category</option>
                    <option value="remaining_stock">Remaining Stock</option>
                </select>
            </div>
            <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Type</label>
                <select id="tabulator-html-filter-type" class="form-select w-full mt-2 sm:mt-0 sm:w-auto" >
                    <option value="like" selected>like</option>
                    <option value="=">=</option>
                    <option value="<">&lt;</option>
                    <option value="<=">&lt;=</option>
                    <option value=">">></option>
                    <option value=">=">>=</option>
                    <option value="!=">!=</option>
                </select>
            </div>
            <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Value</label>
                <input id="tabulator-html-filter-value" type="text" class="form-control sm:w-40 2xl:w-full mt-2 sm:mt-0" placeholder="Search...">
            </div>
            <div class="mt-2 xl:mt-0">
                <button id="tabulator-html-filter-go" type="button" class="btn btn-primary w-full sm:w-16" >Go</button>
                <button id="tabulator-html-filter-reset" type="button" class="btn btn-secondary w-full sm:w-16 mt-2 sm:mt-0 sm:ml-1" >Reset</button>
            </div>
        </form>
        <div class="flex mt-5 sm:mt-0">
            <button id="tabulator-print" class="btn btn-outline-secondary w-1/2 sm:w-auto mr-2"> <i data-lucide="printer" class="w-4 h-4 mr-2"></i> Print </button>
            <div class="dropdown w-1/2 sm:w-auto">
                <button class="dropdown-toggle btn btn-outline-secondary w-full sm:w-auto" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export <i data-lucide="chevron-down" class="w-4 h-4 ml-auto sm:ml-2"></i> </button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li>
                            <a id="tabulator-export-csv" href="javascript:;" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export CSV </a>
                        </li>
                        <li>
                            <a id="tabulator-export-json" href="javascript:;" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export JSON </a>
                        </li>
                        <li>
                            <a id="tabulator-export-xlsx" href="javascript:;" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export XLSX </a>
                        </li>
                        <li>
                            <a id="tabulator-export-html" href="javascript:;" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export HTML </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">No</th>
                    <th class="whitespace-nowrap">Logo</th>
                    <th class="whitespace-nowrap">School Name</th>
                    <th class="whitespace-nowrap">NPSN</th>
                    <th class="whitespace-nowrap">Kepala Sekolah</th>
                    <th class="whitespace-nowrap">Alamat</th>
                    @if (auth()->user()->can('edit_sekolah') || auth()->user()->can('delete_sekolah'))
                    <th class="whitespace-nowrap">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($schools as $sekolah)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if ($sekolah->logo != '/img/tutwuri.png')
                            <img src="{{ asset('storage/' . $sekolah->logo) }}" alt=""
                                style="width: 50px;height:50px;object-fit: cover">
                            @else
                            <img src="{{ $sekolah->logo }}" alt="" style="width: 50px;height:50px;object-fit: cover">
                            @endif
                        </td>
                        <td>{{ $sekolah->nama }}</td>
                        <td>{{ $sekolah->npsn }}</td>
                        <td>{{ $sekolah->kepala_sekolah }}</td>
                        <td>{{ $sekolah->alamat }}</td>
                        @if (auth()->user()->can('edit_sekolah') || auth()->user()->can('delete_sekolah'))
                        <td>
                            <a href="{{ route('sekolah.show', $sekolah->id) }}"
                                class="btn btn-primary btn-sm rounded">Detail</a>
                            @if (auth()->user()->can('delete_sekolah'))
                            <button type="submit" class="btn btn-danger btn-sm rounded"
                                onclick="deleteData('{{ route('sekolah.destroy', [$sekolah->id]) }}')"
                               >Hapus</button>
                            @endif
                        </td>
                        @endif
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection