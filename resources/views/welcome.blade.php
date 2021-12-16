    @extends('shopify-app::layouts.default')
    @section('styles')
    <!-- <link rel="stylesheet" href="http://localhost:3000/css/bootstrap4/dist/css/bootstrap-custom.css?v=datetime"> -->
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
<div class="container-fluid h-100 p-0">
    <div style="min-height: 100%" class="flex-row d-flex align-items-stretch m-0">
        <div class="container">

            <div class="row">

                <div class="col-lg-7 ">

                    <div class="pl-3 pt-2 pb-2 pr-2 p-5" style="/*background-image: url(https://shopifyconnector.outtra.com/design/assets/main.png) !important; background-size: 80% ; background-repeat: no-repeat; background-position: 14rem 0rem;height: 100% */">

                        <div class="greeting mt-4 pl-4">
                            <h3>
                                Digioh
                            </h3>
                            <p class="text-muted  fw-normal">
                                Personalized Web Forms, Pop-Ups, Surveys, and more
                            </p>
                        </div>

                        <div class="pl-4 pt-3">
                            <button class="btn btn-primary rounded-3" data-toggle="modal" data-target="#exampleModalCenter">Connect Account</button>
                        </div>
                    </div>

                </div>


                <div class="col-lg-5 pt-2 pb-2  ">
                    <img src="https://shopifyconnector.outtra.com/design/assets/main.png" style="height: 375px;">

                </div>
            </div>



            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="width: 420px" role="document">
                    <div class="modal-content">
                        <div class="">


                            <div class="">
                                <div class="card-header bg-white border-0">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <div class="">
                                        <div class="p-3">

                                            <div class="">
                                                <div class="text-center mb-3 mt-2">
                                                    <h1>Digioh</h1>
                                                    <h4>Connect to your account</h4>
                                                </div>
                                                <form action="{{ route('connect') }}" method="GET">
                                                    <input type="hidden" class="session-token" name="token" value="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJodHRwczpcL1wvb3V0dHJhLW1vdW50YWluLWVxdWlwbWVudC1kZW1vLm15c2hvcGlmeS5jb21cL2FkbWluIiwiZGVzdCI6Imh0dHBzOlwvXC9vdXR0cmEtbW91bnRhaW4tZXF1aXBtZW50LWRlbW8ubXlzaG9waWZ5LmNvbSIsImF1ZCI6ImM4YWM1YTM5OTNhOTM4OWQ3ODYxYzQ4YzZmMmI0MzhkIiwic3ViIjoiNDM5MzI0MTgwOTMiLCJleHAiOjE2Mzc0NzQzOTAsIm5iZiI6MTYzNzQ3NDMzMCwiaWF0IjoxNjM3NDc0MzMwLCJqdGkiOiJlNTk3ODI4ZC01ODE3LTRjOWMtYjVmMC03YzNiZjA5MzUzMTgiLCJzaWQiOiJhMTZjN2QyNTI5YWM3OTY2NmM5ZDk4YmFjZjk4ZDhkODI4ZGM0MTc5ZTZjNGFkYWJmZDc3NDhhNTU4MjI0M2I5In0.oiMqzF-uKDZbXZFae6M0xPdMxu1M3aAcMis_A_ST2bo">
                                                    <div class="mb-3">
                                                        <label class="form-label">API Key</label>
                                                        <input type="text" required="" class="form-control" name="api_key" placeholder="Enter Your API key">
                                                    </div>
                                                    <div style="">
                                                        <button type="submit" class="btn btn-primary w-100">
                                                            Connect
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
@endsection
