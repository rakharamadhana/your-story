@extends('frontend.layouts.app')

@section('title', __('Dashboard'))

@section('background', 'bg-main')

@section('content')
    <div class="container py-4 mt-lg-5 mt-md-5 mt-sm-5">
        <span class="sel-header h3 w3-animate-top">@lang('Home')</span>
        <div class="row mt-lg-5 mt-md-5">
            <div class="col-md-4 mt-lg-5 mt-md-5 mt-sm-5 zoom">
                <a  type="button" data-toggle="modal" data-target="#casesModal">
                    <img src="{{ URL::asset('img/menu-cases.png') }}" class="w3-animate-zoom rounded mx-auto d-block" alt="">
                    <p class="h3 text-center" style="color: #8d4600;">@lang('Cases')</p>
                </a>
            </div><!--col-md-10-->
            <div class="col-md-4 mt-lg-5 mt-md-5 mt-sm-5 zoom">
                <a href="{{ route('frontend.user.dashboard') }}">
                    <img src="{{ URL::asset('img/menu-design.png') }}" class="w3-animate-zoom rounded mx-auto d-block" alt="">
                    <p class="h3 text-center" style="color: #001d8d;">@lang('Design A Story')</p>
                </a>
            </div><!--col-md-10-->
            <div class="col-md-4 mt-lg-5 mt-md-5 mt-sm-5 zoom">
                <a href="{{ route('frontend.user.dashboard') }}">
                    <img src="{{ URL::asset('img/menu-review.png') }}" class="w3-animate-zoom rounded mx-auto d-block" alt="">
                    <p class="h3 text-center" style="color: #8d002a;">@lang('Review')</p>
                </a>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->

    <!-- Modal -->
    <div class="modal-transparent modal fade" id="casesModal" tabindex="-1" role="dialog" aria-labelledby="casesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="casesModalLabel">@lang('Cases')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <img src="{{ URL::asset('img/menu-cases.png') }}" class="rounded mx-auto d-block" alt="">
                        </div>

                        <div class="col align-content-center scrollable">
                            @foreach($cases as $case)
                                <a class="btn btn-warning btn-block" href="{{ route('frontend.user.case', $case->id) }}">{{ $case->{'name_'.app()->getLocale()} }}</a>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
