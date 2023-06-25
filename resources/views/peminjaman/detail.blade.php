<div class="intro-y box">
    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
        <h2 class="font-bold text-base mr-auto">
            Detail Peminjaman
        </h2>
        @if ($page == 'admin')
        <a href="{{ route('peminjamans.index') }}" class="btn btn-sm btn-danger rounded">Kembali</a>
        @endif
    </div>

    <div class="flex">
        <div class="w-1/2">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <tbody>
                        @if ($page == 'public')
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-800 whitespace-nowrap dark:text-white w-1/4">
                                Sekolah
                            </th>
                            <th scope="row" class="text-gray-900">
                                {{ $data->sekolah->nama }}
                            </th>
                        </tr>
                        @endif
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-800 whitespace-nowrap dark:text-white w-1/4">
                                Tahun Ajaran Peminjaman
                            </th>
                            <th scope="row" class="text-gray-900">
                                {{ $data->tahunajaran->tahun_awal }}/{{ $data->tahunajaran->tahun_akhir }}
                            </th>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-800 whitespace-nowrap dark:text-white w-1/4">
                                Kode Peminjaman
                            </th>
                            <th scope="row" class="text-gray-900 capitalize">
                                {{ $data->kode }}
                            </th>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-800 whitespace-nowrap dark:text-white w-1/4">
                                Nama Peminjam
                            </th>
                            <th scope="row" class="text-gray-900 capitalize">
                                {{ $data->nama }}
                            </th>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-800 whitespace-nowrap dark:text-white w-1/4">
                                Email Peminjam
                            </th>
                            <th scope="row" class="text-gray-900 capitalize">
                                {{ $data->email }}
                            </th>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-800 whitespace-nowrap dark:text-white w-1/4">
                                Kelas Peminjam
                            </th>
                            <th scope="row" class="text-gray-900 capitalize">
                                {{ $data->kelas->nama }}
                            </th>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-800 whitespace-nowrap dark:text-white w-1/4">
                                Jenis Peminjaman
                            </th>
                            <th scope="row" class="text-gray-900 capitalize">
                                {{ $data->jenis }}
                            </th>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-800 whitespace-nowrap dark:text-white w-1/4">
                                Kategori Peminjaman
                            </th>
                            <th scope="row" class="text-gray-900 capitalize">
                                {{ $data->kategori->nama }}
                            </th>
                        </tr>
                        @if ($data->jenis == 'sarana')
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-800 whitespace-nowrap dark:text-white w-1/4">
                                Sub Kategori Peminjaman
                            </th>
                            <th scope="row" class="text-gray-900 capitalize">
                                {{ $data->subcategorie->nama }}
                            </th>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-800 whitespace-nowrap dark:text-white w-1/4">
                                Jumlah Peminjaman
                            </th>
                            <th scope="row" class="text-gray-900 capitalize">
                                {{ $data->jml_peminjaman }}
                            </th>
                        </tr>
                        @else
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-800 whitespace-nowrap dark:text-white w-1/4">
                                Ruang yang dipinjam
                            </th>
                            <th scope="row" class="text-gray-900 capitalize color-primary">
                                <a href="{{ $page == 'admin' ? route('ruang.show', $data->ruang ? $data->ruang->id : '') : route('ruang.detail.public', encodeText($data->ruang ? $data->ruang->id : '')) }}">{{ $data->ruang ?
                                    $data->ruang->name : '' }}</a>
                            </th>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="w-1/2">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-800 whitespace-nowrap dark:text-white w-1/4">
                                Tanggal Peminjaman
                            </th>
                            <th scope="row" class="text-gray-900 capitalize">
                                {{ $data->tgl_peminjaman }}
                            </th>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-800 whitespace-nowrap dark:text-white w-1/4">
                                Tanggal Pengembalian
                            </th>
                            <th scope="row" class="text-gray-900 capitalize">
                                {{ $data->tgl_pengembalian }}
                            </th>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-800 whitespace-nowrap dark:text-white w-1/4">
                                Jumlah Email Penagihan
                            </th>
                            <th scope="row" class="text-gray-900 capitalize">
                                {{ $data->email_penagihan ? $data->email_penagihan : 0 }}
                            </th>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-800 whitespace-nowrap dark:text-white w-1/4">
                                Status Peminjaman
                            </th>
                            <th scope="row" class="text-gray-900 capitalize">
                                {{ $data->status }}
                            </th>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-800 whitespace-nowrap dark:text-white w-1/4">
                                Status Pengembalian
                            </th>
                            <th scope="row" class="text-gray-900 capitalize">
                                {{ $data->status_pengembalian ? 'Sudah' : 'Belum' }}
                            </th>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-800 whitespace-nowrap dark:text-white w-1/4">
                                Keterangan
                            </th>
                            <th scope="row" class="text-gray-900 capitalize">
                                {{ $data->ket }}
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if ($data->jenis == 'sarana')
    <div class="p-5">
        <h2 class="font-medium text-base mr-auto">
            Produk Dipinjam
        </h2>
        <table class="table table-striped" id="">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">No</th>
                    <th class="whitespace-nowrap">Nama</th>
                    <th class="whitespace-nowrap">Sub Kategori</th>
                    <th class="whitespace-nowrap">Merek</th>
                    <th class="whitespace-nowrap">Kondisi</th>
                    <th class="whitespace-nowrap">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data->produks as $produk)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $produk->nama }}</td>
                    <td>{{ $produk->subcategorie->nama }}</td>
                    <td>{{ $produk->merek }}</td>
                    <td>{{ $produk->kondisi }}</td>
                    <td>
                        @if ($page == 'admin')
                        <a href="{{ route('produk.show', $produk->id) }}"
                            class="btn btn-primary btn-sm rounded">Detail</a>
                        @else
                        <a href="{{ route('produk.detail.public', encodeText($produk->id)) }}"
                            class="btn btn-primary btn-sm rounded">Detail</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    <div class="p-5">
        <h2 class="font-medium text-base mr-auto">
            Tanda Tangan
        </h2>
        <img src="{{ asset('ttd/' . $data->ttd) }}" alt="">
        <h2 class="font-medium text-base mr-auto mt-3">
            Foto Peminjaman
        </h2>
        <img src="{{ asset('foto_peminjaman/' . $data->foto_peminjaman) }}" alt="" class="mt-2">
        @if ($data->status_pengembalian)
        <h2 class="font-medium text-base mr-auto mt-3">
            Foto Pengembalian
        </h2>
        <img src="{{ asset('foto_pengembalian/' . $data->foto_pengembalian) }}" alt="" class="mt-2">
        @endif
    </div>
</div>