@extends('layouts.master')
@section('content')
    <div class="g-pos-rel">
        <div class="container">
            <div class="row justify-content-lg-between">
                <div class="col-md-12 g-pt-50 g-pt-100--md g-pb-70">
                    <div class="mb-5">
                        <h2>Daftar Aspirasi Anda</h2>
                    </div>
                    <!--Basic Table-->
                    <div class="table-responsive">
                        <table class="table table-bordered u-table--v2">
                            <thead class="text-uppercase g-letter-spacing-1">
                            <tr>
                                <th class="g-font-weight-300 g-color-black">Tanggal</th>
                                <th class="g-font-weight-300 g-color-black">Dewan</th>
                                <th class="g-font-weight-300 g-color-black">Kategori</th>
                                <th class="g-font-weight-300 g-color-black g-min-width-200">Aspirasi</th>
                                <th class="g-font-weight-300 g-color-black text-nowrap">Status</th>
                                <th class="g-font-weight-300 g-color-black">Aksi</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($aspirasi as $aspirasi)
                            <tr>
                                <td class="align-middle">{{ $aspirasi->created_at->diffForHumans() }}</td>
                                <td class="align-middle text-nowrap">
                                    @if($aspirasi->caleg)
                                    <div class="media">
                                        <img class="d-flex g-width-40 g-height-40 rounded-circle g-mr-10"
                                             src="{{ $aspirasi->caleg->foto }}"
                                             alt="Image Description">
                                        <div class="media-body align-self-center">
                                            <h5 class="h6 align-self-center g-font-weight-600 g-color-purple mb-0">{{$aspirasi->caleg->nama_calon}}</h5>
                                            <span class="g-font-size-12">{{$aspirasi->caleg->parpol->singkatan}}</span>
                                        </div>
                                    </div>
                                    @endif
                                </td>
                                <td class="align-middle">{{ $aspirasi->kategori->nama_kategori }}</td>
                                <td class="align-middle">{!! substr(strip_tags($aspirasi->aspirasi), 0, 200) !!} ..</td>
                                <td class="align-middle text-center">
                                    <span class="u-label {{$aspirasi->status_label}} g-rounded-20 g-px-10">{{ $aspirasi->status_name  }}</span>
                                </td>
                                <td class="align-middle text-nowrap text-center">
                                    <a class="g-color-gray-dark-v5 g-text-underline--none--hover g-pa-5" href="#"
                                       data-toggle="tooltip" data-placement="top" data-original-title="Edit">
                                        <i class="icon-pencil g-font-size-18 g-mr-7"></i>
                                    </a>
                                    <a class="g-color-gray-dark-v5 g-text-underline--none--hover g-pa-5" href="#"
                                       data-toggle="tooltip" data-placement="top" data-original-title="Delete">
                                        <i class="icon-trash g-font-size-18 g-mr-7"></i>
                                    </a>
                                    <a class="g-color-gray-dark-v5 g-text-underline--none--hover g-pa-5" href="#"
                                       data-toggle="tooltip" data-placement="top" data-original-title="Print">
                                        <i class="icon-printer g-font-size-18 g-mr-7"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!--End Basic Table-->
                </div>
            </div>
        </div>
    </div>
@stop