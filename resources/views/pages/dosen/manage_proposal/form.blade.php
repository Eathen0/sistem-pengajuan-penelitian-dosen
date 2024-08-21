@extends('layout.dosen-page')

@section('content-dosen')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tambah Proposal</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class='breadcrumb-header'>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Proposal</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section proposal">
            <div class="col-md-12">
                <form action="{{ route('manage_proposal.store') }}" method="post" enctype="multipart/form-data" class="card card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <!-- User NIDN -->
                            <div class="form-group">
                                <label for="user_nidn">User NIDN</label>
                                <select name="user_nidn" id="user_nidn" class="form-control">
                                    <option value="">Pilih...</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->nidn }}">{{ $user->name }} ({{ $user->nidn }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Skema -->
                            <div class="form-group">
                                <label for="id_skema">Skema</label>
                                <select name="id_skema" id="id_skema" class="form-control">
                                        <option>Pilih...</option>
                                    @foreach ($skemas as $skema)
                                        <option value="{{ $skema->id }}">{{ $skema->nama_skema }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Judul -->
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" name="judul" id="judul" class="form-control"
                                    placeholder="Masukan judul" required>
                                <div class="invalid-feedback">Please, isi judul proposal</div>
                            </div>

                            <!-- Nama Mitra -->
                            <div class="form-group">
                                <label for="nama_mitra">Nama Mitra</label>
                                <input type="text" name="nama_mitra" id="nama_mitra" class="form-control"
                                    placeholder="Masukan nama Mitra" required>
                                <div class="invalid-feedback">Please, isi nama mitra</div>
                            </div>

                            <!-- Alamat Mitra -->
                            <div class="form-group">
                                <label for="alamat_mitra">Alamat Mitra</label>
                                <textarea class="form-control" id="alamat_mitra" name="alamat_mitra" placeholder="Masukan alamat mitra" required></textarea>
                            </div>

                            <!-- Kata Kunci -->
                            <div class="form-group">
                                <label for="kata_kunci">Kata Kunci</label>
                                <input type="text" name="kata_kunci" id="kata_kunci" class="form-control"
                                    placeholder="Masukan kata kunci" required>
                                <div class="invalid-feedback">Please, masukan kata kunci</div>
                            </div>

                            <!-- Latar Belakang -->
                            <div class="form-group">
                                <label for="latar_belakang">Latar Belakang</label>
                                <textarea name="latar_belakang" id="latar_belakang" class="form-control" rows="5"
                                    placeholder="Masukan Latar Belakang" required></textarea>
                            </div>

                            <!-- Ringkasan -->
                            <div class="form-group">
                                <label for="ringkasan">Ringkasan</label>
                                <textarea name="ringkasan" id="ringkasan" class="form-control" rows="3" placeholder="Masukan Ringkasan" required></textarea>
                            </div>

                            <!-- Urgensi -->
                            <div class="form-group">
                                <label for="urgensi">Urgensi</label>
                                <textarea name="urgensi" id="urgensi" class="form-control" placeholder="Masukan urgensi" required></textarea>
                            </div>

                            <!-- Rumusan Masalah -->
                            <div class="form-group">
                                <label for="rumusan_masalah">Rumusan Masalah</label>
                                <textarea name="rumusan_masalah" id="rumusan_masalah" class="form-control" rows="4" placeholder="Masukan rumusan masalah" required></textarea>
                            </div>

                            <!-- Pendekatan Pemecahan Masalah -->
                            <div class="form-group">
                                <label for="pendekatan_pemecahan_masalah">Pendekatan Pemecahan Masalah</label>
                                <textarea name="pendekatan_pemecahan_masalah" id="pendekatan_pemecahan_masalah" class="form-control" rows="3"
                                    placeholder="Masukan pendekatan pemecahan masalah" required></textarea>
                            </div>

                            <!-- Kebaruan -->
                            <div class="form-group">
                                <label for="kebaruan">Kebaruan</label>
                                <textarea name="kebaruan" id="kebaruan" class="form-control" rows="3" placeholder="Masukan kebaruan" required></textarea>
                            </div>

                            <!-- Metode Penelitian -->
                            <div class="form-group">
                                <label for="metode_penelitian">Metode Penelitian</label>
                                <textarea name="metode_penelitian" id="metode_penelitian" class="form-control" rows="5"
                                    placeholder="Masukan metode penelitian" required></textarea>
                            </div>

                            <!-- Jadwal Penelitian -->
                            <div class="form-group">
                                <label for="jadwal_penelitian">Jadwal Penelitian</label>
                                <textarea name="jadwal_penelitian" id="jadwal_penelitian" class="form-control tinymce-editor"></textarea>
                            </div>

                            <!-- Daftar Pustaka -->
                            <div class="form-group">
                                <label for="daftar_pustaka">Daftar Pustaka</label>
                                <textarea name="daftar_pustaka" id="daftar_pustaka" class="form-control " rows="4"
                                    placeholder="Masukan daftar pusaka" required></textarea>
                            </div>

                            <!-- Status -->
                            <input type="hidden" name="status" value="draft">

                            <!-- Laporan Progres -->
                            <div class="form-group">
                                <label for="laporan_progres">Laporan Progres</label>
                                <input type="file" class="form-control" name="laporan_progres" id="laporan_progres">
                            </div>

                            <!-- Laporan Akhir -->
                            <div class="form-group">
                                <label for="laporan_akhir">Laporan Akhir</label>
                                <input type="file" class="form-control" name="laporan_akhir" id="laporan_akhir">
                            </div>

                            <!-- Tim Section -->
                            <h3>Tim</h3>
                            <div id="tim-sections">
                                <div class="tim-group">
                                    <!-- Nama Anggota -->
                                    <div class="form-group">
                                        <label for="nama_anggota">Nama Anggota</label>
                                        <input type="text" name="tim[0][nama]" id="nama" class="form-control"
                                            placeholder="Masukan nama anggota" required>
                                    </div>

                                    <!-- Tugas -->
                                    <div class="form-group">
                                        <label for="tugas">Tugas</label>
                                        <textarea name="tim[0][tugas]" id="tugas" class="form-control" rows="3" placeholder="Masukan tugas"
                                            required></textarea>
                                    </div>

                                    <!-- Status -->
                                    <div class="form-group">
                                        <label for="status_tim">Status</label>
                                        <select class="form-select" id="status_tim" name="tim[0][status_tim]" required>
                                            <option>Pilih...</option>
                                            <option value="Ketua">Ketua</option>
                                            <option value="Anggota">Anggota</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="button" id="add-tim" class="btn btn-secondary">Tambah Tim</button>
                            <br><br>

                            <!-- Capaian Section -->
                            <h3>Capaian</h3>
                            <div id="capaian-sections">
                                <div class="capaian-group">
                                    <!-- Tahun -->
                                    <div class="form-group">
                                        <label for="tahun">Tahun</label>
                                        <input type="number" class="form-control" id="tahun"
                                            name="capaian[0][tahun]" value="{{ old('tahun') }}" placeholder="Tahun"
                                            required min="1000" max="9999">
                                        <div class="invalid-feedback">Masukkan tahun yang valid (4 digit).</div>
                                    </div>

                                    <!-- Jenis Capaian -->
                                    <div class="form-group">
                                        <label for="jenis_capaian">Jenis Capaian</label>
                                        <select class="form-select" id="jenis_capaian" name="capaian[0][jenis_capaian]" required>
                                            <option>Pilih...</option>
                                            <option value="HKI">HKI</option>
                                            <option value="Buku Ajar">Buku Ajar</option>
                                            <option value="Naskah Jurnal">Naskah Jurnal</option>
                                        </select>
                                    </div>

                                    <!-- Indikator -->
                                    <div class="form-group">
                                        <label for="indikator">Indikator</label>
                                        <textarea name="capaian[0][indikator]" id="indikator" class="form-control" rows="3"
                                            placeholder="Masukan indikator" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="button" id="add-capaian" class="btn btn-secondary">Tambah Capaian</button>
                            <br><br>
                            <!-- Submit -->
                            <div class="form-group mt4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <script src="{{asset('assets/themes/NiceAdmin/assets/vendor/tinymce/tinymce.min.js')}}"></script>
    <script>
        let timIndex = 1;
        let capaianIndex = 1;

        document.getElementById('add-tim').addEventListener('click', function() {
            let timSection = document.createElement('div');
            timSection.classList.add('tim-group');

            timSection.innerHTML = `
            <div class="form-group">
                <label for="tim-nama-${timIndex}">Nama Anggota</label>
                <input type="text" name="tim[${timIndex}][nama]" id="tim-nama-${timIndex}" class="form-control" placeholder="Masukan nama anggota" required>
            </div>
            <div class="form-group">
                <label for="tim-tugas-${timIndex}">Tugas</label>
                <textarea name="tim[${timIndex}][tugas]" id="tim-tugas-${timIndex}" class="form-control" rows="3" placeholder="Masukan tugas" required></textarea>
            </div>
            <div class="form-group">
                <label for="tim-status_tim-${timIndex}">Status</label>
                <select name="tim[${timIndex}][status_tim]" id="tim-status_tim-${timIndex}" class="form-select">
                    <option>Pilih...</option>
                    <option value="ketua">Ketua</option>
                    <option value="anggota">Anggota</option>
                </select>
            </div>
            `;

            document.getElementById('tim-sections').appendChild(timSection);
            timIndex++;
        });

        document.getElementById('add-capaian').addEventListener('click', function() {
            let capaianSection = document.createElement('div');
            capaianSection.classList.add('capaian-group');

            capaianSection.innerHTML = `
            <div class="form-group">
                <label for="capaian-tahun-${capaianIndex}">Tahun</label>
                <input type="number" name="capaian[${capaianIndex}][tahun]" id="capaian-tahun-${capaianIndex}" class="form-control" placeholder="Tahun" required min="1000" max="9999">
                <div class="invalid-feedback">Masukkan tahun yang valid (4 digit).</div>
            </div>
            <div class="form-group">
                <label for="capaian-jenis_capaian-${capaianIndex}">Jenis Capaian</label>
                <select name="capaian[${capaianIndex}][jenis_capaian]" id="capaian-jenis_capaian-${capaianIndex}" class="form-select">
                    <option>Pilih...</option>
                    <option value="HKI">HKI</option>
                    <option value="Buku Ajar">Buku Ajar</option>
                    <option value="Naskah Jurnal">Naskah Jurnal</option>
                </select>
            </div>
            <div class="form-group">
                <label for="capaian-indikator-${capaianIndex}">Indikator</label>
                <textarea name="capaian[${capaianIndex}][indikator]" id="capaian-indikator-${capaianIndex}" class="form-control"  rows="3" placeholder="Masukan indikator" required></textarea>
            </div>
            `;

            document.getElementById('capaian-sections').appendChild(capaianSection);
            capaianIndex++;
        });

        const useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const isSmallScreen = window.matchMedia('(max-width: 1023.5px)').matches;

        tinymce.init({
            selector: 'textarea.tinymce-editor',
            plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
            editimage_cors_hosts: ['picsum.photos'],
            menubar: 'file edit view insert format tools table help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
            toolbar_sticky: true,
            toolbar_sticky_offset: isSmallScreen ? 102 : 108,
            autosave_ask_before_unload: true,
            autosave_interval: '30s',
            autosave_prefix: '{path}{query}-{id}-',
            autosave_restore_when_empty: false,
            autosave_retention: '2m',
            image_advtab: true,
            link_list: [{
                    title: 'My page 1',
                    value: 'https://www.tiny.cloud'
                },
                {
                    title: 'My page 2',
                    value: 'http://www.moxiecode.com'
                }
            ],
            image_list: [{
                    title: 'My page 1',
                    value: 'https://www.tiny.cloud'
                },
                {
                    title: 'My page 2',
                    value: 'http://www.moxiecode.com'
                }
            ],
            image_class_list: [{
                    title: 'None',
                    value: ''
                },
                {
                    title: 'Some class',
                    value: 'class-name'
                }
            ],
            importcss_append: true,
            file_picker_callback: (callback, value, meta) => {
                /* Provide file and text for the link dialog */
                if (meta.filetype === 'file') {
                    callback('https://www.google.com/logos/google.jpg', {
                        text: 'My text'
                    });
                }

                /* Provide image and alt text for the image dialog */
                if (meta.filetype === 'image') {
                    callback('https://www.google.com/logos/google.jpg', {
                        alt: 'My alt text'
                    });
                }

                /* Provide alternative source and posted for the media dialog */
                if (meta.filetype === 'media') {
                    callback('movie.mp4', {
                        source2: 'alt.ogg',
                        poster: 'https://www.google.com/logos/google.jpg'
                    });
                }
            },
            templates: [{
                    title: 'New Table',
                    description: 'creates a new table',
                    content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'
                },
                {
                    title: 'Starting my story',
                    description: 'A cure for writers block',
                    content: 'Once upon a time...'
                },
                {
                    title: 'New list with dates',
                    description: 'New List with dates',
                    content: '<div class="mceTmpl"><span class="cdate">cdate</span><br><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'
                }
            ],
            template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
            template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
            height: 600,
            image_caption: true,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            noneditable_class: 'mceNonEditable',
            toolbar_mode: 'sliding',
            contextmenu: 'link image table',
            skin: useDarkMode ? 'oxide-dark' : 'oxide',
            content_css: useDarkMode ? 'dark' : 'default',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
        });
    </script>
@endsection
