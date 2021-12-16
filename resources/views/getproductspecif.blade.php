<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
{{--    <link rel="stylesheet" href="{{ asset('assets/polished.min.css') }}">--}}
    <!-- Styles -->
    <style>


    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>
</head>

<body class="antialiased">




    <div class="container">



        <br>



{{--
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product</th>
                    <th scope="col">Status</th>
                    <th scope="col">Inventroy</th>
                    <th scope="col">Type</th>
                    <th scope="col">Vendor</th>
                </tr>
            </thead>



            <tbody>
                <tr>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($get as $getdata)
                    @php
                    $data=App\Models\variants::where('product_id',$getdata->product_id)->first();

                @endphp

                        <th scope="row">{{ $i++ }}</th>
                        <td>  <img style="width:40px;margin-right:10px" src="{{ $getdata->image }}">{{ $getdata->title }}</td>
                        <td><span style="" class="badge badge-info">{{ $getdata->status }}</span></td>
                        <td style="color: red">{{ $data->inventory_quantity }} in stock</td>
                        <td>{{ $getdata->product_type }}</td>
                        <td>{{ $getdata->vendor }}</td>

                </tr>

                @endforeach



            </tbody>
        </table> --}}



        SKU,Page,Thumbnail,Image,Price,InStock
        <br>
        @php
        $i = 1;
    @endphp
        @foreach ($products as $getdata)

        @php
        $data=App\Models\variants::where('product_id',$getdata->product_id)->first();
    @endphp

{{-- <h5>SKU{{$i++}},Page,<a href="{{$getdata->image}}">{{Str::limit($getdata->image, 12)}}</a>, <a href="{{$getdata->image}}">{{Str::limit($getdata->image, 12)}}</a>,{{ $data->price }},@if($data->inventory_quantity>0) True @else False @endif</h5> --}}

SKU{{$i++}},Page,<a href="{{$getdata->image}}">{{$getdata->image}}</a>,<a href="{{$getdata->image}}">{{$getdata->image}}</a>,{{ $data->price }},@if($data->inventory_quantity>0){{"True"}}@else{{"False"}}@endif
<br>
@endforeach









    </div>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>


    <script>
        $(document).ready(function() {




        })
    </script>



</body>

</html>
