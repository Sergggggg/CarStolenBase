@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Search') }} 
                    <form method="get" action="/">
                        <input id="text" type="text" class="form-control" placeholder="Search" name="search">
                    </form>
                </div>
               результаты поиска
                @foreach($searchResults ?? [] as $result)
                    <label for="" class="col-md-4 col-form-label text-md-right">{{ $result->name ?? '' }}</label>

                    <div class="" role="alert">
                            {{ $result->number ?? ''}}
                        </div> 
 
                    <div class="" role="alert">
                            {{ $result->vin ?? ''}}
                        </div>

                    <div class="" role="alert">
                            {{ $result->marka ?? '' }}
                        </div>

                    <div class="" role="alert">
                            {{ $result->model ?? ''}}
                        </div>
                    <div class="" role="alert">
                            {{ $result->color ?? ''}}
                        </div>
                    <div class="" role="alert">
                            {{ $result->year ?? ''}}
                        </div>
                @endforeach      

            </div>
        </div>
    </div>
</div>
@endsection