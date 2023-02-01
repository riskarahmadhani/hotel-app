@extends('layouts.admin',['title'=>'Kamar'])

@section('content-header')
    <h1 class="m-0"><i class="fas fa-bed"></i> Kamar</h1>
@endsection

@section('content')

    @can('role','admin')
        <x-status />
    @endcan

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    @can('role','admin')
                        <x-btn-create :link="route('kamar.create')"/>
                    @endcan
                </div>
                <div class="col">
                    <x-search/>
                </div>
            </div>
        </div>
        <x-card-table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Kamar</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = $data->firstItem(); ?>
                    @foreach ( $data as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ ucwords($row->nama_kamar) }}</td>
                        <td>Rp. {{ number_format($row->harga_kamar,2,',','.') }}</td>
                        <td>{{ $row->jum_kamar }}</td>
                        <td>
                            @can('role','admin')
                                <a href="{{ route('kamar.fasilitas.index',['kamar'=>$row->id]) }}" class="btn btn-xs btn-success mr-1">
                                    <i class="fas fa-tv"></i> Fasilitas
                                </a>
                            @endcan
                            <x-btn-show :link="route('kamar.show',['kamar'=>$row->id])"  />
                            @can('role','admin')
                                <x-btn-edit :link="route('kamar.edit',['kamar'=>$row->id])"  />
                                <x-btn-delete :link="route('kamar.destroy',['kamar'=>$row->id])" />
                            @endcan
                        </td>
                    </tr>  
                    @endforeach
                </tbody>
        </x-card-table>  
        <!-- ./card-body -->
        <div class="card-body pb-0 ml-auto">
            {{ $data->appends(['search' => request()->search ])->links('pagination::bootstrap-4') }}
        </div>
        {{-- ./card-body --}}
    </div>
@endsection

@section('modal')
    @can('role','admin')
        <x-modal-delete/>
    @endcan
@endsection