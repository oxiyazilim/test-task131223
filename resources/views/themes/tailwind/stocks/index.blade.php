@extends('theme::layouts.app')


@section('content')

<div class="flex flex-col px-8 mx-auto my-6 lg:flex-row max-w-7xl xl:px-5">
	    <div class="flex flex-col justify-start flex-1 mb-5 overflow-hidden bg-white border rounded-lg lg:mr-3 lg:mb-0 border-gray-150">
	        <div class="flex flex-wrap items-center justify-between p-5 bg-white border-b border-gray-150 sm:flex-no-wrap">
				<div class="flex items-center justify-center w-12 h-12 mr-5 rounded-lg bg-wave-100">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"><defs><style>.cls-1{fill:#1d384d}</style></defs><g id="icons_without_caption" data-name="icons without caption"><g id="STOCKS"><path class="cls-1" d="m134.61 90.32-3 2.76-26 23.73-15.3-13.87-25 21.76-13.95-12.51-2.67 3L65.25 130l25-21.75 15.38 13.93L134.29 96l3-2.76a7.41 7.41 0 0 1-2.68-2.92zM182.58 82.31v4h17.92l-30.12 28-19.83-20.61-2.84-3a7.45 7.45 0 0 1-2.87 2.78l2.83 2.94 22.54 23.43 33.09-30.7v15.92h4V82.31zm20.73 4.35-.33-.35h.33v.36z"/><path class="cls-1" d="M141.28 75.46A11.5 11.5 0 0 0 129.8 87a11.46 11.46 0 0 0 17.87 9.52 11 11 0 0 0 2.88-2.77 11.34 11.34 0 0 0 2.21-6.75 11.5 11.5 0 0 0-11.48-11.54zm6.43 15.29a7.47 7.47 0 0 1-13.1-.43 7.35 7.35 0 0 1-.81-3.32 7.48 7.48 0 1 1 15 0 7.38 7.38 0 0 1-1.09 3.75zM80.21 127.21h4v51.32h-4zM103.84 130.51h4v48.02h-4zM151.1 113.96h4v64.58h-4zM127.47 113.96h4v64.58h-4zM174.73 125.74h4v52.8h-4z"/><path class="cls-1" d="M71.23 176.54h116.48v4H71.23z"/></g></g></svg>
				</div>
				<div class="relative flex-1">
	                <h3 class="text-lg font-medium leading-6 text-gray-700">
	                    Stocks
	                </h3>
	                <p class="text-sm leading-5 text-gray-500 mt">
	                    Here is your daily updated stocks
	                </p>
				</div>

	        </div>
	        <div class="relative p-5">

			<table class="items-center w-full bg-transparent border-collapse">
				<thead>
					<tr>
						<th class="px-2 text-wave-400 align-middle border-b border-solid border-gray-200 py-3 text-sm whitespace-nowrap font-light text-left">
							Ticker
						</th>
						<th class="px-2 text-wave-400 align-middle border-b border-solid border-gray-200 py-3 text-sm whitespace-nowrap font-light text-left">
							Price
						</th>
						<th class="px-2 text-wave-400 align-middle border-b border-solid border-gray-200 py-3 text-sm whitespace-nowrap font-light text-left">
							Chg%
						</th>
						<th class="px-2 text-wave-400 align-middle border-b border-solid border-gray-200 py-3 text-sm whitespace-nowrap font-light text-left">
							RSI
						</th>
						<th class="px-2 text-wave-400 align-middle border-b border-solid border-gray-200 py-3 text-sm whitespace-nowrap font-light text-left">
							MACD
						</th>
						<th class="px-2 text-wave-400 align-middle border-b border-solid border-gray-200 py-3 text-sm whitespace-nowrap font-light text-left">
							PE Ratio
						</th>
						<th class="px-2 text-wave-400 align-middle border-b border-solid border-gray-200 py-3 text-sm whitespace-nowrap font-light text-left">
							Volume
						</th>
						<th class="px-2 text-wave-400 align-middle border-b border-solid border-gray-200 py-3 text-sm whitespace-nowrap font-light text-left">
							52 Week High
						</th>
						<th class="px-2 text-wave-400 align-middle border-b border-solid border-gray-200 py-3 text-sm whitespace-nowrap font-light text-left">
							1 M %
						</th>
						<th class="px-2 text-wave-400 align-middle border-b border-solid border-gray-200 py-3 text-sm whitespace-nowrap font-light text-left">
							3 M %
						</th>
						<th class="px-2 text-wave-400 align-middle border-b border-solid border-gray-200 py-3 text-sm whitespace-nowrap font-light text-left">
							6 M %	
						</th>
						<th class="px-2 text-wave-400 align-middle border-b border-solid border-gray-200 py-3 text-sm whitespace-nowrap font-light text-left">
							1 Y %
						</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($data['stocks'] as $stock)
						
					
					<tr>
						<th class="border-b border-gray-200 align-middle font-light text-sm whitespace-nowrap px-2 py-4 text-left">
							{{ $stock->stock_company_code }}
						</th>
						<th class="border-b border-gray-200 align-middle font-light text-sm whitespace-nowrap px-2 py-4 text-left">
							{{ $stock->price }}	
						</th>
						<th class="border-b @if($stock->change < 0)text-red-500 @else text-green-500 @endif  border-gray-200 align-middle font-light text-sm whitespace-nowrap px-2 py-4 text-left">
							@if( $stock->change == 0 )
							-
							@else
							{{ $stock->change }}	
							@endif
						</th>
						<th class="border-b border-gray-200 align-middle font-light text-sm whitespace-nowrap px-2 py-4 text-left">
							
							{{ $stock->rsi }}	
						</th>
						<th class="border-b border-gray-200 align-middle font-light text-sm whitespace-nowrap px-2 py-4 text-left">
							
						{{ $stock->macd }}		
						</th>
						<th class="border-b border-gray-200 align-middle font-light text-sm whitespace-nowrap px-2 py-4 text-left">
							
							{{ $stock->pe_ratio }}	
						</th>
						<th class="border-b border-gray-200 align-middle font-light text-sm whitespace-nowrap px-2 py-4 text-left">
							
						{{ intWithStyle($stock->volume) }}		
						</th>
						<th class="border-b border-gray-200 align-middle font-light text-sm whitespace-nowrap px-2 py-4 text-left">
							
							{{ $stock->{'52_week'} }}
						</th>
						<th class="border-b @if($stock->{'1_m'} < 0)text-red-500 @else text-green-500 @endif border-gray-200 align-middle font-light text-sm whitespace-nowrap px-2 py-4 text-left">
						@if( $stock->{'1_m'} == 0 )
							-
							@else
						{{ $stock->{'1_m'} }}	
						@endif
						</th>
						<th class="border-b @if($stock->{'3_m'} < 0)text-red-500 @else text-green-500 @endif border-gray-200 align-middle font-light text-sm whitespace-nowrap px-2 py-4 text-left">
						@if( $stock->{'3_m'} == 0 )
							-
							@else
						{{ $stock->{'3_m'} }}		
						@endif
						</th>
						<th class="border-b @if($stock->{'6_m'} < 0)text-red-500 @else text-green-500 @endif border-gray-200 align-middle font-light text-sm whitespace-nowrap px-2 py-4 text-left">
						@if( $stock->{'6_m'} == 0 )
							-
							@else
						{{ $stock->{'6_m'} }}		
						@endif
						</th>
						<th class="border-b @if($stock->{'12_m'} < 0)text-red-500 @else text-green-500 @endif border-gray-200 align-middle font-light text-sm whitespace-nowrap px-2 py-4 text-left">
						@if( $stock->{'12_m'} == 0 )
							-
							@else
						{{ $stock->{'12_m'} }}	
						@endif
						</th>
					
					</tr>
					@endforeach
				</tbody>
				</table>

			</div>
		</div>
</div>




@endsection
