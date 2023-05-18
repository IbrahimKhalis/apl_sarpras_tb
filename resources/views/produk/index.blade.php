@extends('myLayouts.main')

@section('content')
{{-- <div class="flex justify-between items-center">
    <h2 class="intro-y text-lg font-medium mt-10">
        Produk
    </h2>
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <a href="{{ route('produk.create') }}" class="btn btn-primary shadow-md mr-2">Tambah Produk</a>
    </div>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">Jurusan</th>
                    <th class="whitespace-nowrap">Nama Kaprog</th>
                    <th class="text-center whitespace-nowrap">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produks as $produk)
                <tr>
                    <td>
                        <a href="{{ route('produk.edit', $produk->id) }}">edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- END: Data List -->
</div> --}}

<div class="grid gap-6 mt-8">
    <div class="col-span-12 lg:col-span-3 2xl:col-span-2">
        <h2 class="intro-y text-lg font-medium mr-auto mt-2">
            Produk
        </h2>
    </div>
    <div class="col-span-12 lg:col-span-9 2xl:col-span-10">
        <!-- BEGIN: File Manager Filter -->
        <div class="intro-y flex flex-col-reverse sm:flex-row items-center">
            <div class="w-full sm:w-auto relative mr-auto mt-3 sm:mt-0">
                <i class="w-4 h-4 absolute my-auto inset-y-0 ml-3 left-0 z-10 text-slate-500" data-lucide="search"></i> 
                <input type="text" class="form-control w-full sm:w-64 box px-10" placeholder="Search files">
                <div class="inbox-filter dropdown absolute inset-y-0 mr-3 right-0 flex items-center" data-tw-placement="bottom-start">
                    <i class="dropdown-toggle w-4 h-4 cursor-pointer text-slate-500" role="button" aria-expanded="false" data-tw-toggle="dropdown" data-lucide="chevron-down"></i> 
                    <div class="inbox-filter__dropdown-menu dropdown-menu pt-2">
                        <div class="dropdown-content">
                            <div class="grid grid-cols-12 gap-4 gap-y-3 p-3">
                                <div class="col-span-6">
                                    <label for="input-filter-1" class="form-label text-xs">File Name</label>
                                    <input id="input-filter-1" type="text" class="form-control flex-1" placeholder="Type the file name">
                                </div>
                                <div class="col-span-6">
                                    <label for="input-filter-2" class="form-label text-xs">Shared With</label>
                                    <input id="input-filter-2" type="text" class="form-control flex-1" placeholder="example@gmail.com">
                                </div>
                                <div class="col-span-6">
                                    <label for="input-filter-3" class="form-label text-xs">Created At</label>
                                    <input id="input-filter-3" type="text" class="form-control flex-1" placeholder="Important Meeting">
                                </div>
                                <div class="col-span-6">
                                    <label for="input-filter-4" class="form-label text-xs">Size</label>
                                    <select id="input-filter-4" class="form-select flex-1">
                                        <option>10</option>
                                        <option>25</option>
                                        <option>35</option>
                                        <option>50</option>
                                    </select>
                                </div>
                                <div class="col-span-12 flex items-center mt-3">
                                    <button class="btn btn-secondary w-32 ml-auto">Create Filter</button>
                                    <button class="btn btn-primary w-32 ml-2">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-auto flex">
                <a href="{{ route('produk.create') }}" class="btn btn-primary shadow-md mr-2">Tambah Produk</a>
                <div class="dropdown">
                    <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                        <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i> </span>
                    </button>
                    <div class="dropdown-menu w-40">
                        <ul class="dropdown-content">
                            <li>
                                <a href="" class="dropdown-item"> <i data-lucide="file" class="w-4 h-4 mr-2"></i> Share Files </a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item"> <i data-lucide="settings" class="w-4 h-4 mr-2"></i> Settings </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: File Manager Filter -->
        <!-- BEGIN: Directory & Files -->
        <div class="intro-y grid grid-cols-12 gap-3 sm:gap-6 mt-5">
            <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">
                <a href="{{ route('produk.create') }}">
                    <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                        <div class="absolute left-0 top-0 mt-3 ml-3">
                            <input class="form-check-input border border-slate-500" type="checkbox" >
                        </div>
                        <a href="" class="w-3/5 file__icon file__icon--file mx-auto">
                            <div class="file__icon__file-name">TXT</div>
                        </a>
                        <a href="" class="block font-medium mt-4 text-center truncate">Resources.txt</a> 
                        <div class="text-slate-500 text-xs text-center mt-0.5">2.2 MB</div>
                        <div class="absolute top-0 right-0 mr-2 mt-3 dropdown ml-auto">
                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-5 h-5 text-slate-500"></i> </a>
                            <div class="dropdown-menu w-40">
                                <ul class="dropdown-content">
                                    <li>
                                        <a href="" class="dropdown-item"> <i data-lucide="users" class="w-4 h-4 mr-2"></i> Share File </a>
                                    </li>
                                    <li>
                                        <a href="" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">
                <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                    <div class="absolute left-0 top-0 mt-3 ml-3">
                        <input class="form-check-input border border-slate-500" type="checkbox" >
                    </div>
                    <a href="" class="w-3/5 file__icon file__icon--image mx-auto">
                        <div class="file__icon--image__preview image-fit">
                            <img alt="Midone - HTML Admin Template" src="dist/images/preview-5.jpg">
                        </div>
                    </a>
                    <a href="" class="block font-medium mt-4 text-center truncate">preview-5.jpg</a> 
                    <div class="text-slate-500 text-xs text-center mt-0.5">1 MB</div>
                    <div class="absolute top-0 right-0 mr-2 mt-3 dropdown ml-auto">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-5 h-5 text-slate-500"></i> </a>
                        <div class="dropdown-menu w-40">
                            <ul class="dropdown-content">
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="users" class="w-4 h-4 mr-2"></i> Share File </a>
                                </li>
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">
                <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                    <div class="absolute left-0 top-0 mt-3 ml-3">
                        <input class="form-check-input border border-slate-500" type="checkbox" >
                    </div>
                    <a href="" class="w-3/5 file__icon file__icon--empty-directory mx-auto"></a> <a href="" class="block font-medium mt-4 text-center truncate">Laravel 7</a> 
                    <div class="text-slate-500 text-xs text-center mt-0.5">120 MB</div>
                    <div class="absolute top-0 right-0 mr-2 mt-3 dropdown ml-auto">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-5 h-5 text-slate-500"></i> </a>
                        <div class="dropdown-menu w-40">
                            <ul class="dropdown-content">
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="users" class="w-4 h-4 mr-2"></i> Share File </a>
                                </li>
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">
                <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                    <div class="absolute left-0 top-0 mt-3 ml-3">
                        <input class="form-check-input border border-slate-500" type="checkbox" >
                    </div>
                    <a href="" class="w-3/5 file__icon file__icon--image mx-auto">
                        <div class="file__icon--image__preview image-fit">
                            <img alt="Midone - HTML Admin Template" src="dist/images/preview-3.jpg">
                        </div>
                    </a>
                    <a href="" class="block font-medium mt-4 text-center truncate">preview-3.jpg</a> 
                    <div class="text-slate-500 text-xs text-center mt-0.5">1.4 MB</div>
                    <div class="absolute top-0 right-0 mr-2 mt-3 dropdown ml-auto">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-5 h-5 text-slate-500"></i> </a>
                        <div class="dropdown-menu w-40">
                            <ul class="dropdown-content">
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="users" class="w-4 h-4 mr-2"></i> Share File </a>
                                </li>
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">
                <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                    <div class="absolute left-0 top-0 mt-3 ml-3">
                        <input class="form-check-input border border-slate-500" type="checkbox" >
                    </div>
                    <a href="" class="w-3/5 file__icon file__icon--directory mx-auto"></a> <a href="" class="block font-medium mt-4 text-center truncate">Dota 2</a> 
                    <div class="text-slate-500 text-xs text-center mt-0.5">112 GB</div>
                    <div class="absolute top-0 right-0 mr-2 mt-3 dropdown ml-auto">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-5 h-5 text-slate-500"></i> </a>
                        <div class="dropdown-menu w-40">
                            <ul class="dropdown-content">
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="users" class="w-4 h-4 mr-2"></i> Share File </a>
                                </li>
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">
                <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                    <div class="absolute left-0 top-0 mt-3 ml-3">
                        <input class="form-check-input border border-slate-500" type="checkbox" checked>
                    </div>
                    <a href="" class="w-3/5 file__icon file__icon--directory mx-auto"></a> <a href="" class="block font-medium mt-4 text-center truncate">Repository</a> 
                    <div class="text-slate-500 text-xs text-center mt-0.5">20 KB</div>
                    <div class="absolute top-0 right-0 mr-2 mt-3 dropdown ml-auto">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-5 h-5 text-slate-500"></i> </a>
                        <div class="dropdown-menu w-40">
                            <ul class="dropdown-content">
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="users" class="w-4 h-4 mr-2"></i> Share File </a>
                                </li>
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">
                <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                    <div class="absolute left-0 top-0 mt-3 ml-3">
                        <input class="form-check-input border border-slate-500" type="checkbox" >
                    </div>
                    <a href="" class="w-3/5 file__icon file__icon--file mx-auto">
                        <div class="file__icon__file-name">PHP</div>
                    </a>
                    <a href="" class="block font-medium mt-4 text-center truncate">Routes.php</a> 
                    <div class="text-slate-500 text-xs text-center mt-0.5">1 KB</div>
                    <div class="absolute top-0 right-0 mr-2 mt-3 dropdown ml-auto">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-5 h-5 text-slate-500"></i> </a>
                        <div class="dropdown-menu w-40">
                            <ul class="dropdown-content">
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="users" class="w-4 h-4 mr-2"></i> Share File </a>
                                </li>
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">
                <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                    <div class="absolute left-0 top-0 mt-3 ml-3">
                        <input class="form-check-input border border-slate-500" type="checkbox" >
                    </div>
                    <a href="" class="w-3/5 file__icon file__icon--empty-directory mx-auto"></a> <a href="" class="block font-medium mt-4 text-center truncate">Laravel 7</a> 
                    <div class="text-slate-500 text-xs text-center mt-0.5">120 MB</div>
                    <div class="absolute top-0 right-0 mr-2 mt-3 dropdown ml-auto">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-5 h-5 text-slate-500"></i> </a>
                        <div class="dropdown-menu w-40">
                            <ul class="dropdown-content">
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="users" class="w-4 h-4 mr-2"></i> Share File </a>
                                </li>
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">
                <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                    <div class="absolute left-0 top-0 mt-3 ml-3">
                        <input class="form-check-input border border-slate-500" type="checkbox" >
                    </div>
                    <a href="" class="w-3/5 file__icon file__icon--file mx-auto">
                        <div class="file__icon__file-name">TXT</div>
                    </a>
                    <a href="" class="block font-medium mt-4 text-center truncate">Resources.txt</a> 
                    <div class="text-slate-500 text-xs text-center mt-0.5">2.2 MB</div>
                    <div class="absolute top-0 right-0 mr-2 mt-3 dropdown ml-auto">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-5 h-5 text-slate-500"></i> </a>
                        <div class="dropdown-menu w-40">
                            <ul class="dropdown-content">
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="users" class="w-4 h-4 mr-2"></i> Share File </a>
                                </li>
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">
                <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                    <div class="absolute left-0 top-0 mt-3 ml-3">
                        <input class="form-check-input border border-slate-500" type="checkbox" checked>
                    </div>
                    <a href="" class="w-3/5 file__icon file__icon--image mx-auto">
                        <div class="file__icon--image__preview image-fit">
                            <img alt="Midone - HTML Admin Template" src="dist/images/preview-10.jpg">
                        </div>
                    </a>
                    <a href="" class="block font-medium mt-4 text-center truncate">preview-10.jpg</a> 
                    <div class="text-slate-500 text-xs text-center mt-0.5">1 MB</div>
                    <div class="absolute top-0 right-0 mr-2 mt-3 dropdown ml-auto">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-5 h-5 text-slate-500"></i> </a>
                        <div class="dropdown-menu w-40">
                            <ul class="dropdown-content">
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="users" class="w-4 h-4 mr-2"></i> Share File </a>
                                </li>
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">
                <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                    <div class="absolute left-0 top-0 mt-3 ml-3">
                        <input class="form-check-input border border-slate-500" type="checkbox" checked>
                    </div>
                    <a href="" class="w-3/5 file__icon file__icon--image mx-auto">
                        <div class="file__icon--image__preview image-fit">
                            <img alt="Midone - HTML Admin Template" src="dist/images/preview-11.jpg">
                        </div>
                    </a>
                    <a href="" class="block font-medium mt-4 text-center truncate">preview-11.jpg</a> 
                    <div class="text-slate-500 text-xs text-center mt-0.5">1 MB</div>
                    <div class="absolute top-0 right-0 mr-2 mt-3 dropdown ml-auto">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-5 h-5 text-slate-500"></i> </a>
                        <div class="dropdown-menu w-40">
                            <ul class="dropdown-content">
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="users" class="w-4 h-4 mr-2"></i> Share File </a>
                                </li>
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">
                <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                    <div class="absolute left-0 top-0 mt-3 ml-3">
                        <input class="form-check-input border border-slate-500" type="checkbox" >
                    </div>
                    <a href="" class="w-3/5 file__icon file__icon--image mx-auto">
                        <div class="file__icon--image__preview image-fit">
                            <img alt="Midone - HTML Admin Template" src="dist/images/preview-2.jpg">
                        </div>
                    </a>
                    <a href="" class="block font-medium mt-4 text-center truncate">preview-2.jpg</a> 
                    <div class="text-slate-500 text-xs text-center mt-0.5">1.4 MB</div>
                    <div class="absolute top-0 right-0 mr-2 mt-3 dropdown ml-auto">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-5 h-5 text-slate-500"></i> </a>
                        <div class="dropdown-menu w-40">
                            <ul class="dropdown-content">
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="users" class="w-4 h-4 mr-2"></i> Share File </a>
                                </li>
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">
                <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                    <div class="absolute left-0 top-0 mt-3 ml-3">
                        <input class="form-check-input border border-slate-500" type="checkbox" checked>
                    </div>
                    <a href="" class="w-3/5 file__icon file__icon--file mx-auto">
                        <div class="file__icon__file-name">MP4</div>
                    </a>
                    <a href="" class="block font-medium mt-4 text-center truncate">Celine Dion - Ashes.mp4</a> 
                    <div class="text-slate-500 text-xs text-center mt-0.5">20 MB</div>
                    <div class="absolute top-0 right-0 mr-2 mt-3 dropdown ml-auto">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-5 h-5 text-slate-500"></i> </a>
                        <div class="dropdown-menu w-40">
                            <ul class="dropdown-content">
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="users" class="w-4 h-4 mr-2"></i> Share File </a>
                                </li>
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">
                <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                    <div class="absolute left-0 top-0 mt-3 ml-3">
                        <input class="form-check-input border border-slate-500" type="checkbox" >
                    </div>
                    <a href="" class="w-3/5 file__icon file__icon--image mx-auto">
                        <div class="file__icon--image__preview image-fit">
                            <img alt="Midone - HTML Admin Template" src="dist/images/preview-7.jpg">
                        </div>
                    </a>
                    <a href="" class="block font-medium mt-4 text-center truncate">preview-7.jpg</a> 
                    <div class="text-slate-500 text-xs text-center mt-0.5">1.2 MB</div>
                    <div class="absolute top-0 right-0 mr-2 mt-3 dropdown ml-auto">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-5 h-5 text-slate-500"></i> </a>
                        <div class="dropdown-menu w-40">
                            <ul class="dropdown-content">
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="users" class="w-4 h-4 mr-2"></i> Share File </a>
                                </li>
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">
                <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                    <div class="absolute left-0 top-0 mt-3 ml-3">
                        <input class="form-check-input border border-slate-500" type="checkbox" >
                    </div>
                    <a href="" class="w-3/5 file__icon file__icon--file mx-auto">
                        <div class="file__icon__file-name">MP4</div>
                    </a>
                    <a href="" class="block font-medium mt-4 text-center truncate">Celine Dion - Ashes.mp4</a> 
                    <div class="text-slate-500 text-xs text-center mt-0.5">20 MB</div>
                    <div class="absolute top-0 right-0 mr-2 mt-3 dropdown ml-auto">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-5 h-5 text-slate-500"></i> </a>
                        <div class="dropdown-menu w-40">
                            <ul class="dropdown-content">
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="users" class="w-4 h-4 mr-2"></i> Share File </a>
                                </li>
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">
                <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                    <div class="absolute left-0 top-0 mt-3 ml-3">
                        <input class="form-check-input border border-slate-500" type="checkbox" >
                    </div>
                    <a href="" class="w-3/5 file__icon file__icon--file mx-auto">
                        <div class="file__icon__file-name">MP4</div>
                    </a>
                    <a href="" class="block font-medium mt-4 text-center truncate">Celine Dion - Ashes.mp4</a> 
                    <div class="text-slate-500 text-xs text-center mt-0.5">20 MB</div>
                    <div class="absolute top-0 right-0 mr-2 mt-3 dropdown ml-auto">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-5 h-5 text-slate-500"></i> </a>
                        <div class="dropdown-menu w-40">
                            <ul class="dropdown-content">
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="users" class="w-4 h-4 mr-2"></i> Share File </a>
                                </li>
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">
                <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                    <div class="absolute left-0 top-0 mt-3 ml-3">
                        <input class="form-check-input border border-slate-500" type="checkbox" >
                    </div>
                    <a href="" class="w-3/5 file__icon file__icon--file mx-auto">
                        <div class="file__icon__file-name">MP4</div>
                    </a>
                    <a href="" class="block font-medium mt-4 text-center truncate">Celine Dion - Ashes.mp4</a> 
                    <div class="text-slate-500 text-xs text-center mt-0.5">20 MB</div>
                    <div class="absolute top-0 right-0 mr-2 mt-3 dropdown ml-auto">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-5 h-5 text-slate-500"></i> </a>
                        <div class="dropdown-menu w-40">
                            <ul class="dropdown-content">
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="users" class="w-4 h-4 mr-2"></i> Share File </a>
                                </li>
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">
                <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                    <div class="absolute left-0 top-0 mt-3 ml-3">
                        <input class="form-check-input border border-slate-500" type="checkbox" checked>
                    </div>
                    <a href="" class="w-3/5 file__icon file__icon--file mx-auto">
                        <div class="file__icon__file-name">PHP</div>
                    </a>
                    <a href="" class="block font-medium mt-4 text-center truncate">Routes.php</a> 
                    <div class="text-slate-500 text-xs text-center mt-0.5">1 KB</div>
                    <div class="absolute top-0 right-0 mr-2 mt-3 dropdown ml-auto">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-5 h-5 text-slate-500"></i> </a>
                        <div class="dropdown-menu w-40">
                            <ul class="dropdown-content">
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="users" class="w-4 h-4 mr-2"></i> Share File </a>
                                </li>
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">
                <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                    <div class="absolute left-0 top-0 mt-3 ml-3">
                        <input class="form-check-input border border-slate-500" type="checkbox" checked>
                    </div>
                    <a href="" class="w-3/5 file__icon file__icon--empty-directory mx-auto"></a> <a href="" class="block font-medium mt-4 text-center truncate">Documentation</a> 
                    <div class="text-slate-500 text-xs text-center mt-0.5">4 MB</div>
                    <div class="absolute top-0 right-0 mr-2 mt-3 dropdown ml-auto">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-5 h-5 text-slate-500"></i> </a>
                        <div class="dropdown-menu w-40">
                            <ul class="dropdown-content">
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="users" class="w-4 h-4 mr-2"></i> Share File </a>
                                </li>
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">
                <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                    <div class="absolute left-0 top-0 mt-3 ml-3">
                        <input class="form-check-input border border-slate-500" type="checkbox" >
                    </div>
                    <a href="" class="w-3/5 file__icon file__icon--empty-directory mx-auto"></a> <a href="" class="block font-medium mt-4 text-center truncate">Documentation</a> 
                    <div class="text-slate-500 text-xs text-center mt-0.5">4 MB</div>
                    <div class="absolute top-0 right-0 mr-2 mt-3 dropdown ml-auto">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-5 h-5 text-slate-500"></i> </a>
                        <div class="dropdown-menu w-40">
                            <ul class="dropdown-content">
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="users" class="w-4 h-4 mr-2"></i> Share File </a>
                                </li>
                                <li>
                                    <a href="" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Directory & Files -->
        
    </div>
</div>
@endsection