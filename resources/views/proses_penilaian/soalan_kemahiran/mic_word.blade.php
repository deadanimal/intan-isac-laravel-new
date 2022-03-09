@extends('base_exam')
@section('content')

    <div class="px-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm">
                    <a class="opacity-3 text-dark" href="/profil">
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
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Penilaian</a>
                </li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Soalan Kemahiran</li>
            </ol>
            <h6 class="font-weight-bolder">Pemprosesan Perkataan</h6>
        </nav>

        <div class="container-fluid pb-3">
            <div class="card mb-4">
                <div class="card-header" style="background-color:#FFA500;">
                    <h4>Sila jawab semua soalan.</h4>
                </div>
                <div class="card-body">
                    <form action="/soalan-kemahiran-word/{{ $id_penilaian }}/1/save" method="POST" id="penilaian">
                        @csrf
                        <input type="hidden" name="timer" value="" id="timer">
                    </form>
                    <div class="col-xl-12">
                        @foreach ($soalankemahiranwords as $soalankemahiranword)
                            <h3 class="h5">Set {{ $soalankemahiranword->id_soalankemahiran }}</h3>
                            @if ($soalankemahiranword->arahan_umum != null)
                                <h5>{!! $soalankemahiranword->arahan_umum !!}</h5>
                            @endif

                            <hr class="my-3" style="width:100%; margin:0; height: 5px; color: #F7B42C">

                            @if ($soalankemahiranword->arahan_soalan != null)
                                <h6>{!! $soalankemahiranword->arahan_soalan !!}</h6>
                            @endif

                            @if ($soalankemahiranword->soalan_1 != null)
                                <p>{!! $soalankemahiranword->soalan_1 !!}</p>
                                <ul class="mt-2">
                                    <button class="btn btn-success" value="{{ $soalankemahiranword->id }}" type="submit"
                                        onclick="window.open('/soalan-kemahiran-word/{{ $id_penilaian }}/{{ $soalankemahiranword->id }}', 'popup', 'width=600','height=400');"
                                        target="popup">Pemprosesan Perkataan</button>
                                </ul>
                            @endif

                            @if ($soalankemahiranword->soalan_2 != null)
                                <p>{!! $soalankemahiranword->soalan_2 !!}</p>
                            @endif

                            @if ($soalankemahiranword->soalan_3 != null)
                                <p>{!! $soalankemahiranword->soalan_3 !!}</p>
                            @endif

                            @if ($soalankemahiranword->soalan_4 != null)
                                <p>{!! $soalankemahiranword->soalan_4 !!}</p>
                            @endif

                            @if ($soalankemahiranword->soalan_5 != null)
                                <p>{!! $soalankemahiranword->soalan_5 !!}</p>
                            @endif

                            @if ($soalankemahiranword->soalan_6 != null)
                                <p>{!! $soalankemahiranword->soalan_6 !!}</p>
                            @endif

                            @if ($soalankemahiranword->soalan_7 != null)
                                <p>{!! $soalankemahiranword->soalan_7 !!}</p>
                            @endif

                            @if ($soalankemahiranword->soalan_8 != null)
                                <p>{!! $soalankemahiranword->soalan_8 !!}</p>
                            @endif

                            @if ($soalankemahiranword->soalan_9 != null)
                                <p>{!! $soalankemahiranword->soalan_9 !!}</p>
                            @endif

                            @if ($soalankemahiranword->soalan_10 != null)
                                <p>{!! $soalankemahiranword->soalan_10 !!}</p>
                            @endif

                            @if ($soalankemahiranword->soalan_11 != null)
                                <p>{!! $soalankemahiranword->soalan_11 !!}</p>
                            @endif

                            @if ($soalankemahiranword->soalan_12 != null)
                                <p>{!! $soalankemahiranword->soalan_12 !!}</p>
                            @endif

                            @if ($soalankemahiranword->soalan_13 != null)
                                <p>{!! $soalankemahiranword->soalan_13 !!}</p>
                            @endif

                            @if ($soalankemahiranword->soalan_14 != null)
                                <p>{!! $soalankemahiranword->soalan_14 !!}</p>
                            @endif

                            @if ($soalankemahiranword->soalan_15 != null)
                                <p>{!! $soalankemahiranword->soalan_15 !!}</p>
                            @endif
                        @endforeach
                        {{-- <ol>
                            <li>
                                Anda dikehendaki klik butang Pemprosesan Perkataan di bawah untuk memulakan aplikasi
                                Pemprosesan Perkataan.
                                <ul class="mt-2">
                                    <a class="btn btn-success" onclick="tsw_open_demo_window();"> Pemprosesan Perkataan
                                        <span class="btn-inner--icon ml-2"></span></a>
                                </ul>
                            </li>
                            <li>
                                Perenggan B hingga F hendaklah diisih (Sort) mengikut turutan abjad (Ascending).
                            </li>
                            <li>
                                Perenggan pertama dokumen hendaklah diformatkan seperti berikut :-
                                <ul>
                                    <li>
                                        Tukar jenis Font kepada Font Tahoma saiz 12
                                    </li>
                                    <li>
                                        Line Spacing Double (2)
                                    </li>
                                    <li>
                                        Align Justify
                                    </li>
                                </ul>
                            <li>
                                Warnakan perkataan Microsoft Office di perenggan kedua dokumen anda kepada warna Standard
                                Color
                                (Strong Red).
                            </li>
                            <li>
                                Hitamkan (Bold) setiap perkataan XML.
                            </li>
                            <li>
                                Tukarkan Format Tajuk dokumen iaitu 'Overview of Microsoft Office Word 2007' kepada Saiz
                                Font
                                14.
                            </li>
                            <li>
                                Insert Header ke dalam dokumen anda dan pilih Header : Alphabet. Taip Tajuk dokumen ke dalam
                                ruang yang disediakan dalam Header.
                            </li>
                            <li>
                                Insert Page Number ke dalam dokumen anda dan pilih Page Number : Bottom of Page : Plain
                                Number 1.
                            </li>
                            <li>
                                Sila klik butang Simpan (Save) untuk tamat menjawab soalan Pemprosesan Perkataan.
                            </li>
                            <li>
                                Untuk menamatkan bahagian ini, klik butang <span style="color: red">TUTUP</span> untuk
                                keluar dari Pemprosesan Perkataan.
                            </li>
                            <li>
                                Sila klik butang <span style="color: green">SETERUSNYA</span> dibawah untuk kebahagian
                                soalan seterusnya.
                            </li>
                        </ol> --}}
                    </div>
                    <div class="col-xl-12" style="text-align: right">
                        <a class="btn btn-info" data-bs-toggle="modal" style="cursor: pointer"
                            data-bs-target="#modal-email-seterusnya">
                            Seterusnya
                        </a>

                        <div class="modal fade" id="modal-email-seterusnya" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body text-center">
                                        <i class="fas fa-exclamation-circle fa-7x" style="color: #d4872f"></i>
                                        <br>
                                        Adakah anda pasti untuk ke soalan seterusnya? Anda tidak boleh kembali
                                        menjawab bahagian ini jika anda teruskan.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn bg-gradient-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <a href="/soalan-kemahiran-email/{{ $id_penilaian }}"
                                            class="btn btn-success">Ok</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://isacsupport.intan.my/chat_widget.js"></script>
    <script src="../../assets/js/plugins/datatables.js" type="text/javascript"></script>
    <script type="text/javascript">
        const dataTableSoalanKemahiranWord = new simpleDatatables.DataTable("#datatable_soalan_kemahiran_word", {
            searchable: true,
            fixedHeight: true
        });
    </script>
@stop
