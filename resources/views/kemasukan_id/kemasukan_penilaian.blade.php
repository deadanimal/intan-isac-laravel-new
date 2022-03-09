@extends('base_exam')
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
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Penilaian</a></li>
            </ol>
            <h5 class="font-weight-bolder">Kemasukan Penilaian</h5>
        </nav>

        <div class="row">
            <div class="col">
                <div class="card m-3">
                    <div class="card-header" style="background-color:#FFA500;">
                        <h5 class="text-white mb-0">Sesi Penilaian</h5>
                    </div>
                    <form action="/kemasukan_penilaian/{{ $id_penilaian }}/jawapan_calon" method="POST" id="penilaian">
                        @csrf
                        <div class=" card-body">
                            <div class="row justify-content-center">
                                <div class="col-auto">
                                    <div id="ten-countdown"></div>
                                </div>
                            </div>

                            @foreach ($soalan_penilaian as $index => $soalan)
                                <?php
                                $soalanbetul = str_replace('&nbsp;', ' ', $soalan->soalan);
                                ?>

                                <div class="row m-3 mt-0" style="display: none;" id="{{ $index }}">
                                    {{-- <div class="row mb-3">
                                        <div class="col">
                                            <strong>{{ $soalan->penyataan_soalan }}</strong>
                                        </div>
                                    </div> --}}
                                    @if ($soalan->muat_naik_fail != null)
                                        <div class="row ">
                                            <div class="col text-center">
                                                <img src="/storage/{{ $soalan->muat_naik_fail }}"
                                                    alt="soalan{{ $index }}" style="max-width: 300px;">
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col">

                                        <div class="row">
                                            <div class="col-auto">
                                                {{ $index + 1 }}.
                                            </div>
                                            <div class="col">
                                                {!! $soalanbetul !!}
                                            </div>
                                        </div>

                                        {{-- single choice --}}
                                        @if ($soalan->jenis_soalan == 'single_choice')

                                            <input type="hidden" value="{{ $soalan->id }}"
                                                name="soalan_{{ $index }}[]">
                                            <input type="hidden" id="checktextarea">
                                            <div class="form-check mb-0">
                                                <input class="form-check-input" type="radio"
                                                    name="soalan_{{ $index }}[]" id="rb1{{ $index }}"
                                                    onchange="check(rb1)" value="{{ $soalan->pilihan_jawapan }}">
                                                <label class="custom-control-label"
                                                    for="customRadio1">{{ $soalan->pilihan_jawapan }}</label>
                                            </div>
                                            @if ($soalan->pilihan_jawapan1 != null)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="soalan_{{ $index }}[]" id="rb2{{ $index }}"
                                                        onchange="check(rb2)" value="{{ $soalan->pilihan_jawapan1 }}">
                                                    <label class="custom-control-label"
                                                        for="customRadio2">{{ $soalan->pilihan_jawapan1 }}</label>
                                                </div>
                                            @endif
                                            @if ($soalan->pilihan_jawapan2 != null)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="soalan_{{ $index }}[]" id="rb3{{ $index }}"
                                                        onchange="check(rb3)" value="{{ $soalan->pilihan_jawapan2 }}">
                                                    <label class="custom-control-label"
                                                        for="customRadio3">{{ $soalan->pilihan_jawapan2 }}</label>
                                                </div>
                                            @endif
                                            @if ($soalan->pilihan_jawapan3 != null)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="soalan_{{ $index }}[]" id="rb4{{ $index }}"
                                                        onchange="check(rb4)" value="{{ $soalan->pilihan_jawapan3 }}">
                                                    <label class="custom-control-label"
                                                        for="customRadio4">{{ $soalan->pilihan_jawapan3 }}</label>
                                                </div>
                                            @endif

                                            {{-- true_orfalse --}}
                                        @elseif($soalan->jenis_soalan == 'true_or_false')
                                            <input type="hidden" value="{{ $soalan->id }}"
                                                name="soalan_{{ $index }}[]">
                                            <div class="form-check mb-0">
                                                <input class="form-check-input" type="radio"
                                                    name="soalan_{{ $index }}[]" id="customRadio1" value="True">
                                                <label class="custom-control-label" for="customRadio1">Betul</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="soalan_{{ $index }}[]" id="customRadio2" value="False">
                                                <label class="custom-control-label" for="customRadio2">Salah</label>
                                            </div>

                                            {{-- fill in the blank --}}
                                        @elseif($soalan->jenis_soalan == 'fill_in_the_blank')
                                            <input type="hidden" value="{{ $soalan->id }}"
                                                name="soalan_{{ $index }}[]">
                                            <div class="form-group">
                                                <label for="fill_in_the_blank" class="form-control-label">Jawapan:</label>
                                                <input class="form-control" type="text" id="fill_in_the_blank"
                                                    name="soalan_{{ $index }}[]">
                                            </div>

                                            {{-- multiple choice --}}
                                        @elseif($soalan->jenis_soalan == 'multiple_choice')
                                            <input type="hidden" value="{{ $soalan->id }}"
                                                name="soalan_{{ $index }}[]">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Jawapan:</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="fcustomCheck1"
                                                        name="soalan_{{ $index }}[]"
                                                        value="{{ $soalan->pilihan_jawapan }}">
                                                    <label class="custom-control-label"
                                                        for="customCheck1">{{ $soalan->pilihan_jawapan }}</label>
                                                </div>
                                                @if ($soalan->pilihan_jawapan1 != null)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="fcustomCheck1"
                                                            name="soalan_{{ $index }}[]"
                                                            value="{{ $soalan->pilihan_jawapan1 }}">
                                                        <label class="custom-control-label"
                                                            for="customCheck1">{{ $soalan->pilihan_jawapan1 }}</label>
                                                    </div>
                                                @endif
                                                @if ($soalan->pilihan_jawapan2 != null)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="fcustomCheck1"
                                                            name="soalan_{{ $index }}[]"
                                                            value="{{ $soalan->pilihan_jawapan2 }}">
                                                        <label class="custom-control-label"
                                                            for="customCheck1">{{ $soalan->pilihan_jawapan2 }}</label>
                                                    </div>
                                                @endif
                                                @if ($soalan->pilihan_jawapan3 != null)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="fcustomCheck1"
                                                            name="soalan_{{ $index }}[]"
                                                            value="{{ $soalan->pilihan_jawapan3 }}">
                                                        <label class="custom-control-label"
                                                            for="customCheck1">{{ $soalan->pilihan_jawapan3 }}</label>
                                                    </div>
                                                @endif
                                            </div>

                                            {{-- ranking --}}
                                        @elseif($soalan->jenis_soalan == 'ranking')

                                            <input type="hidden" value="{{ $soalan->id }}"
                                                name="soalan_{{ $index }}[]">
                                            <div class="form-group">
                                                <label class="form-control-label">Jawapan:</label>
                                                <input class="form-control" type="text"
                                                    name="soalan_{{ $index }}[]">
                                            </div>

                                            {{-- subjective --}}
                                        @elseif($soalan->jenis_soalan == 'subjective')

                                            <input type="hidden" value="{{ $soalan->id }}"
                                                name="soalan_{{ $index }}[]">
                                            <div class="form-group">
                                                <label class="form-control-label">Jawapan:</label>
                                                <input class="form-control" type="text"
                                                    name="soalan_{{ $index }}[]">
                                            </div>
                                        @endif


                                    </div>
                                </div>

                            @endforeach
                            <div class="row">
                                <div class="col">
                                    <div class="row mt-5 mb-2">
                                        <div class="col-lg-2 text-center">
                                            <a class="btn btn-sm btn-outline-secondary" style="display: none;" id="kembali"
                                                onclick="kembali()" di>sebelum</a>
                                        </div>
                                        <div class="col-lg-8 text-center">
                                            @foreach ($soalan_penilaian as $index => $soalan)
                                                <a class="btn btn-sm px-3 btn-danger" id="buttontest{{ $index }}"
                                                    onclick="goToSoalanModal({{ $index }})">{{ $index + 1 }}</a>
                                            @endforeach
                                        </div>
                                        <div class="col-lg-2 text-center">
                                            <a class="btn btn-sm btn-outline-secondary" id="seterusnya"
                                                onclick="seterusnya()">selepas</a>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_sesi" value="{{ $id_penilaian }}">
                                    <input type="hidden" name="masa_mula" value="{{ $masa_mula }}">
                                    <input type="hidden" name="timer" value="" id="timer">

                                    <div class="row justify-content-center px-4">
                                        {{-- <div class="col-lg-auto">
                                            <a class="btn bg-gradient-info" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">Semak status soalan</a>
                                        </div> --}}
                                        <div class="col-lg-auto">
                                            <button type="button" class="btn bg-gradient-info" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                Seterusnya
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body text-center">
                                                <i class="fas fa-exclamation-circle fa-7x" style="color: #d4872f"></i>
                                                <br>
                                                Adakah anda pasti untuk tamatkan bahagian ini? Anda tidak boleh kembali
                                                menjawab bahagian ini jika anda teruskan.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn bg-gradient-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn bg-gradient-success">Ok</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </form>

                    {{-- <input type="hidden" id="test">
                    <button class="btn btn-danger" id="buttontest">check</button> --}}

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Status soalan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @foreach ($soalan_penilaian as $index => $soalan)
                                        <a class="btn btn-sm px-3 btn-danger" id="buttontest{{ $index }}"
                                            onclick="goToSoalanModal({{ $index }})">{{ $index + 1 }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://isacsupport.intan.my/chat_widget.js"></script>
    <script type="text/javascript">
        // on load
        // simpan soalan dalam array
        // for each array generate 1 page element
        // button utk go next slide
        // button utk go previous slide
        // button utk go jump soalan
        var pages = []
        var current_page = 0


        $(document).ready(function() {
            console.log(current_page);
            var soalan_array = <?php echo $soalan_penilaian; ?>

            for (let i = 0; i < soalan_array.length; i++) {
                pages.push(i)
            }

            createQNavigator(pages);
            createQNavigator2(pages);

            $("#0").show();


        });



        $('#test').blur(function() {
            if ($("#test").val().length !== 0) {
                $("#buttontest").removeClass("btn-danger");
                $("#buttontest").addClass('btn-success');
            } else {
                $("#buttontest").removeClass("btn-danger");
                $("#buttontest").addClass('btn-danger');
            }
        });

        $('.form-check-input').click(function() {
            for (let i = 0; i < pages.length; i++) {
                if ($('#rb1' + i).is(':checked') || $('#rb2' + i).is(':checked') || $('#rb3' + i).is(':checked') ||
                    $('#rb4' + i).is(':checked')) {
                    $("#buttontest" + i).removeClass("btn-danger");
                    $("#buttontest" + i).addClass('btn-success');
                    console.log('sini' + '#rb1' + i);
                }
            }
        });

        function clicked() {
            if (confirm('Anda pasti untuk ke bahagian soalan seterusnya?')) {
                yourformelement.submit();
            } else {
                return false;
            }
        }

        function createQNavigator(pages) {
            var navigator = "";
            for (let i = 0; i < pages.length; i++) {
                navigator = navigator +
                    `<a class="btn btn-sm px-3 btn-outline-secondary" onclick="goToSoalan(${i})">${i+1}</a> `
            }

            $("#q-navigation").append(navigator);
        }

        function createQNavigator2(pages) {

            var navigator_2 = `
            <div class="row justify-content-between">
                <div class="col-auto ">
                    <a class="btn btn-sm btn-outline-secondary" id="kembali" onclick="kembali()">kembali</a>
                </div>
                <div class="col-auto">
                    <a class="btn btn-sm btn-outline-secondary" id="seterusnya" onclick="seterusnya()">seterusnya</a>
                </div>
            </div>`;

            // $("#q-navigation2").append(navigator_2);
        }

        function goToSoalan(id) {
            current_page = id;
            $("#" + id).show();

            for (let i = 0; i < pages.length; i++) {
                if (i !== id) {
                    $("#" + i).hide();
                }
            }

            if ((current_page - 1) > 0) {
                $("#kembali").hide();
            } else {
                $("#kembali").show();
            }

            if ((current_page + 1) == (pages.length)) {
                $("#seterusnya").hide();
            } else {
                $("#seterusnya").show();
            }

        }

        function goToSoalanModal(id) {
            current_page = id;
            $("#" + id).show();

            for (let i = 0; i < pages.length; i++) {
                if (i !== id) {
                    $("#" + i).hide();
                }
            }

            if ((current_page - 1) == -1) {
                $("#kembali").hide();
            } else {
                $("#kembali").show();
            }

            if ((current_page + 1) == (pages.length)) {
                $("#seterusnya").hide();
            } else {
                $("#seterusnya").show();
            }
        }

        function kembali() {
            if (current_page !== 0) {
                console.log(current_page);
                let prev_page = current_page - 1;
                console.log(prev_page);
                $("#" + prev_page).show();

                current_page = prev_page;

                for (let i = 0; i < pages.length; i++) {
                    if (i !== prev_page) {
                        $("#" + i).hide();
                    }
                }

                if ((current_page - 1) == -1) {
                    $("#kembali").hide();
                }

                $("#seterusnya").show();
            } else {
                $("#kembali").hide();
            }
        }

        function seterusnya() {
            if (current_page !== (pages.length - 1)) {
                console.log(current_page);
                let prev_page = +current_page + 1;
                console.log(prev_page);
                $("#" + prev_page).show();

                current_page = prev_page;

                for (let i = 0; i < pages.length; i++) {
                    if (i !== prev_page) {
                        $("#" + i).hide();
                    }
                }
                if ((current_page + 1) == (pages.length)) {
                    $("#seterusnya").hide();
                }

                $("#kembali").show();
            } else {
                // alert("page last");
                $("#seterusnya").hide();
            }
        }

        function check(id) {
            var a = document.getElementById(id);
            var b = document.getElementById("checktextarea");
            var c = 'test';

            console.log(a);
            if (a.checked == true) {
                alert(c);
                b.value = c;
            } else {
                b.value = c;
                console.log(b.value);
            }
        }
    </script>
@stop
