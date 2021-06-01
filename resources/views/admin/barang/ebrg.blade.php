@extends('mainadmin')
@section('judul_halaman','Data Barang')
@section('konten')
	<h5>Edit Barang</h5>
    @foreach($barang as $p)
	<form method="post" action="/mainadmin/editbarang" enctype="multipart/form-data">
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
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 col-form-label text-right">Nama Barang</label>
                    <div class="col-sm-7">
                        <input type="text" name="nm_brng" class="form-control form-control2" required="required" value="{{$p->nm_brng}}" autocomplete="off">
                        <input type="hidden" name="no" value="{{$p->no}}">
                        <input type="hidden" name="kd_brng" value="{{$p->kd_brng}}">
                    </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 col-form-label text-right">Kategori</label>
                <div class="col-sm-7">
                    <select class="col-form-label" name="kategori" class="form-control form-control2" required>
                        <option value="{{$p->kategori}}"  selected>Makanan {{$p->kategori}}</option>
                        <option disabled="true">------------------------</option>
                        <option value="ringan">Makanan Ringan</option>
                        <option value="pokok">Makanan Pokok</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 col-form-label text-right">Berat per Unit</label>
                    <div class="col-sm-2"><input type="text" name="berat" class="form-control form-control2" required="required" value="{{$p->berat}}" autocomplete="off"></div>
                    <select class="col-form-label" name="satuan" style="border: none;" required>
                        <option value="{{$p->satuan}}" selected>{{$p->satuan}}</option>
                        <option disabled="true">---</option>
                        <option value="kg">kg</option>
                        <option value="gr">gr</option>
                        <option value="lt">lt</option>
                        <option value="ml">ml</option>
                    </select>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 col-form-label text-right">Jumlah</label>
                    <div class="col-sm-2"><input type="text" name="jmlh" class="form-control form-control2" required="required" value="{{$p->jmlh}}" autocomplete="off"></div><label class="col-form-label">Unit</label>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 col-form-label text-right">Harga per Unit</label><label class="col-form-label ml-3">Rp.</label>
                    <div class="col-sm-2"><input type="text" name="harga" class="form-control form-control2" required="required" value="{{$p->harga}}" autocomplete="off"></div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 col-form-label text-right">Deskripsi</label>
                    <div class="col-sm-7"><textarea name="desc" class="form-control form-control2" required="required" placeholder="Bahan-bahan, dan lain-lain">{{$p->desc}}</textarea></div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 col-form-label text-right">Foto Produk</label>
                    <div class="col-sm-3">
                        <div class="card-body" style="width: 25rem;">
                            <div class="wrapper">
                                <div class="content" id="imagePreview">
                                    <img width="100%" src="{{ url('/assets/goods/'.$p->img_brng) }}" class="image-old">
                                    <img src="" alt="" class="image-new">
                                </div>
                                <div id="cancel-btn"><i class="fas fa-times"></i></div>
                            </div><br/>
                            <input type="file" name="img_brng" id="inpFile" hidden="">
                            <input href="#" onclick="defaultBtnActive()" class="btn btn-outline-secondary col-sm-4" value="Choose File">
                        </div>
                    </div>
                </div>
            </div>
        <div class="form-group">
            <div class="col-sm-10 text-right">
            	<a class="btn btn-light" href="/mainadmin/barang">Batal</a>
                <input type="submit" class="btn btn-primary" value="Kirim">
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
    @endforeach
@endsection	