@extends('mainadmin')
@section('judul_halaman','Data Barang')
@section('konten')
	<h5>Tambah Barang</h5>
	<form method="post" action="/mainadmin/addbarang" enctype="multipart/form-data">
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
                    <div class="col-sm-7"><input type="text" name="nm_brng" class="form-control form-control2" required="required" value="{{old('nm_brng')}}" autocomplete="off"></div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 col-form-label text-right">Kategori</label>
                <div class="col-sm-7">
                    <select class="col-form-label" name="kategori" class="form-control form-control2" required>
                        <option value="" hidden="true">Pilih</option>
                        <option value="ringan" @if (old('kategori') == 'ringan') selected @endif>Makanan Ringan</option>
                        <option value="pokok" @if (old('kategori') == 'pokok') selected @endif>Makanan Pokok</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 col-form-label text-right">Berat per Unit</label>
                    <div class="col-sm-2"><input type="text" name="berat" class="form-control form-control2" required="required" value="{{old('berat')}}" autocomplete="off"></div>
                    <select class="col-form-label" name="satuan" style="border: none;" required>
                        <option value="" hidden="true">Pilih</option>
                        <option value="kg" @if (old('satuan') == 'kg') selected @endif>kg</option>
                        <option value="gr" @if (old('satuan') == 'gr') selected @endif>gr</option>
                        <option value="lt" @if (old('satuan') == 'lt') selected @endif>lt</option>
                        <option value="ml" @if (old('satuan') == 'ml') selected @endif>ml</option>
                    </select>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 col-form-label text-right">Jumlah</label>
                    <div class="col-sm-2"><input type="text" name="jmlh" class="form-control form-control2" required="required" value="{{old('jmlh')}}" autocomplete="off"></div><label class="col-form-label">Unit</label>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 col-form-label text-right">Harga per Unit</label><label class="col-form-label ml-3">Rp.</label>
                    <div class="col-sm-2"><input type="text" name="harga" class="form-control form-control2" required="required" value="{{old('harga')}}" autocomplete="off"></div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 col-form-label text-right">Deskripsi</label>
                    <div class="col-sm-7"><textarea name="desc" class="form-control form-control2" required="required" placeholder="Bahan-bahan, dan lain-lain">{{old('desc')}}</textarea></div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 col-form-label text-right">Foto Produk</label>
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