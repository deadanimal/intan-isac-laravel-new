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
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Penilaian</a></li>
            </ol>
            <h5 class="font-weight-bolder">Permohonan Penilaian</h5>
        </nav>

        <form action="/mohonpenilaian" method="POST">
            @csrf
            <div class="card mt-4" id="basic-info">
                <div class="card-header" style="background-color:#FFA500;">
                    <h5 class="text-white">Borang permohonan penilaian</h5>
                </div>
                <br>
                <div class="card-body pt-0">
                    <p class="text-sm">
                        Sila pastikan semua informasi berikut adalah benar dan tepat. Sekiranya ada
                        sebarang
                        pertukaran dalam profil anda, Sila kemaskini di form yang dibawah. Jika
                        ada sebarang
                        pertanyaan sila hubungi Penolong Pegawai Teknologi maklumat. Sekian Terima
                        Kasih.
                    </p>
                    <div class="pl-lg-4 pb-lg-4">
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4">
                                    ID Penilaian
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3" name="id_sesi"
                                    value="{{ $sesi_id->ID_PENILAIAN }}" readonly>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <input type="hidden" name="ID_PESERTA" value="{{ $user_profils->ID_PESERTA }}">
                            <div class="col-3">
                                <label class="form-control-label mr-4">
                                    No MyKad/Polis/Tentera/Pasport<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3" type="text"
                                    value="{{ $user_profils->NO_KAD_PENGENALAN }}" maxlength="12" size="12" required
                                    name="NO_KAD_PENGENALAN"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="{{ $user_profils->EMEL_PESERTA }}">
                                    E-mel
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3" id="{{ $user_profils->EMEL_PESERTA }}"
                                    type="email" name="EMEL_PESERTA" value="{{ $user_profils->EMEL_PESERTA }}">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="input_kod_gelaran">
                                    Gelaran
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                @if (!empty($user_profils->KOD_GELARAN))
                                    <select class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                        id="input_kod_gelaran" required>
                                        {{-- <option hidden selected>{{ $gelaran_user->DESCRIPTION1 }}</option> --}}
                                        <option hidden selected value="{{ $user_profils->KOD_GELARAN }}">
                                            {{ $user_profils->KOD_GELARAN }}</option>
                                        @foreach ($kod_gelarans as $kod_gelaran)
                                            <option value="{{ $kod_gelaran->REFERENCECODE }}">
                                                {{ $kod_gelaran->DESCRIPTION1 }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <select class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                        id="input_kod_gelaran" required>
                                        <option hidden selected value="">Sila Pilih</option>
                                        @foreach ($kod_gelarans as $kod_gelaran)
                                            <option value="{{ $kod_gelaran->REFERENCECODE }}">
                                                {{ $kod_gelaran->DESCRIPTION1 }}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="{{ $user_profils->NAMA_PESERTA }}}">
                                    Nama Penuh<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3" id="{{ $user_profils->NAMA_PESERTA }}"
                                    type="text" name="NAMA_PESERTA" value=" {{ $user_profils->NAMA_PESERTA }}"
                                    style="text-transform:uppercase" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="{{ $user_profils->TARIKH_LAHIR }}">
                                    Tarikh Lahir<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3" id="{{ $user_profils->TARIKH_LAHIR }}"
                                    type="date" name="TARIKH_LAHIR" value="{{ $user_profils->TARIKH_LAHIR }}" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="input_kod_jantina">
                                    Jantina<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                @if ($user_profils->KOD_JANTINA != null)
                                    <select class="form-control form-control-sm ml-3" name="KOD_JANTINA"
                                        id="input_kod_jantina" required>
                                        <option hidden selected value="{{ $user_profils->KOD_JANTINA }}">
                                            {{ $user_profils->KOD_JANTINA }}</option>
                                        <option value="Lelaki">Lelaki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                @else
                                    <select class="form-control form-control-sm ml-3" name="KOD_JANTINA"
                                        id="input_kod_jantina" required>
                                        <option hidden selected value="">Sila Pilih</option>
                                        <option value="Lelaki">Lelaki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="input_kod_gelaran_jawatan">
                                    Gelaran Jawatan
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN_JAWATAN"
                                    id="input_kod_gelaran_jawatan" type="text"
                                    value="{{ $user_profils->KOD_GELARAN_JAWATAN }}">
                                <span><small><i>Contoh: Pegawai Teknologi Maklumat, Gred
                                            F41/F44</i></small></span>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="input_peringkat">
                                    Peringkat<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control form-control-sm ml-3" name="KOD_PERINGKAT" id="input_peringkat"
                                    required>
                                    <option hidden selected value="{{ $user_profils->KOD_PERINGKAT }}">
                                        {{ $user_profils->KOD_PERINGKAT }}</option>
                                    @foreach ($peringkats as $peringkat)
                                        <option value="{{ $peringkat->DESCRIPTION1 }}">
                                            {{ $peringkat->DESCRIPTION1 }}</option>
                                    @endforeach
                                </select>
                                {{-- <input class="form-control form-control-sm ml-3" name="KOD_PERINGKAT"
                                id="{{ $user_profils->KOD_PERINGKAT }}" type="text"
                                value="{{ $user_profils->KOD_PERINGKAT }}" required> --}}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="input_klasifikasi_perkhidmatan">
                                    Klasifikasi Perkhidmatan<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control form-control-sm ml-3" name="KOD_KLASIFIKASI_PERKHIDMATAN"
                                    id="input_klasifikasi_perkhidmatan" required>
                                    <option hidden selected value="{{ $user_profils->KOD_KLASIFIKASI_PERKHIDMATAN }}">
                                        {{ $user_profils->KOD_KLASIFIKASI_PERKHIDMATAN }}
                                    </option>
                                    @foreach ($klasifikasi_perkhidmatans as $klasifikasi_perkhidmatan)
                                        <option value="{{ $klasifikasi_perkhidmatan->DESCRIPTION1 }}">
                                            {{ $klasifikasi_perkhidmatan->DESCRIPTION1 }}</option>
                                    @endforeach
                                </select>
                                {{-- <input class="form-control form-control-sm ml-3"
                                name="KOD_KLASIFIKASI_PERKHIDMATAN"
                                id="{{ $user_profils->KOD_KLASIFIKASI_PERKHIDMATAN }}" type="text"
                                value="{{ $user_profils->KOD_KLASIFIKASI_PERKHIDMATAN }}" required> --}}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="input_gred_jawatan">
                                    Gred Jawatan<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control form-control-sm ml-3" name="KOD_GRED_JAWATAN"
                                    id="input_gred_jawatan" required>
                                    <option hidden selected value="{{ $user_profils->KOD_GRED_JAWATAN }}">
                                        {{ $user_profils->KOD_GRED_JAWATAN }}</option>
                                    @foreach ($gred_jawatans as $gred_jawatan)
                                        <option value="{{ $gred_jawatan->DESCRIPTION1 }}">
                                            {{ $gred_jawatan->DESCRIPTION1 }}</option>
                                    @endforeach
                                </select>
                                {{-- <input class="form-control form-control-sm ml-3" name="KOD_GRED_JAWATAN"
                                id="{{ $user_profils->KOD_GRED_JAWATAN }}" type="text"
                                value="{{ $user_profils->KOD_GRED_JAWATAN }}" required> --}}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="input_taraf_perjawatan">
                                    Taraf Perjawatan<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control form-control-sm ml-3" name="KOD_TARAF_PERJAWATAN"
                                    id="input_taraf_perjawatan" required>
                                    <option hidden selected value="{{ $user_profils->KOD_TARAF_PERJAWATAN }}">
                                        {{ $user_profils->KOD_TARAF_PERJAWATAN }}
                                    </option>
                                    @foreach ($taraf_perjawatans as $taraf_perjawatan)
                                        <option value="{{ $taraf_perjawatan->DESCRIPTION1 }}">
                                            {{ $taraf_perjawatan->DESCRIPTION1 }}</option>
                                    @endforeach
                                </select>
                                {{-- <input class="form-control form-control-sm ml-3" name="KOD_TARAF_PERJAWATAN"
                                id="{{ $user_profils->KOD_TARAF_PERJAWATAN }}" type="text"
                                value="{{ $user_profils->KOD_TARAF_PERJAWATAN }}" required> --}}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="input_jenis_perkhidmatan">
                                    Jenis Perkhidmatan<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control form-control-sm ml-3" name="KOD_JENIS_PERKHIDMATAN"
                                    id="input_jenis_perkhidmatan" required>
                                    <option hidden selected value="{{ $user_profils->KOD_JENIS_PERKHIDMATAN }}">
                                        {{ $user_profils->KOD_JENIS_PERKHIDMATAN }}
                                    </option>
                                    @foreach ($jenis_perkhidmatans as $jenis_perkhidmatan)
                                        <option value="{{ $jenis_perkhidmatan->DESCRIPTION1 }}">
                                            {{ $jenis_perkhidmatan->DESCRIPTION1 }}</option>
                                    @endforeach
                                </select>
                                {{-- <input class="form-control form-control-sm ml-3" name="KOD_JENIS_PERKHIDMATAN"
                                id="{{ $user_profils->KOD_JENIS_PERKHIDMATAN }}" type="text"
                                value="{{ $user_profils->KOD_JENIS_PERKHIDMATAN }}" required> --}}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="{{ $user_profils->TARIKH_LANTIKAN }}">
                                    Tarikh Lantikan<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3" name="TARIKH_LANTIKAN"
                                    id="{{ $user_profils->TARIKH_LANTIKAN }}" type="date"
                                    value="{{ $user_profils->TARIKH_LANTIKAN }}" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="input_no_tel_pejabat">
                                    No Telefon Pejabat<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3" name="NO_TELEFON_PEJABAT"
                                    id="input_no_tel_pejabat" type="text" maxlength="10"
                                    value="{{ $user_profils->NO_TELEFON_PEJABAT }}"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                    required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="input_no_tel_bimbit">
                                    No Telefon Bimbit
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3" name="NO_TELEFON_BIMBIT"
                                    id="input_no_tel_bimbit" type="text" value="{{ $user_profils->NO_TELEFON_BIMBIT }}"
                                    maxlength="11"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="input_gelaran_ketua_jabatan">
                                    Jawatan Ketua Jabatan<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3" name="GELARAN_KETUA_JABATAN"
                                    id="input_gelaran_ketua_jabatan" type="text"
                                    value="{{ $user_profils->GELARAN_KETUA_JABATAN }}" style="text-transform:uppercase"
                                    required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="input_kementerian">
                                    Kementerian<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control form-control-sm ml-3" name="KOD_KEMENTERIAN"
                                    id="input_kementerian" required>
                                    <option hidden selected value="{{ $user_profils->KOD_KEMENTERIAN }}">
                                        {{ $user_profils->KOD_KEMENTERIAN }}
                                    </option>
                                    @foreach ($kementerians as $kementerian)
                                        <option value="{{ $kementerian->DESCRIPTION1 }}">
                                            {{ $kementerian->DESCRIPTION1 }}</option>
                                    @endforeach
                                </select>
                                {{-- <input class="form-control form-control-sm ml-3" name="KOD_KEMENTERIAN"
                                id="input_kementerian" type="text"
                                value="{{ $user_profils->KOD_KEMENTERIAN }}" required> --}}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4">
                                    Agensi<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control form-control-sm ml-3" name="KOD_JABATAN" id="input_kementerian"
                                    required>
                                    <option hidden selected value="{{ $user_profils->KOD_JABATAN }}">
                                        {{ $user_profils->KOD_JABATAN }}
                                    </option>
                                    <option>TIDAK BERKAITAN</option>
                                    @foreach ($jabatans as $jabatan)
                                        <option value="{{ $jabatan->DESCRIPTION1 }}">
                                            {{ $jabatan->DESCRIPTION1 }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="{{ $user_profils->BAHAGIAN }}">
                                    Bahagian
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3" name="BAHAGIAN"
                                    id="{{ $user_profils->BAHAGIAN }}" type="text"
                                    value="{{ $user_profils->BAHAGIAN }}">
                                <span><small><i>Sila masukkan maklumat lengkap tempat bertugas
                                            anda</i></small></span>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="input_alamat_1">
                                    Alamat Pejabat 1<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3" name="ALAMAT_1" id="input_alamat_1"
                                    type="text" value="{{ $user_profils->ALAMAT_1 }}" style="text-transform:uppercase"
                                    required>
                            </div>
                        </div>
                        {{-- <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="input_alamat_2">
                                    Alamat Pejabat 2
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3" name="ALAMAT_2"
                                    id="input_alamat_2" type="text" value="{{ $user_profils->ALAMAT_2 }}"
                                    style="text-transform:uppercase">
                            </div>
                        </div> --}}
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="input_poskod">
                                    Poskod<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3" name="POSKOD" id="input_poskod"
                                    type="text"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                    maxlength="5" size="5" value="{{ $user_profils->POSKOD }}" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="{{ $user_profils->BANDAR }}">
                                    Bandar<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3" name="BANDAR"
                                    id="{{ $user_profils->BANDAR }}" type="text" value="{{ $user_profils->BANDAR }}"
                                    required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="input_negeri">
                                    Negeri<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control form-control-sm ml-3" name="KOD_NEGERI" id="input_negeri"
                                    required>
                                    <option hidden selected value="{{ $user_profils->KOD_NEGERI }}">
                                        {{ $user_profils->KOD_NEGERI }}
                                    </option>
                                    @foreach ($negeris as $negeri)
                                        <option value="{{ $negeri->DESCRIPTION1 }}">
                                            {{ $negeri->DESCRIPTION1 }}</option>
                                    @endforeach
                                </select>
                                {{-- <input class="form-control form-control-sm ml-3" name="KOD_NEGERI"
                                id="input_negeri" type="text"
                                value="{{ $user_profils->KOD_NEGERI }}" required> --}}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="input_nama_penyelia">
                                    Nama Penyelia
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3" name="NAMA_PENYELIA"
                                    id="input_nama_penyelia" type="text" style="text-transform:uppercase"
                                    value="{{ $user_profils->NAMA_PENYELIA }}">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="{{ $user_profils->EMEL_PENYELIA }}">
                                    E-mel Penyelia<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3" name="EMEL_PENYELIA"
                                    id="{{ $user_profils->EMEL_PENYELIA }}" type="email"
                                    value="{{ $user_profils->EMEL_PENYELIA }}" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="{{ $user_profils->NO_TELEFON_PENYELIA }}">
                                    No Telefon Penyelia
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3" name="NO_TELEFON_PENYELIA"
                                    id="{{ $user_profils->NO_TELEFON_PENYELIA }}" type="text"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                    value="{{ $user_profils->NO_TELEFON_PENYELIA }}" maxlength="11">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <button class="btn bg-gradient-success text-center" type="submit" id="tekan">Hantar</button>
                        </div>
                    </div>

                    {{-- <section class="preloader" id="preload">
                        <div class="spinner" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div class="word">
                            <span>Sila Tunggu...</span>
                        </div>
                    </section> --}}

                </div>
            </div>
            {{-- <div>
                <div class="row mb-2">
                    <div class="col-3">
                        <label class="form-control-label mr-4">
                            ID Penilaian
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-8">
                        {{ $sesi_id['ID_PENILAIAN'] }}
                        <input class="form-control" type="hidden" value="{{ $sesi_id['ID_PENILAIAN'] }}"
                            name="id_sesi">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                        <label class="form-control-label mr-4">
                            ID Calon
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-8">
                        {{ $calon }}
                        <input class="form-control" type="hidden" value="{{ $calon }}" name="id_calon">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                        <label class="form-control-label mr-4">
                            Tarikh sesi
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-8">
                        {{ date('d-m-Y', strtotime($sesi_id['TARIKH_SESI'])) }}
                        <input class="form-control" type="hidden" value="{{ $sesi_id['TARIKH_SESI'] }}"
                            name="tarikh_sesi">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                        <label class="form-control-label mr-4">
                            No MyKad/Polis/Tentera/Pasport
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-8">
                        <input class="form-control" type="text" value="{{ $details->NoKP }}" name="no_ic">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                        <label class="form-control-label mr-4">
                            Nama
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-8">
                        <input class="form-control  " type="text" value="{{ $details->Nama }}" name="nama">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                        <label class="form-control-label mr-4">
                            Tarikh lahir
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-8">
                        <input class="form-control " type="text"
                            value="{{ date('d-m-Y', strtotime($details->TarikhLahir)) }}" name="tarikh_lahir">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                        <label class="form-control-label mr-4">
                            Jantina
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-8">
                        <input class="form-control  " type="text" value="{{ $details->Jantina }}" name="jantina">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                        <label class="form-control-label mr-4">
                            Jawatan
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-8">
                        <input class="form-control  " type="text" value="{{ $details->Jawatan }}"
                            name="jawatan_ketua_jabatan">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                        <label class="form-control-label mr-4">
                            Taraf Jawatan
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-8">
                        <input class="form-control  " type="text" value="{{ $details->SkimPerkhidmatan }}"
                            name="taraf_jawatan">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                        <label class="form-control-label mr-4">
                            Tarikh lantikan
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-8">
                        <input class="form-control" type="date" name="tarikh_lantikan">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                        <label class="form-control-label mr-4">
                            Klasifikasi perkhidmatan
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-8">
                        <input class="form-control  " type="text" value="{{ $details->KlasifikasiPerkhidmatan }}"
                            name="klasifikasi_perkhidmatan">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                        <label class="form-control-label mr-4">
                            Nombor telefon pejabat
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-8">
                        <input class="form-control  " type="text" value="{{ $details->TelPejabat }}"
                            name="no_telefon_pejabat">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                        <label class="form-control-label mr-4">
                            Alamat pejabat 1
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-8">
                        <input class="form-control  " type="text" value="" name="alamat1_pejabat">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                        <label class="form-control-label mr-4">
                            Alamat pejabat 2
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-8">
                        <input class="form-control  " type="text" value="" name="alamat2_pejabat">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                        <label class="form-control-label mr-4">
                            Poskod
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-8">
                        <input class="form-control  " type="text" value="{{ $details->Poskod }}" name="poskod_pejabat">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                        <label class="form-control-label mr-4">
                            Nama penyelia
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-8">
                        <input class="form-control  " type="text" value="{{ $details->NamaPPP }}" name="nama_penyelia">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                        <label class="form-control-label mr-4">
                            Emel penyelia
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-8">
                        <input class="form-control  " type="text" value="{{ $details->Email_PPP }}"
                            name="emel_penyelia">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                        <label class="form-control-label mr-4">
                            Nombor telefon penyelia
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-8">
                        <input class="form-control  " type="text" value="" name="no_telefon_penyelia">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col text-center">
                        <button type="submit" class="btn bg-gradient-success">Hantar</button>
                    </div>
                </div>
            </div> --}}

        </form>
    </div>
    <script>
        $(document).on('submit', 'form', function() {
            setTimeout(function() {
                window.location = "/mohonpenilaian";
            }, 7000);
        });
    </script>
@stop
