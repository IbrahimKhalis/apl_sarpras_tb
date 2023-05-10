@extends('myLayouts.main')

@section('content')
<div class="form-inline"> <label for="horizontal-form-1" class="form-label sm:w-20">Jurusan</label> <input
        id="horizontal-form-1" type="text" class="form-control" placeholder="PPLG"> </div>
<div class="form-inline mt-5"> <label for="horizontal-form-2" class="form-label sm:w-20">Kaprog</label> <input
        id="horizontal-form-2" type="password" class="form-control" placeholder="Hesti Herawati"> </div>


<div class="sm:ml-20 sm:pl-5 mt-5"> <button class="btn btn-primary">Save</button> </div>
@endsection
