<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 lg:col-span-12 2xl:col-span-9">
        <div class="intro-y box mt-5">
            <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base mr-auto">
                    Informasi Ruang
                </h2>
                <a href="{{ $page == 'admin' ? route('ruang.index') : '' }}" class="btn btn-danger btn-sm btn-kembali rounded">Kembali</a>
            </div>
            <div class="p-5">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 pl-0 font-medium text-gray-800 whitespace-nowrap dark:text-white w-1/4">
                                    Nama Ruang
                                </th>
                                <th scope="row" class="text-gray-900 capitalize">
                                    : {{ $data->name }}
                                </th>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 pl-0 font-medium text-gray-800 whitespace-nowrap dark:text-white w-1/4">
                                    Kategori Ruang
                                </th>
                                <th scope="row" class="text-gray-900 capitalize">
                                    : {{ $data->kategori->nama }}
                                </th>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 pl-0 font-medium text-gray-800 whitespace-nowrap dark:text-white w-1/4">
                                    Luas
                                </th>
                                <th scope="row" class="text-gray-900">
                                    : {{ $data->luas }} m²
                                </th>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 pl-0 font-medium text-gray-800 whitespace-nowrap dark:text-white w-1/4">
                                    No Registrasi
                                </th>
                                <th scope="row" class="text-gray-900">
                                    : {{ $data->no_reg }}
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-5">
                    <h5 class="text-lg font-medium mr-auto">Produks</h5>
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Kondisi / ket</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data->produk as $produk)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $produk->nama }}</td>
                                <td>{{ $produk->kode }}</td>
                                <td>{{ $produk->kondisi }} / {{ $produk->ket_produk }}</td>
                                <td>
                                    <a href="{{ ($page == 'admin' ? route('produk.show', $produk->id) : route('produk.detail.public', encodeText($produk->id))) }}" class="btn btn-primary btn-sm rounded">Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>