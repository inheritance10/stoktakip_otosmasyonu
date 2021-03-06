@extends('backend.layout')
@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Satışlar</h3>
            </div>
            <div class="box-body">
                @if(session()->has('status'))
                    <div class="alert alert-warning">
                        <p>
                            {{session('status')}}
                        </p>
                    </div>
                @endif
                <p>Satış Kayıt Formu</p>
                <a href="{{route('order')}}" style="margin-left: 5px; float: right;"><button class="btn btn-warning">Geri</button></a>
                <form action="{{route('order-add-post')}}" method="post">
                    @csrf
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Satış Tarihi</label>
                            <div class="input-group date" style=" ;">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input autocomplete="off" type="text" class="form-control pull-right" id="datepicker" name="sold_date">
                            </div>
                        </div>
                        <div class="form-group" style="">
                            <label for="">İsim Soyisim</label>
                            <input type="text" class="form-control" id="price" name="full_name">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Araç</label>
                            <select class="form-control select2" id="model" name="product_id" style="">
                                <option selected="selected" disabled >Araç Seçiniz</option>
                                @foreach($products as $product)
                                <option value="{{$product->id}}">{{$product->brand_name}} {{$product->model_name}} -- {{$product->price}}₺ -- {{$product->license_plate}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Açıklama</label>
                            <textarea class="form-control" rows="3" placeholder="Açıklama ..." name="description"></textarea>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Telefon</label>
                            <input name="phone" id="phone" class="form-control phone" type="text">
                        </div>
                        <div class="form-group">
                            <label>Adres</label>
                            <textarea name="address" id="address" class="form-control" rows="3" placeholder="Adres ..." > </textarea>
                        </div>
                    </div>
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-success" style="position: absolute; top: 150px;left: 0;">Siparişi Tamamla</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('css')
    <!-- daterange picker -->
    <link rel="stylesheet" href="backend/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="backend/bower_components/select2/dist/css/select2.min.css">


@endsection

@section('js')
    <!-- bootstrap datepicker -->
    <script src="backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- Select2 -->
    <script src="backend/bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="js/jquery.inputmask.bundle.min.js"></script>

    <script>
        $('.select2').select2()

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        })
        $('#name').on('change', function () {
            var selected = $("#name :selected").val();
            $.get("get-models/" + selected, function (data) {
                console.log(data)
                $('#model').html('').select2({
                    data: data
                })

            });
        })
        $('.phone').inputmask('(999)-999-9999');
    </script>
@endsection
