@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            @if (is_array($errors))
            <div class="alert alert-danger">
                 <ul>
                    @foreach ($errors as $error)
                       <li>{{ $error }}</li>
                    @endforeach
                 </ul>
            </div>
            @endif
                <form method="POST" action="{{url('send-avto-info')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row" style="margin-top: 15px;">
                        <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="text" type="text" class="form-control" placeholder="Name" name="name">
                        </div>
                    </div>

                    <input id="text" type="hidden" class="form-control" value="{{auth()->user()->id}}" name="user_id">

                    <div class="form-group row" style="margin-top: 15px;">
                        <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Number') }}</label>

                        <div class="col-md-6">
                            <input class="form-control " id="fr_email" type="text" placeholder="state number" name="number">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-top: 15px;">
                        <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Color') }}</label>

                        <div class="col-md-6">
                            <input class="form-control " id="fr_email" type="text" placeholder="Сolor" name="color">
                        </div>
                    </div>


                    <div class="form-group row" style="margin-top: 15px;">
                        <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Vin') }}</label>

                        <div class="col-md-6">
                            <input class="form-control " id="fr_email" type="text" placeholder="Vin" name="vin">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">{{ __('Отправить форму') }}</button>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('view.scripts')
<script>

$(document).ready(function() {
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
});

</script>
@endsection