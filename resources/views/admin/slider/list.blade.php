@extends('layouts.admin')

@section('style')
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
@endsection

@section('title', 'Slider list')

@section('page-name', 'List of images of the carousel')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    You can organize images by simply dragging them, holding the mouse, not the right place
                    <a href="{{ route('slider.create') }}" class="btn btn-primary float-right btn-sm" role="button"
                       style="margin: -5px;">Add new image</a>
                </div>
                <div class="card-body body-slider">
                    <div class="row" id="sortable">
                        @if(isset($images) && is_object($images))
                            @foreach($images as $image)
                                <div class="col-sm-6 col-md-4 col-lg-3 mt-3">
                                    <div class="thumbnail sort-thumbnail position-relative" data-sort-id="{{ $image->id }}" style="height: 150px; width: 100%;">
                                        <form action="{{ route('slider.destroy', ['id' => $image->id]) }}" method="post" class="position-absolute d-inline-block">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn-danger btn">
                                                x
                                            </button>
                                        </form>
                                        <img src="{{ asset('img') . '/slider/' . $image->image }}" alt="{{ $image->image }}"
                                             style="height: 100%;width: 100%;" class="img-responsive">
                                        <span class="position-absolute text-white slider-name border border-white bg-dark">{{ $image->name }}</span>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            // Slider sortable
            $('#sortable').sortable({
                cursor: 'move',
                stop: function () {
                    var result = $.map($('.sort-thumbnail'), function (n, i) {
                        return n.attributes[1].value;
                    });
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    jQuery.ajax({
                        url: "/admin/slider/update-order",
                        method: 'POST',
                        data: {ids: result},
                        beforeSend: function () {
                            $('#loader').addClass('load');
                        },
                        success: function (data) {
                            $('#loader').removeClass('load');
                            console.log(data);
                        }
                    });
                }
            });
            $('.sort-thumbnail').on('mousedown', function () {
                $(this).css({
                    'opacity': '0.5',
                    'border': '2px dashed red'
                });
            });
            $('.sort-thumbnail').on('mouseup', function () {
                $(this).css({
                    'opacity': '1',
                    'border': 'none'
                });
            });
            // Slider sortable
        });
    </script>
@endsection
