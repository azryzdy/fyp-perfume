@extends('layouts.master')

@section('title')
    Sub-Category - List | Perfume
@endsection




@section('content')
<div class="container fluid-mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            @if(session('status'))
                <h6> {{ session('status') }}</h6>
            @endif
                <div class="card-body">
                   <!-- <a href="{{ url('salesreport') }}" class="btn bg-primary p-2 text-white float-left">Sales Report</a> -->
                   {{ $item1 = 0 }}
                        @foreach($products as $item)
                             <tr> 
                                <td>{{  $item1 = ($item->original_price * $item->quantity) + $item1 }}</td>
                            </tr>
                        @endforeach
                <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
                <main class="mdl-layout__content mdl-color--grey-100">
                    <div class="mdl-grid demo-content">
                    <div style="display: flex;">
                        <div style="width: 600px;">
                            <h3 style="text-align: left;  text-transform: uppercase;  color: #1F3E63;">Profit could be made</h3>
                            <svg fill="currentColor" width="200px" height="200px" viewBox="0 0 1 1" class="demo-chart mdl-cell mdl-cell--4-col mdl-cell--3-col-desktop">
                            <use xlink:href="#piechart" mask="url(#piemask)" />
                            <text x="0.5" y="0.5" font-family="Roboto" font-size="0.2" fill="#888" text-anchor="middle" dy="0.1" ><tspan dy="0.05" font-size="0.1">RM</tspan>{{ $item1 }} </text>
                            </svg>
                        </div>
                        <div style="flex-grow: 1;">
                            <h3 style="text-align: left;  text-transform: uppercase;  color: #1F3E63;">Total Sales</h3>
                            <svg fill="currentColor" width="200px" height="200px" viewBox="0 0 1 1" class="demo-chart mdl-cell mdl-cell--4-col mdl-cell--3-col-desktop">
                            <use xlink:href="#piechart" mask="url(#piemask)" />
                            <text x="0.5" y="0.5" font-family="Roboto" font-size="0.2" fill="#888" text-anchor="middle" dy="0.1" ><tspan dy="0.05" font-size="0.1">RM</tspan>0</text>
                            </svg>
                        </div>
                    </div>
                    </div>
                </main>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" style="position: fixed; left: -1000px; height: -1000px;">
                    <defs>
                    <mask id="piemask" maskContentUnits="objectBoundingBox">
                        <circle cx=0.5 cy=0.5 r=0.49 fill="white" />
                        <circle cx=0.5 cy=0.5 r=0.40 fill="black" />
                    </mask>
                    <g id="piechart">
                        <circle cx=0.5 cy=0.5 r=0.5 />
                        <path d="M 0.5 0.5 0.5 0 A 0.5 0.5 0 0 1 0.95 0.28 z" stroke="none" fill="rgba(255, 255, 255, 0.75)" />
                    </g>
                    </defs>
                </svg> 
                </div>
                <br>
            <table class="table table-sm table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr> 
                @foreach($products as $item)
                <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
				    <td>{{ $item->original_price }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->original_price * $item->quantity }}</td>      
                </tr> 
                @endforeach
            </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
@endsection