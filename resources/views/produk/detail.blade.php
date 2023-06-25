<div class="intro-y box mt-5">
    <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
        <h2 class="font-medium text-base mr-auto">
            Informasi Produk
        </h2>
        <a href="{{ $page == 'admin' ? route('produk.index') : '' }}" class="btn btn-sm btn-danger rounded btn-kembali">Kembali</a>
    </div>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-800 whitespace-nowrap dark:text-white w-1/4">
                        Nama Produk
                    </th>
                    <th scope="row" class="text-gray-900 capitalize">
                        : {{ $data->nama }}
                    </th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-800 whitespace-nowrap dark:text-white w-1/4">
                        Merk Produk
                    </th>
                    <th scope="row" class="text-gray-900 capitalize">
                        : {{ $data->merek }}
                    </th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-800 whitespace-nowrap dark:text-white w-1/4">
                        Sekali Pakai
                    </th>
                    <th scope="row" class="text-gray-900 capitalize">
                        : {{ isset($data) ? ($data->sekali_pakai ? 'Ya' : 'Tidak') : '' }}
                    </th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-800 whitespace-nowrap dark:text-white w-1/4">
                        Kategori
                    </th>
                    <th scope="row" class="text-gray-900 capitalize">
                        : {{ $data->kategori->nama }}
                    </th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-800 whitespace-nowrap dark:text-white w-1/4">
                        Sub Kategori
                    </th>
                    <th scope="row" class="text-gray-900 capitalize">
                        : {{ $data->subcategorie->nama }}
                    </th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-800 whitespace-nowrap dark:text-white w-1/4">
                        Keterangan Produk
                    </th>
                    <th scope="row" class="text-gray-900 capitalize">
                        : {{ $data->ket_produk }}
                    </th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-800 whitespace-nowrap dark:text-white w-1/4">
                        Keterangan Detail Produk
                    </th>
                    <th scope="row" class="text-gray-900 capitalize">
                        : {{ $data->ket_kondisi }}
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="p-5">
        <h2 class="text-lg font-medium mr-auto">Gambar Produk</h2>
        <div class="flex">
            @forelse ($data->fotos as $foto)
            <a href="{{ asset('storage/' . $foto->file) }}" data-fancybox="gallery">
                <img src="{{ asset('storage/' . $foto->file) }}" alt=""
                    style="object-fit: cover;aspect-ratio: 1/1;margin: 10px;box-shadow: 0 3px 6px #0000001c;width: 8rem;" />
            </a>
            @empty
            <div class="p-4 mb-4 mt-2 text-center text-sm text-blue-800 rounded-lg bg-blue-100 dark:bg-gray-800 dark:text-blue-400"
                role="alert"> Tidak ada gambar
            </div>
            @endforelse
        </div>
    </div>
</div>