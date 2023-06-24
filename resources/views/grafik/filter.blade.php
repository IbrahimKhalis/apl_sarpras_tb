<div class="filter flex gap-3">
    <form action="" class="form-filter">
        <input type="hidden" name="bulan" value="{{ request('bulan') }}">
        <input type="hidden" name="tahun" value="{{ request('tahun') }}">
    </form>
    <select id="bulan" class="tom-select">
        <option value="all" {{ request('bulan') ? (request('bulan')=='all' ? 'selected' : '' ) : 'selected' }}>Semua
            Bulan</option>
        @foreach (config('services.bulan') as $key => $bulan)
        <option value="{{ $key + 1 }}" {{ request('bulan') ? (request('bulan')==$key+1 ? 'selected' : '' ) : '' }}>
            {{ $bulan }}
        </option>
        @endforeach
    </select>
    <select id="tahun" class="tom-select">
        <option value="all" {{ request('tahun') ? (request('tahun')=='all' ? 'selected' : '' ) : 'selected' }}>Semua
            tahun</option>
        @foreach ($tahuns as $key => $tahun)
        <option value="{{ $key + 1 }}" {{ request('tahun') ? (request('tahun')==$key+1 ? 'selected' : '' ) : '' }}>
            {{ $tahun }}
        </option>
        @endforeach
    </select>
</div>

<script>
    $('select#bulan, select#tahun').on('change', function(){
      $('.form-filter input[name=bulan]').val($('select#bulan').val())
      $('.form-filter input[name=tahun]').val($('select#tahun').val())
      $('.form-filter').submit();
    })
</script>