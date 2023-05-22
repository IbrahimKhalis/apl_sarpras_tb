@extends('mylayouts.main')

@section('content')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Roles
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        @can('add_roles')
        <div class="text-center">
            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#modalRole" class="btn btn-primary">Buat
                Role</a>
        </div>
        @endcan
    </div>
</div>
<div class="intro-y box p-5 mt-5">
    <div class="overflow-x-auto scrollbar-hidden">
        <div class="overflow-x-auto">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">No</th>
                        <th class="whitespace-nowrap">Role</th>
                        <th class="whitespace-nowrap">Hak Akses</th>
                        <th class="whitespace-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $role->name }}</td>

                        <td>
                            @forelse ($rolePermissions[$key] as $rolePermission)
                            {{ str_replace("_", " ", $rolePermission->name) }} <br>
                            @empty
                            -- Tidak ada hak akses --
                            @endforelse
                        </td>
                        <td><a href="{{ route('roles.edit', $role->id) }}"
                                class="btn btn-warning text-white w-12">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @can('add_roles')
    <div class="modalkey modal fade" id="modalRole" tabindex="-1" aria-labelledby="role" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('roles.store') }}" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="role">Buat Role</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="name" class="form-label">Nama Role</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text" id="nama"
                                    placeholder="Masukan nama Role" name="name" value="{{ old('name') }}" />
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="permission" class="form-label">Hak Akses</label>
                                <select class="fstdropdown-select @error('permission') is-invalid @enderror"
                                    name="permission[]" id="permission" multiple>
                                    @foreach ($permissions as $permission)
                                    <option value="{{ $permission->id }}">{{ str_replace('_', ' ', $permission->name) }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('permission')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Buat Role</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endcan
</div>
<!-- END: HTML Table Data -->
@endsection

@push('js')
@if($errors->any())
<script>
    $(document).ready(function(){
        $('#modalRole').modal('show');
    })
</script>
@endif
<script>
    $('#tab-main .a-tab').on('click', function (e) {
        console.log('oke')
        e.preventDefault()
        $('#tab-main a').removeClass('active');
        $('.tab-pane').removeClass('active');
        if ($(this).parent()[0].closest('.dropdown-menu')) {
            $(this).parent().parent().addClass('active')
        }
        $(this).addClass('active');
        $(`.tab-pane${$(this).attr('href')}`).addClass('active');
    })
</script>
@endpush