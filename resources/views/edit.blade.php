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
                <form method="POST" action="{{url('save-editted')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row" style="margin-top: 15px;">
                        <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="text" type="text" class="form-control" placeholder="Name" name="name" 
                            value="{{$infoCarToEdit->name}}">
                        </div>
                    </div>

                    <input id="text" type="hidden" class="form-control" value="{{auth()->user()->id}}" name="user_id">

                     <input id="text" type="hidden" class="form-control" value="{{request()->id}}" name="id">

                    <div class="form-group row" style="margin-top: 15px;">
                        <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Number') }}</label>

                        <div class="col-md-6">
                            <input class="form-control " id="fr_email" type="text" placeholder="state number" name="number"
                            value="{{$infoCarToEdit->number}}">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-top: 15px;">
                        <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Color') }}</label>

                        <div class="col-md-6">
                            <input class="form-control" id="fr_email" type="text" placeholder="Сolor" name="color" 
                            value="{{$infoCarToEdit->color}}">
                        </div>
                    </div>


                    <div class="form-group row" style="margin-top: 15px;">
                        <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Vin') }}</label>

                        <div class="col-md-6">
                            <input class="form-control " id="fr_email" type="text" placeholder="Vin" name="vin"
                            value="{{$infoCarToEdit->vin}}">
                        </div>
                    </div>

                    <div class="form-group row" style="margin-top: 15px;">
                        <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Marka') }}</label>

                        <div class="col-md-6">
                            <input class="form-control " id="fr_email" type="text" placeholder="Marka" name="marka"
                            value="{{$infoCarToEdit->marka}}">
                        </div>
                    </div>

                    <div class="form-group row" style="margin-top: 15px;">
                        <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Model') }}</label>

                        <div class="col-md-6">
                            <input class="form-control " id="fr_email" type="text" placeholder="Model" name="model"
                            value="{{$infoCarToEdit->model}}">
                        </div>
                    </div>

                    <div class="form-group row" style="margin-top: 15px;">
                        <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Year') }}</label>

                        <div class="col-md-6">
                            <input class="form-control " id="fr_email" type="text" placeholder="Year" name="year"
                            value="{{$infoCarToEdit->year}}">
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">{{ __('Редагувати данні') }}</button>
                </form>
            </div>
        </div>
    </div>

@endsection