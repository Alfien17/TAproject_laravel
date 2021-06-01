@extends('mainadmin')
@section('judul_halaman','Data Customers')
@section('konten')
	<h5>Tambah Customers</h5>
	<form method="post" action="/mainadmin/addcstmr" enctype="multipart/form-data">
	{{ csrf_field() }}
        @if (count($errors)>0)
            <div class="alert alert-danger d-flex  align-item-center alert-dismissible fade show" role="alert">
                <ul style="list-style:none">
                    @foreach($errors->all() as $error)
                    <li><span class="fas fa-exclamation-triangle"></span>
                    {{$error}}</li>
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" class="fas fa-times"></span></button>
                    @endforeach
                </ul>
                </div>
            </div>
        @endif
        @if(Session::has('danger'))
            <div class="alert alert-success" role="alert">
                {{Session::get('danger')}}
            </div>
        @endif
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 col-form-label text-right">Nama Depan</label>
                    <div class="col-sm-7"><input type="text" name="forename" class="form-control form-control2" required="required" value="{{old('forename')}}" autocomplete="off"></div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 col-form-label text-right">Nama Belakang</label>
                    <div class="col-sm-7"><input type="text" name="surname" class="form-control form-control2" required="required" value="{{old('surname')}}" autocomplete="off"></div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 col-form-label text-right">NIK</label>
                    <div class="col-sm-7"><input type="number" name="nik" class="form-control form-control2" required="required" value="{{old('nik')}}" autocomplete="off"></div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 col-form-label text-right">Tanggal Lahir</label>
                    <div class="col-sm-7"><input type="date" name="tgl_lahir" class="form-control form-control2" required="required" value="{{old('tgl_lahir')}}"></div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 col-form-label text-right">Telepon</label>
                    <div class="col-sm-7"><input type="number" name="telp" class="form-control form-control2" required="required" value="{{old('telp')}}" autocomplete="off"></div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 col-form-label text-right">Email</label>
                    <div class="col-sm-7"><input type="email" name="email" class="form-control form-control2" required="required" value="{{old('email')}}" autocomplete="off"></div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 col-form-label text-right">Alamat</label>
            </div>
            <div class="row">
                <label class="col-sm-3 col-form-label text-right">Provinsi</label>
                <div class="col-sm-6"><input type="text" name="prov_pel" class="form-control form-control2" required="required" value="{{old('prov_pel')}}" autocomplete="off"></div>
            </div>
            <div class="row">
                <label class="col-sm-3 col-form-label text-right">Kota/Kabupaten</label>
                <div class="col-sm-6"><input type="text" name="kot_pel" class="form-control form-control2" required="required" value="{{old('kot_pel')}}" autocomplete="off"></div>
            </div>
            <div class="row">
                <label class="col-sm-3 col-form-label text-right">Kecamatan</label>
                <div class="col-sm-6" autocomplete="off"><input type="text" name="kec_pel" class="form-control form-control2" required="required" value="{{old('kec_pel')}}" autocomplete="off"></div>
            </div>
            <div class="row">
                <label class="col-sm-3 col-form-label text-right">Kode Pos</label>
                <div class="col-sm-6" autocomplete="off"><input type="number" name="kd_pos" class="form-control form-control2" required="required" value="{{old('kd_pos')}}" autocomplete="off"></div>
            </div>
            <div class="row">
                <label class="col-sm-3 col-form-label text-right">Detail</label>
                <div class="col-sm-6"><textarea name="al_detail" class="form-control form-control2" required="required" placeholder="Nama jalan, gedung, nomor rumah">{{old('al_detail')}}</textarea></div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 col-form-label text-right">Foto Profil</label>
                    <div class="col-sm-3">
                        <div class="card-body" style="width: 25rem;">
                            <div class="wrapper">
                                <div class="image" id="imagePreview">
                                    <img src="" alt="" class="image-preview">
                                </div>
                                <div class="content">
                                    <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                                    <div class="text">No file choosen, yet!</div>
                                </div>
                                <div id="cancel-btn"><i class="fas fa-times"></i></div>
                            </div><br/>
                            <input type="file" name="image" id="inpFile" hidden="">
                            <input href="#" onclick="defaultBtnActive()" class="btn btn-outline-secondary col-sm-4" value="Choose File">
                        </div>
                    </div>
                </div>
            </div>
        <div class="form-group">
            <div class="col-sm-10 text-right">
            	<a class="btn btn-light" href="/mainadmin/customers">Batal</a>
                <input type="submit" class="btn btn-primary" value="Kirim">
            </div>
        </div>
    </form>
    <script type="text/javascript">
        const wrapper = document.querySelector(".wrapper");
        const cancelBtn = document.querySelector("#cancel-btn");
        const inpFile = document.getElementById("inpFile");
        const previewContainer = document.getElementById("imagePreview");
        const previewImage = previewContainer.querySelector(".image-preview");
        function defaultBtnActive(){
            inpFile.click();
        }
        inpFile.addEventListener("change", function(){
            const file = this.files[0];
            if (file){
                const reader = new FileReader();
                previewImage.style.display = "block";

                reader.addEventListener("load",function(){
                    previewImage.setAttribute("src",this.result);
                    wrapper.classList.add("active");
                });

                cancelBtn.addEventListener("click", function(){
                     previewImage.style.display = "none";
                     wrapper.classList.remove("active");
                });
                reader.readAsDataURL(file);
            }else{
                previewImage.style.display = null;
            }
        });
    </script>
@endsection	