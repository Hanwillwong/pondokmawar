@extends('layouts.main')
@section('container')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="position: absolute; right: 20px; padding: 0; background: none; border: none;">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<a href="/product" class="btn btn-primary mb-2">Back</a>

<div class="panel">
    <div id="chartharga"></div>
</div>

{{-- <form class="d-flex">
    <input class="form-control" type="search" placeholder="&#xF002;  Search" aria-label="Search" style="font-family: FontAwesome;">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form> --}}

<div class="row mt-3">
    <div class="col-lg-12 d-flex align-items-stretch">
      <div class="card w-100 table-responsive-md">
        <table class="table table-striped text-center mx-auto" id="example">
            <thead>
                <tr>
                    <td>Tanggal & Waktu</td>
                    <td>Harga Beli</td>
                    <td>Harga Jual</td>
                    <td colspan="" class="text">Action</td>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($riwayatHarga as $riwayatItem)
                    <tr>
                        <td>{{ $riwayatItem->formatted_created_at }}</td>
                        <td>{{ $riwayatItem->harga_beli }}</td>
                        <td>{{ $riwayatItem->harga_jual }}</td>
                        <td>
                            <form action="/api/riwayatharga/{{ $riwayatItem->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger"  onclick="return confirm('Yakin akan menghapus Data?')"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach --}}
            </tbody>
        </table>
      </div>
    </div>
</div>

<script>
    // api url
    let api_url = "/api/riwayatharga/{{ $product->id }}";
    
    // Defining async function
    async function getapi(url) {
    try {
        const response = await fetch(url);
        const data = await response.json();
        show(data.data);
        console.log(data);
    } catch (error) {
        console.error('Error fetching data:', error);
    }
}

    getapi(api_url);

    function show(apiData) {
        let tab = "";
        if (apiData.riwayatHarga && apiData.riwayatHarga.length > 0) {
            for (let item of apiData.riwayatHarga) {
                tab += `<tr> 
                    <td>${item.formatted_created_at}</td>
                    <td>${item.harga_beli}</td>
                    <td>${item.harga_jual}</td>
                    <td>
                        <form action="/api/riwayatharga/${item.id}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" onclick="return confirm('Yakin akan menghapus Data?')"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>`;
            }
        } else {
            tab = "<tr><td colspan='4'>Tidak ada riwayat harga</td></tr>";
        }
        document.getElementsByTagName("tbody")[0].innerHTML = tab;
    }

</script>
@endsection


@section('chart')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('chartharga', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Riwayat Perubahan Harga',
        align: 'center'
    },
    subtitle: {
        text:
            '',
        align: 'left'
    },
    xAxis: {
        categories: {!!json_encode($tanggal)!!},
        crosshair: true,
        accessibility: {
            description: 'Tanggal'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Harga'
        }
    },
    tooltip: {
        valueSuffix: ''
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [
        {
            name: 'Harga Beli',
            data: {!!json_encode($harga_beli)!!}
        },
        {
            name: 'Harga Jual',
            data: {!!json_encode($harga_jual)!!}
        }
    ]
});
</script>
@endsection