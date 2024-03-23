@extends('layouts.main')
@section('css')
    <style>
        @media print {

            table,
            .ptext {
                font-size: 10pt;
                margin-bottom: 1px;
            }

            th,
            td {
                padding: 0px;
                height: 4px;

            }



            @page {
                margin: 0.1in;
            }
        }
    </style>
@endsection
@section('content')
  
    <!-- Button trigger modal -->


    <!-- Modal -->
   
@endsection

@section('script')
    <script src="{{asset('assets/js/chart.js')}}"></script>
    
@endsection
