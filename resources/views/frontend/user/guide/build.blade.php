@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )
@push('after-styles')
    {{style('css/frontend/custom.css')}}
@endpush

@section('content')
        <!-- Main Content  -->
        {{-- <div class="leftContentWidthSDB">
            <div class="iphoneDisplay">
                <div class="deviceScrn">
                    Hello
                    <img class="screenshot" src="{{ asset('img/frontend/screenshot.jpg')}}" alt="screenshot"> 
                </div>
                <i class="deviceTopBar"></i>
                <i class="deviceBtmCircle"></i>
            </div>
        </div> --}}
        <!-- Main Content  -->

    <guide-component guide_id="{{$guide->id}}"></guide-component>
    <!-- SideBar -->


    <!-- Modal -->
@endsection

@push('after-scripts')



    <script type="text/javascript">

        $(document).ready(function(){
            // var grid = new Muuri('.grid', {
            //     dragEnabled: true,
            //     layout: {
            //         fillGaps: true
            //     }
            // });
            // grid.refreshItems().layout();


            $('.datepicker').datepicker();


        });
    </script>
@endpush
