@extends('shopify-app::layouts.default')
@section('styles')

    <link rel="stylesheet" href="{{ asset('assets/polished.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/custom.css') }}">
    <style>
        .grid-highlight {
            padding-top: 1rem;
            padding-bottom: 1rem;
            background-color: #5c6ac4;
            border: 1px solid #202e78;
            color: #fff;
        }

        hr {
            margin: 6rem 0;
        }

        hr+.display-3,
        hr+.display-2+.display-3 {
            margin-bottom: 2rem;
        }
    </style>
    <script type="text/javascript">
        document.documentElement.className = document.documentElement.className.replace('no-js', 'js') + (document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#BasicStructure", "1.1") ? ' svg' : ' no-svg');
    </script>
@endsection

@section('content')

<div class="container-fluid">
    <div class="pl-4 pr-4 mt-4">
        <div class="row mb-2 mt-2">
            <div class="col-md-6">
                <h4>Welcome to Digioh.com</h4>
            </div>
            <div class="col-md-6">
                <a type="button" href="" target="_blank" class="btn btn-primary float-right" style="margin-left: 10px;color:white;">Visit Digioh <i class="fa fa-external-link"></i></a>
                <a type="button" href="{{url('getproductmanually')}}" class="btn btn-primary float-right" style="margin-left: 10px;color:white;">Get Products Manually </a>
                <a type="button" href="{{url('getproducts')}}" class="btn btn-primary float-right" style="margin-left: 10px;color:white;">View products </a>
                   </div>
        </div>
            <div class="row mt-4 pt-4">
                <div class="col-md-4">
                    <h5>
                        Application Status
                    </h5>
                    <p class="text-muted fw-normal">
                        Enable or disable, application widget from store.
                    </p>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body row">
                            <div class="col-md-8">
                                @if($shop->status == 1)
                                <p>The application is <span class="text-success">enabled</span>
                                    Click the button to disable </p>
                                @else
                                    <p>The application is <span class="text-danger">disabled.</span>
                                        Click the button to enable </p>
                                @endif
                            </div>
                            <div class="col-md-4">
                                @if($shop->status == 1)
                                    <a href="{{ route('status.api') }}?status=0" class="btn btn-danger  float-right"> Disable </a>
                                @else
                                    <a href="{{ route('status.api') }}?status=1" class="btn btn-primary  float-right">Enable</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr style="margin: 2rem 0;">
            <div class="row mt-4">
                <div class="col-md-4">
                    <h5>
                        API Key
                    </h5>
                    <p class="text-muted fw-normal">
                        Get the API Key/ID from the <a href="https://account.digioh.com/HQ/Installation" target="_blank">Digioh Instruction Page<i class="fa fa-external-link"></i></a>.
                    </p>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body row">
                            <div class="col-md-12">
                                <form action="{{ route('update.api') }}" method="GET">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label>API Key</label>
                                    <input type="text" class="form-control" name="api_key" value="{{ $shop->api_key }}" required>
                                    <span class="text-muted">Based on this API key, all your widgets, popups and action performed.</span>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>

                                </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
{{--            <hr style="margin: 2rem 0;">--}}
{{--            <div class="row mt-4">--}}
{{--                <div class="col-md-4">--}}
{{--                    <h5>--}}
{{--                       FAQ--}}
{{--                    </h5>--}}
{{--                    <p class="text-muted fw-normal">--}}
{{--                        Frequently asked questions--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--                <div class="col-md-8">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body row">--}}
{{--                            <div class="col-md-12">--}}
{{--                                <div class="accordion" id="accordionExample">--}}
{{--                                    <div class="card">--}}
{{--                                        <div class="card-header" id="headingOne">--}}
{{--                                            <h5 class="mb-0">--}}
{{--                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">--}}
{{--                                                    Collapsible Group Item #1--}}
{{--                                                </button>--}}
{{--                                            </h5>--}}
{{--                                        </div>--}}

{{--                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">--}}
{{--                                            <div class="card-body">--}}
{{--                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="card">--}}
{{--                                        <div class="card-header" id="headingTwo">--}}
{{--                                            <h5 class="mb-0">--}}
{{--                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">--}}
{{--                                                    Collapsible Group Item #2--}}
{{--                                                </button>--}}
{{--                                            </h5>--}}
{{--                                        </div>--}}
{{--                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">--}}
{{--                                            <div class="card-body">--}}
{{--                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="card">--}}
{{--                                        <div class="card-header" id="headingThree">--}}
{{--                                            <h5 class="mb-0">--}}
{{--                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">--}}
{{--                                                    Collapsible Group Item #3--}}
{{--                                                </button>--}}
{{--                                            </h5>--}}
{{--                                        </div>--}}
{{--                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">--}}
{{--                                            <div class="card-body">--}}
{{--                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
@endsection

