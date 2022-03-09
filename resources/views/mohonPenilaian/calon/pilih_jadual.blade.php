@extends('base')
@section('content')
    <?php
    use App\Models\MohonPenilaian;
    use Illuminate\Support\Facades\Auth;
    ?>
    <div class="container-fluid py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm">
                    <a class="opacity-3 text-dark" href="javascript:;">
                        <svg width="12px" height="12px" class="mb-1" viewBox="0 0 45 40" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>shop </title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1716.000000, -439.000000)" fill="#252f40" fill-rule="nonzero">
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
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Penilaian</a></li>
            </ol>
            <h5 class="font-weight-bolder">Pengurusan Penilaian</h5>
        </nav>

        <div class="row">
            <div class="col">
                <div class="card m-3">
                    <div class="card-header" style="background-color:#FFA500;">
                        <h5 class="text-white mb-0">Borang permohonan penilaian</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0 table-flush" id="datatable-basic">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">No.</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Tahap</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Masa</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Tarikh</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Kekosongan</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Platform</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Lokasi</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Pendaftaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jadual as $key => $jadual)
                                        @if ($jadual->KOD_KATEGORI_PESERTA == '01')
                                            <tr>

                                                <td class="text-sm text-center font-weight-normal">{{ $key + 1 }}.</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    {{ $jadual->KOD_TAHAP }}</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    {{ $jadual->KOD_MASA_MULA }} - {{ $jadual->KOD_MASA_TAMAT }}</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    {{ date('d-m-Y', strtotime($jadual->TARIKH_SESI)) }}</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($jadual->KEKOSONGAN == null)
                                                        0
                                                    @else
                                                        {{ $jadual->KEKOSONGAN }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">{{ $jadual->platform }}
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($jadual['KOD_KEMENTERIAN'] == null)
                                                        -
                                                    @else
                                                        {{ $jadual['LOKASI'] }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal" class="text-center">
                                                    <?php
                                                    $no_ic = Auth::user()->nric;
                                                    $done_daftar = MohonPenilaian::where('no_ic', $no_ic)
                                                        ->where('id_sesi', $jadual->ID_PENILAIAN)
                                                        ->first();
                                                    ?>
                                                    @if ($done_daftar == null)
                                                        @if ($jadual->KEKOSONGAN != 0)
                                                            <form action="/mohonpenilaian/calon/pilih_jadual" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="no_ic"
                                                                    value="{{ $no_ic }}">
                                                                <input type="hidden" name="nama"
                                                                    value="{{ $nama }}">
                                                                <input type="hidden" name="id_peserta"
                                                                    value="{{ $id_peserta }}">
                                                                <input type="hidden" name="tarikh_lahir"
                                                                    value="{{ $tarikh_lahir }}">
                                                                <input type="hidden" name="jantina"
                                                                    value="{{ $jantina }}">
                                                                <input type="hidden" name="jawatan_ketua_jabatan"
                                                                    value="{{ $jawatan_ketua_jabatan }}">
                                                                <input type="hidden" name="taraf_jawatan"
                                                                    value="{{ $taraf_jawatan }}">
                                                                <input type="hidden" name="tarikh_lantikan"
                                                                    value="{{ $tarikh_lantikan }}">
                                                                <input type="hidden" name="klasifikasi_perkhidmatan"
                                                                    value="{{ $klasifikasi_perkhidmatan }}">
                                                                <input type="hidden" name="no_telefon_pejabat"
                                                                    value="{{ $no_telefon_pejabat }}">
                                                                <input type="hidden" name="alamat1_pejabat"
                                                                    value="{{ $alamat1_pejabat }}">
                                                                <input type="hidden" name="alamat2_pejabat"
                                                                    value="{{ $alamat2_pejabat }}">
                                                                <input type="hidden" name="poskod_pejabat"
                                                                    value="{{ $poskod_pejabat }}">
                                                                <input type="hidden" name="nama_penyelia"
                                                                    value="{{ $nama_penyelia }}">
                                                                <input type="hidden" name="emel_penyelia"
                                                                    value="{{ $emel_penyelia }}">
                                                                <input type="hidden" name="no_telefon_penyelia"
                                                                    value="{{ $no_telefon_penyelia }}">
                                                                <input type="hidden" name="sesi"
                                                                    value="{{ $jadual->ID_PENILAIAN }}">
                                                                <button class="btn btn-sm bg-gradient-info"
                                                                    type="submit">Daftar</button>

                                                            </form>
                                                        @else
                                                            <button class="btn btn-sm bg-gradient-danger"
                                                                disabled>Penuh</button>
                                                        @endif
                                                    @else
                                                        <button class="btn btn-sm bg-gradient-success" disabled>Telah
                                                            daftar</button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- <div class="form-group">
                                <label>Sila pilih jadual</label>
                                <select class="form-control" name="sesi">
                                    <option hidden selected value="">Sila Pilih</option>
                                    @foreach ($jadual as $jadual)
                                        @if ($jadual->KOD_KATEGORI_PESERTA == '01')
                                            @if ($jadual->KEKOSONGAN != 0) 
                                                <option value="{{ $jadual->ID_PENILAIAN }}">
                                                    {{ date('d-m-Y', strtotime($jadual->TARIKH_SESI)) }}
                                                </option>
                                            @endif
                                        @endif
                                    @endforeach
                                </select>
                            </div> --}}

                        {{-- <div class="row">
                                <div class="col text-end">
                                    <button class="btn bg-gradient-info" type="submit">Seterusnya</button>
                                </div>
                            </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://isacsupport.intan.my/chat_widget.js"></script>
    <script src="../../assets/js/plugins/datatables.js"></script>
    <script type="text/javascript">
        const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
            searchable: true,
            fixedHeight: true
        });
    </script>
@stop
