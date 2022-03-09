@extends('base')
<?php
$role = Auth::user()->user_group_id;
use App\Models\Jadual;
?>
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm">
                            <a class="opacity-3 text-dark" href="javascript:;">
                                <svg width="12px" height="12px" class="mb-1" viewBox="0 0 45 40" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <title>shop </title>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g transform="translate(-1716.000000, -439.000000)" fill="#252f40"
                                            fill-rule="nonzero">
                                            <g transform="translate(1716.000000, 291.000000)">
                                                <g transform="translate(0.000000, 148.000000)">
                                                    <path
                                                        d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                                    </path>
                                                    <path
                                                        d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                                    </path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Permohonan
                                Penilaian</a></li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Senarai
                                Permohonan</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h5 class="font-weight-bolder">Permohonan Penilaian</h5>
            </div>
            @can('daftar permohonan')
                <div class="col-lg-6">
                    <div class="column-12">
                        <a href="/mohonpenilaian/create" class="btn bg-gradient-warning" type="submit"
                            style="float: right;">PILIH JADUAL</a>
                    </div>
                </div>
            @endcan
        </div>

        <div class="row">
            <div class="col">
                <div class="card mt-3">
                    <div class="card-header" style="background-color:#FFA500;">
                        <b class="text-white">Senarai Permohonan</b>
                    </div>

                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table table-flush" id="datatable-peserta">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">No.
                                        </th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">ID
                                            Penilaian</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Nama
                                        </th>
                                        @role('calon')
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">
                                                Sesi Penilaian</th>
                                        @endrole
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">
                                            Tarikh Penilaian</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">
                                            Surat Tawaran</th>
                                        {{-- masa dgn lokasi --}}
                                        {{-- <th class="text-uppercase text-center font-weight-bolder opacity-7">Jawatan</th> --}}
                                        @role('calon')
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">
                                                Status</th>
                                            {{-- <th class="text-uppercase text-center font-weight-bolder opacity-7">
                                                Surat Tawaran</th> --}}
                                            {{-- <th
                                                 class="text-uppercase text-center font-weight-bolder opacity-7">
                                                Penjadualan</th> --}}
                                        @endrole
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">
                                            Tindakan</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @role('calon')
                                        @foreach ($calon_3 as $key => $calon_3)
                                            <tr>
                                                <td class="text-sm text-center font-weight-normal">{{ $key + 1 }}</td>
                                                <td class="text-sm text-center font-weight-normal">{{ $calon_3['id_sesi'] }}
                                                </td>
                                                <td class="text-sm text-center font-weight-normal"
                                                    style="text-transform: uppercase;">
                                                    {{ $calon_3['nama'] }}</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    <?php
                                                    $sesi = Jadual::where('ID_PENILAIAN', $calon_3['id_sesi'])->first();
                                                    $sesi = $sesi->KOD_SESI_PENILAIAN;
                                                    ?>
                                                    Sesi {{ $sesi }}
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    {{ date('d-m-Y', strtotime($calon_3['tarikh_sesi'])) }}</td>
                                                {{-- tambah masa dgn lokasi --}}
                                                {{-- <td class="text-sm text-center font-weight-normal">{{ $calon_3['taraf_jawatan'] }}</td> --}}
                                                <td class="text-sm text-center font-weight-normal">
                                                    {{ $calon_3['status_penilaian'] }}</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    <a href="/cetak_surat/{{ $calon_3['id'] }}"
                                                        class="btn mb-0">Cetak&emsp;<i
                                                            class="far fa-file-pdf fa-lg text-danger"></i></a>
                                                </td>
                                                {{-- <td  class="text-sm text-center font-weight-normal">
                                                    @if ($calon_3['status_penilaian'] == 'Baru')
                                                        <a href="/mohonpenilaian/{{ $calon_3['id'] }}/edit"
                                                            class="btn bg-gradient-info">Penjadualan Semula</a>
                                                    @else
                                                        <button class="btn bg-gradient-white" disabled>Penjadualan
                                                            Semula</button>
                                                    @endif
                                                </td> --}}
                                                <td class="text-sm text-center font-weight-normal">
                                                    <a data-bs-toggle="modal" style="cursor: pointer"
                                                        data-bs-target="#modaldelete-{{ $calon_3->id }}">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                                <div class="modal fade" id="modaldelete-{{ $calon_3->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body text-center">
                                                                <i class="far fa-times-circle fa-7x" style="color: #ea0606"></i>
                                                                <br>
                                                                Anda pasti untuk menghapus permohonan?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn bg-gradient-secondary"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <form method="POST"
                                                                    action="/mohonpenilaian/{{ $calon_3->id }}">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="btn btn-danger" type="submit">Hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>
                                        @endforeach
                                    @elserole ('penyelaras')
                                        @foreach ($penyelaras as $key => $penyelaras)
                                            <tr>
                                                <td class="text-sm text-center font-weight-normal">{{ $key + 1 }}</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    {{ $penyelaras['id_sesi'] }}
                                                </td>
                                                <td class="text-sm text-center font-weight-normal"
                                                    style="text-transform: uppercase;">
                                                    {{ $penyelaras['nama'] }}</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    {{ date('d-m-Y', strtotime($penyelaras['tarikh_sesi'])) }}</td>
                                                {{-- masa --}}
                                                <td class="text-sm text-center font-weight-normal">
                                                    <a href="/cetak_surat/{{ $penyelaras['id'] }}"
                                                        class="btn mb-0">Cetak&emsp;<i
                                                            class="far fa-file-pdf fa-lg text-danger"></i></a>
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    <a data-bs-toggle="modal" style="cursor: pointer"
                                                        data-bs-target="#modaldelete-{{ $penyelaras['id'] }}">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                                <div class="modal fade" id="modaldelete-{{ $penyelaras['id'] }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body text-center">
                                                                <i class="far fa-times-circle fa-7x" style="color: #ea0606"></i>
                                                                <br>
                                                                Anda pasti untuk menghapus permohonan?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn bg-gradient-secondary"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <form method="POST"
                                                                    action="/mohonpenilaian/{{ $penyelaras['id'] }}">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="btn btn-danger" type="submit">Hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>
                                        @endforeach
                                    @else
                                        @foreach ($peserta as $key => $peserta)
                                            <tr>
                                                <td class="text-sm text-center font-weight-normal">{{ $key + 1 }}</td>
                                                <td class="text-sm text-center font-weight-normal">{{ $peserta['id_sesi'] }}
                                                </td>
                                                <td class="text-sm text-center font-weight-normal"
                                                    style="text-transform: uppercase;">
                                                    {{ $peserta['nama'] }}</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    {{ date('d-m-Y', strtotime($peserta['tarikh_sesi'])) }}</td>
                                                {{-- masa --}}
                                                <td class="text-sm text-center font-weight-normal">
                                                    <a href="/cetak_surat/{{ $peserta['id'] }}"
                                                        class="btn mb-0">Cetak&emsp;<i
                                                            class="far fa-file-pdf fa-lg text-danger"></i></a>
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    <a data-bs-toggle="modal" style="cursor: pointer"
                                                        data-bs-target="#modaldelete-{{ $peserta['id'] }}">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                                <div class="modal fade" id="modaldelete-{{ $peserta['id'] }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body text-center">
                                                                <i class="far fa-times-circle fa-7x" style="color: #ea0606"></i>
                                                                <br>
                                                                Anda pasti untuk menghapus permohonan?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn bg-gradient-secondary"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <form method="POST"
                                                                    action="/mohonpenilaian/{{ $peserta['id'] }}">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="btn btn-danger" type="submit">Hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>
                                        @endforeach
                                    @endrole
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://isacsupport.intan.my/chat_widget.js"></script>
    <script src="../../assets/js/plugins/datatables.js"></script>
    <script type="text/javascript">
        const dataTableBasickategori = new simpleDatatables.DataTable("#datatable-peserta", {
            searchable: true,
            fixedHeight: true,
            sortable: false
        });
    </script>
@stop
