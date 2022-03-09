@extends('base')
@section('content')

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
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Laporan</a>
                </li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Laporan Statistik Keseluruhan</li>
            </ol>
            <h5 class="font-weight-bolder">Laporan Statistik Keseluruhan</h5>
        </nav>
        <div class="card mt-3">
            <div class="card-header" style="background-color:#FFA500;">
                <h5 class="text-white"> Carian</h5>
            </div>

            <div class="card-body p-3">
                <div class="row p-3 pl-0 mb-0">
                    <form style="width: 100%;" (ngSubmit)="filterCharts()">

                        <div class="row">
                            <div class="col-12">
                                <label for="input_kementerian">Kementerian/Agensi</label>
                                <select class="form-control form-control-sm" name="input_kementerian"
                                    id="input_kementerian">
                                    <option hidden selected value="">
                                        Sila Pilih
                                    </option>
                                    @foreach ($kementerians as $kementerian)
                                        <option value="{{ $kementerian->DESCRIPTION1 }}">
                                            {{ $kementerian->DESCRIPTION1 }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col d-flex justify-content-end align-items-end mt-3">

                                <button class="btn  bg-gradient-info text-uppercases mx-2" type="submit" name="search"><i
                                        class="fas fa-search"></i> cari</button>
                                <a href="/laporan/statistik-keseluruhan" class="btn  bg-gradient-danger text-uppercases"
                                    (click)="reset()">set
                                    semula</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header" style="background-color: #FFA500;">

                <div class="row  mb-0">
                    <div class="col text-center">
                        <h5 class="text-white"> STATISTIK KESELURUHAN PENCAPAIAN PENILAIAN ISAC </h5>
                        @if ($ministrys != null)
                            <h6 class="text-white" style="text-transform: uppercase">KEMENTERIAN :
                                {{ $ministrys }}</h6>
                        @else
                            <h6 class="text-white">SEMUA KEMENTERIAN</h6>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-body p-3">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0" id="tablestatistikkeseluruhan">
                        <thead>
                            <tr>
                                {{-- <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Bil.</th> --}}
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Tahun</th>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Bil. Sesi</th>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Bil. Memohon</th>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Bil. Menduduki</th>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Bil. Lulus</th>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    % Lulus</th>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Bil. Gagal</th>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    % Gagal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($bil_sesi_2021s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2021
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2021s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2021s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2021s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2021s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2021s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2021s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2021s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2022s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2022
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2022s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2022s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2022s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2022s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2022s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2022s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2022s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2023s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2023
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2023s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2023s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2023s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2023s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2023s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2023s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2023s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2024s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2024
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2024s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2024s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2024s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2024s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2024s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2024s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2024s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2025s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2025
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2025s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2025s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2025s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2025s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2025s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2025s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2025s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2026s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2026
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2026s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2026s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2026s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2026s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2026s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2026s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2026s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2027s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2027
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2027s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2027s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2027s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2027s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2027s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2027s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2027s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2028s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2028
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2028s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2028s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2028s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2028s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2028s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2028s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2028s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2029s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2029
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2029s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2029s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2029s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2029s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2029s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2029s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2029s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2030s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2030
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2030s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2030s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2030s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2030s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2030s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2030s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2030s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2031s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2031
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2031s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2031s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2031s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2031s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2031s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2031s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2031s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2032s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2032
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2032s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2032s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2032s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2032s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2032s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2032s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2032s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2033s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2033
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2033s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2033s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2033s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2033s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2033s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2033s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2033s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2034s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2034
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2034s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2034s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2034s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2034s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2034s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2034s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2034s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2035s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2035
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2035s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2035s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2035s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2035s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2035s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2035s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2035s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2036s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2036
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2036s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2036s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2036s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2036s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2036s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2036s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2036s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2037s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2037
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2037s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2037s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2037s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2037s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2037s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2037s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2037s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2038s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2038
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2038s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2038s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2038s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2038s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2038s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2038s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2038s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2039s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2039
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2039s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2039s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2039s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2039s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2039s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2039s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2039s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2040s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2040
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2040s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2040s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2040s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2040s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2040s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2040s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2040s }}
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tablestatistikkeseluruhan').DataTable({
                dom: 'Blfrtip',
                "ordering": true,
                "searching": true,
                "info": true,
                "paging": true,
                buttons: [{
                        extend: 'excelHtml5',
                        title: 'SENARAI PENCAPAIAN PENILAIAN ISAC'
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'SENARAI PENCAPAIAN PENILAIAN ISAC'
                    },
                    {
                        extend: 'csvHtml5',
                        title: 'SENARAI PENCAPAIAN PENILAIAN ISAC'
                    },
                ],
                "oLanguage": {
                    "sSearch": "Carian:",
                    "sZeroRecords": "Tiada rekod ditemui",
                    "oPaginate": {
                        "sNext": ">",
                        "sPrevious": "<",
                    },
                    "sInfo": "Menunjukkan _START_ ke _END_ daripada _TOTAL_ data",
                    "sInfoEmpty": "Menunjukkan 0 ke 0 daripada 0 data",
                    "sLengthMenu": "Menunjukkan _MENU_ data",
                }
            });
        });
    </script>
@stop
