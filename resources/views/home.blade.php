@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Search') }} 
                    <form method="get" action="/search">
                        <input type="text"  name="q" class="form-control" placeholder="Search.."/>
                    </form> 
                </div>

                <a href="{{ route('export.excel') }}">{{ __('Export to excel') }}</a>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Filter by marka') }}

                     <form action="{{ url('/filter') }}" method="GET">
                    
                    @foreach($filter['marka'] as $keyMarka => $filterMarka)
                        <div class="" role="alert">
                             {{ $filterMarka }}
                            <input class="check__input" name="marka[{{$keyMarka}}]" type="checkbox" value="{{$keyMarka}}" onclick="this.form.submit()">
                        </div>
 
                    @endforeach 


                    {{ __('Filter by model') }}

                    @foreach($filter['model'] as $keyModel => $filterModel)
                        <div class="" role="alert">
                             {{ $filterModel }}
                            <input class="check__input" name="model[{{$keyModel}}]" type="checkbox" value="{{$keyModel}}" onChange="this.form.submit()">
                        </div>
 
                    @endforeach

                    {{ __('Filter by year') }}

                    @foreach($filter['year'] as $keyYear => $filterYear)
                        <div class="" role="alert">
                             {{ $filterYear }}
                            <input class="check__input" name="year[{{$keyYear}}]" type="checkbox" value="{{$keyYear}}" onChange="this.form.submit()">
                        </div>

                    @endforeach

                    </form>

                   @foreach($stolenCars ?? [] as $stolenCar)
                   
                    <label for="" class="col-md-4 col-form-label text-md-right">{{ $stolenCar->name }}</label>

                    <div class="" role="alert">
                            {{ $stolenCar->number }}
                    </div>

                    <div class="" role="alert">
                            {{ $stolenCar->vin }}
                    </div>

                     <form action="{{ url('/delete') }}" method="POST">
                     @csrf

                     <input class="check__input" name="delete" type="hidden" value="{{$stolenCar->id}}">
                      <button type="submit" onclick="return confirm('Are you sure delete this record?')" class="btn btn-danger">
                        <i class="fa fa-btn fa-trash"></i>Delete
                    </button>
                    </form>

                    <a href="{{ url('/edit') }}?id={{$stolenCar->id}}">edit</a>

                    <div class="" role="alert">
                           
                        </div>
                    <div class="" role="alert">
                            {{ $stolenCar->marka }}
                        </div>


                    <div class="" role="alert">
                            {{ $stolenCar->model }}
                        </div>
                    <div class="" role="alert">
                            {{ $stolenCar->color }}
                        </div>
                    <div class="" role="alert">
                            {{ $stolenCar->year }}
                        </div>
                @endforeach      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
