@extends('layouts.app') @section('content')
<div class="listing-filter-wrap">

    <div class="row px-3 mb-5">
        <div class="col-md-12 facilities-block" style="border: 1px solid rgba(0, 0, 0, 0.06); border-radius: 3px; box-shadow: 0px 1px 11px -1px rgba(216, 216, 216, 0.75);">

            <div class="col-md-4 d-inline-block form-group mt-3" style="max-width: 33%">
                <div class="w-100 form-check">
                    <label for="" class="text-center font-weight-bold text-info text-uppercase  w-100">Filter by status</label>
                    <select id="filter_status" class="w-100 custom-select">
                        <option value="0" selected>all</option>
                        @foreach (App\TicketStatus::all() as $priority)
                        <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-4 d-inline-block form-group mt-3" style="max-width: 33%">
                <div class="w-100 form-check">
                    <label for="" class="text-center font-weight-bold text-info text-uppercase  w-100">Filter by priority</label>
                    <select id="filter_priority" class="w-100 custom-select">
                        <option value="0" selected>all</option>
                        @foreach (App\TicketPriority::all() as $priority)
                        <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-4 d-inline-block form-group mt-3" style="max-width: 33%">
                <div class="w-100 form-check">
                    <label for="" class="text-center font-weight-bold text-info text-uppercase  w-100">Filter by ticket type</label>
                    <select id="filter_type" class="w-100 custom-select">
                        <option value="0" selected>all</option>
                        @foreach (App\TicketType::all() as $elem)
                        <option value="{{ $elem->id }}">{{ $elem->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div id="data">
    
        @foreach ($tickets->chunk(3) as $chunk_element)
            <div class="row">
                @foreach ($chunk_element as $ticket)
                <div class="col-md-4">
                    <article class="popular-listing-post">
                        <div class="post-thumb">
                            <img src="{{ asset('assets/images/post/9.jpg') }}" alt="img" class="img-responsive">
                            <div class="listing-info">

                                <div>
                                    <h4 class="w-100 mb-3"><a href="" class="w-100 font-weight-bold text-center">{{ $ticket->name }}</a></h4>
                                    <a href="{{ route('ticket', ['id' => Crypt::encrypt($ticket->id) ]) }}" class="listing-btn-cmn pull-right mr-2 mb-2 font-weight-bold">details</a>
                                </div>

                                <h5 style="border-bottom: 2px solid white; padding-top: 9px;" class="pb-2 text-info font-weight-bold clearfix">Requested items:</h5>

                                <div class="row" style="margin-top: -4px !important;">
                                    @foreach ($ticket->equipments as $element)
                                    <div class="col-md-6">
                                        <p style="font-size: 12.5px"> {{ $element->name }} </p>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="overlay"></div>
                        </div>
                        <div class="post-details">
                            <div class="post-footer text-left">
                                <div class="row my-2 pb-2" style="padding-left: 15.5px;">
                                    <div class="p-0 col-md-12 mx-1" style="font-size: 12.5px">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        <b>issue date:</b> {{ $ticket->created_at->toFormattedDateString() }}
                                    </div>

                                    <div class="p-0 col-md-612 mx-1" style="font-size: 12.5px">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        <b>pickup:</b> @if (!empty ($ticket->pickup_date)) {{ \Carbon\Carbon::parse($ticket->pickup_date)->toFormattedDateString() }} @else --------------------- @endif
                                    </div>

                                    <div class="p-0 col-md-12 mx-1" style="font-size: 12.5px">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        <b>handover:</b> @if (!empty($ticket->handover_date)) {{ \Carbon\Carbon::parse($ticket->handover_date)->toFormattedDateString() }} @else --------------------- @endif
                                    </div>
                                </div>

                                <div class="row my-2 pb-2 text-center" style="padding-left: 15.5px;">
                                    <div class="p-0 col-md-6" style="font-size: 12.5px">
                                        <b>status:</b> <span class="@if($ticket->status->name == "open") text-success @elseif($ticket->status->name == "in-progress") text-warning @else text-danger @endif font-weight-bold"> {{ $ticket->status->name }} </span>
                                    </div>

                                    <div class="p-0 col-md-6" style="font-size: 12.5px">
                                        <b>priority:</b> <span class="@if($ticket->priority->name == "high") text-danger @elseif($ticket->priority->name == "medium") text-warning @else text-info @endif font-weight-bold"> {{ $ticket->priority->name }} </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection

@section("js")
    <script>        
        $('#filter_status, #filter_type, #filter_priority, #filter_equipment').change(function(event) {
               $.ajaxSetup({
                   headers:{
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });

               $.ajax({
                   url: '{{ route('filter_user') }}',
                   method: 'get',
                   data: {
                     filter_status: $('#filter_status').find(":selected").val(),
                     filter_type: $('#filter_type').find(":selected").val(),
                     filter_priority: $('#filter_priority').find(":selected").val(),
                     filter_equipment: $('#filter_equipment').find(":selected").val(),               
                   },
                   success: function(result){
                      $('#data').html(result);
                   }
               });
           });
    </script>
@endsection