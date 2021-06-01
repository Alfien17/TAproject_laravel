@extends('main')
@section('konten')
    @foreach($akun as $p)
    <form method="post" action="/posteditakun" enctype="multipart/form-data">
    {{ csrf_field() }}
        @if (count($errors)>0)
            <div class="alert alert-danger d-flex  align-item-center alert-dismissible fade show fixed-top" role="alert">
                <ul style="list-style:none">
                    @foreach($errors->all() as $error)
                    <li><span class="fas fa-exclamation-triangle"></span>
                    {{$error}}</li>
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" class="fas fa-times"></span></button>
                    @endforeach
                </ul>
                </div>
        @endif
<div class="container mb-3">
    <div class="mt-4">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/akun">Account</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Account</li>
          </ol>
        </nav>
    </div>
    <h5>Edit Akun</h5>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 col-form-label text-right">Nama Depan</label>
                    <div class="col-sm-7">
                        <input type="text" name="forename" class="form-control form-control2" required="required" value="{{$p->forename}}" autocomplete="off">
                        <input type="hidden" name="id" value="{{$p->id}}">
                        <input type="hidden" name="kd_pel" value="{{$p->kd_pel}}">
                    </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 col-form-label text-right">Nama Belakang</label>
                    <div class="col-sm-7"><input type="text" name="surname" class="form-control form-control2" required="required" value="{{$p->surname}}" autocomplete="off"></div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 col-form-label text-right">NIK</label>
                    <div class="col-sm-7"><input type="number" name="nik" class="form-control form-control2" required="required" value="{{$p->nik}}" autocomplete="off"></div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 col-form-label text-right">Tanggal Lahir</label>
                    <div class="col-sm-7"><input type="date" name="tgl_lahir" class="form-control form-control2" required="required" value="{{$p->tgl_lahir}}" autocomplete="off"></div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 col-form-label text-right">Telepon</label>
                    <div class="col-sm-7"><input type="number" name="telp" class="form-control form-control2" required="required" value="{{$p->telp}}" autocomplete="off"></div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 col-form-label text-right">Email</label>
                    <div class="col-sm-7"><input type="email" name="email" class="form-control form-control2" required="required" value="{{$p->email}}" autocomplete="off"></div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 col-form-label text-right">Alamat</label>
            </div>
            <div class="row">
                <label class="col-sm-3 col-form-label text-right">Provinsi</label>
                <div class="col-sm-6"><input type="text" name="prov_pel" class="form-control form-control2" required="required" value="{{$p->prov_pel}}" autocomplete="off"></div>
            </div>
            <div class="row">
                <label class="col-sm-3 col-form-label text-right">Kota/Kabupaten</label>
                <div class="col-sm-6"><input type="text" name="kot_pel" class="form-control form-control2" required="required" value="{{$p->kot_pel}}" autocomplete="off"></div>
            </div>
            <div class="row">
                <label class="col-sm-3 col-form-label text-right">Kecamatan</label>
                <div class="col-sm-6"><input type="text" name="kec_pel" class="form-control form-control2" required="required" value="{{$p->kec_pel}}" autocomplete="off"></div>
            </div>
            <div class="row">
                <label class="col-sm-3 col-form-label text-right">Kode Pos</label>
                <div class="col-sm-6"><input type="number" name="kd_pos" class="form-control form-control2" required="required" value="{{$p->kd_pos}}" autocomplete="off"></div>
            </div>
            <div class="row">
                <label class="col-sm-3 col-form-label text-right">Detail</label>
                <div class="col-sm-6"><textarea name="al_detail" class="form-control form-control2" required="required" placeholder="Nama jalan, gedung, nomor rumah">{{$p->al_detail}}</textarea></div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 col-form-label text-right">Foto Profil</label>
                    <div class="col-sm-3">
                        <div class="card-body" style="width: 25rem;">
                            <div class="wrapper">
                                <div class="content" id="imagePreview">
                                    <img width="100%" src="{{ url('/assets/customers/'.$p->image) }}" class="image-old">
                                    <img src="" alt="" class="image-new">
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
                <a class="btn btn-light" href="/akun">Cancel</a>
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </div>
    </form>
    <script type="text/javascript">
        const wrapper = document.querySelector(".wrapper");
        const cancelBtn = document.querySelector("#cancel-btn");
        const inpFile = document.getElementById("inpFile");
        const previewContainer = document.getElementById("imagePreview");
        const newImage = previewContainer.querySelector(".image-new");
        const oldImage = previewContainer.querySelector(".image-old")
        function defaultBtnActive(){
            inpFile.click();
        }
        inpFile.addEventListener("change", function(){
            const file = this.files[0];
            if (file){
                const reader = new FileReader();
                newImage.style.display = "block";

                reader.addEventListener("load",function(){
                    newImage.setAttribute("src",this.result);
                    wrapper.classList.add("active");
                    oldImage.style.display = "none";
                });

                cancelBtn.addEventListener("click", function(){
                     newImage.style.display = "none";
                     wrapper.classList.remove("active");
                });
                reader.readAsDataURL(file);
            }else{
                newImage.style.display = null;
            }
        });
    </script>
</div>
    @endforeach
@endsection 