@extends('layouts.app') 

@section('content')
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
                            <div class="post-meta post-entry-block">
                                <div class="post-author text-info pull-left w-50">
                                    <h5 class="text-left font-weight-bold text-uppercase pt-1" style="color: rgba(0, 0, 0, 0.5)">requested by</h5>
                                </div>

                                <div class="post-author w-50 mt-0">
                                    <img src="{{ $ticket->requester->getPhoto() }}" alt="img" class="d-inline-block img-responsive">
                                    <p class="post-entry d-inline ml-1" style="font-size: 15.4px; color: rgba(0, 0, 0, 0.7)">
                                        {{ $ticket->requester->name }}
                                    </p>
                                </div>
                            </div>
                            <div class="post-entry-block">
                                <div class="post-author text-info pull-left w-50">
                                    <h5 class="text-left font-weight-bold text-uppercase pt-1">assigned to</h5>
                                </div>

                                <div class="post-author w-50 mt-0">
                                    @if($ticket->assigner)
                                        <img src="{{ $ticket->assigner->getPhoto() }}" alt="img" class="d-inline-block img-responsive">

                                        <p class="post-entry d-inline ml-1" style="font-size: 15.4px; color: rgba(0, 0, 0, 0.7)">
                                            {{ $ticket->assigner->name }}
                                        </p>
                                    @else
                                        <p class="post-entry d-inline ml-1" style="font-size: 15.4px; color: rgba(0, 0, 0, 0.7)">
                                            ---------------------------
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <div class="post-footer text-center">
                                <div class="contact-no">
                                    <h5><i class="fa fa-calendar" aria-hidden="true"></i> <b>date:</b> @if (!empty ($ticket->pickup_date)) {{ \Carbon\Carbon::parse($ticket->pickup_date)->toFormattedDateString() }} @else --------------------- @endif</h5>
                                </div>
                                <div class="schedule-info {{ $ticket->status->name }}">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>

                                    <h5 class="font-weight-bold">{{ $ticket->status->name }}</h5>
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
                   url: '{{ route('filter_staff') }}',
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