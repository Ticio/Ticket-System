@extends('layouts.app')

@section('css')
.user-panel {
    padding: 0;
}

{{-- .modal-dialog{
    top: 1% !important;
 } --}}

.modal-backdrop{
	display: none !important;
}
@endsection

@section('content')
<div class="listing-filter-wrap">
    <div class="single-post-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="review-section">
                        <div class="review-title-block">
                            <h4><strong>{{ $ticket->name }}</strong></h4>
                            <br>
                            <div class="row mt-2">
                            	<div class="col">
                            		<h5 style="border-bottom: 2px solid white" class="my-2 pb-2 text-info font-weight-bold clearfix">General details:</h5>

                                    <div class="row my-2 pb-2" style="padding-left: 15.5px;">
                                    	<div class="p-0 mr-2" style="font-size: 12.5px">
											<b>Requested date:</b> {{ $ticket->created_at->toFormattedDateString() }}
										</div>
										
										<div class="p-0 mr-2" style="font-size: 12.5px">
											<b>Pickup date:</b> @if (!empty ($ticket->pickup_date)) {{ \Carbon\Carbon::parse($ticket->pickup_date)->toFormattedDateString() }} @else --------------------- @endif
										</div>
										
										<div class="p-0 mr-2" style="font-size: 12.5px">
											<b>Handover date:</b> @if (!empty($ticket->handover_date)) {{ \Carbon\Carbon::parse($ticket->handover_date)->toFormattedDateString() }} @else --------------------- @endif
										</div>
										
										<div class="p-0 mr-2" style="font-size: 12.5px">
											<b>Status:</b> <span class="@if($ticket->status->name == "open") text-success @elseif($ticket->status->name == "in-progress") text-warning @else text-danger @endif font-weight-bold"> {{ $ticket->status->name }} </span>
										</div>

                                    	<div class="p-0 mr-2" style="font-size: 12.5px">
											<b>Priority:</b> <span class="@if($ticket->priority->name == "high") text-danger @elseif($ticket->priority->name == "medium") text-warning @else text-info @endif font-weight-bold"> {{ $ticket->priority->name }} </span>
										</div>
                                    </div>
                            	</div>
                            	<div class="col">
                            		<h5 style="border-bottom: 2px solid white" class="my-2 pb-2 text-info font-weight-bold clearfix">Requested items:</h5>

                                    <div class="row my-2 pb-2" style="padding-left: 15.5px;">
                                    	
                                    	@php
                                    		$i=0;
                                    	@endphp

                                    	@foreach ($ticket->equipments as $element)
                                    		
                                    		<div class="p-0 mr-2">
												<i class="fa fa-bed" aria-hidden="true"> </i> {{ $element->name }},
											</div>

											@break($i++ == 4)
                                    	@endforeach
                                    </div>
                            	</div>

                            	<div class="col">
                            		<h5 style="border-bottom: 2px solid white" class="my-2 pb-2 text-info font-weight-bold clearfix">Requested by:</h5>

                                    <div class="row my-2 pb-2" style="padding-left: 15.5px;">
	                                        <img src="{{ $ticket->requester->getPhoto() }}" style="width: 55px !important; height: 55px !important; border-radius: 50%;" alt="img" class="img-circle d-inline-block img-responsive">
	                                        <p class="post-entry d-inline ml-3 mt-3" style="font-size: 15.4px; color: rgba(0, 0, 0, 0.7)">
		                                        <b>{{ $ticket->requester->name }}</b>
		                                    </p>
		                            </div>
                                </div>

                            	<div class="col">
                            		<h5 style="border-bottom: 2px solid white" class="my-2 pb-2 text-info font-weight-bold clearfix">Assigned to:</h5>
									
									@if(!empty($ticket->assigner))

	                                    <div class="row my-2 pb-2" style="padding-left: 15.5px;">
	                                        <img src="{{ $ticket->assigner->getPhoto() }}" style="width: 55px !important; height: 55px !important; border-radius: 50%;" alt="img" class="img-circle d-inline-block img-responsive">
	                                        <p class="post-entry d-inline ml-3 mt-3" style="font-size: 15.4px; color: rgba(0, 0, 0, 0.7)">
		                                        <b>{{ $ticket->assigner->name }}</b>
		                                    </p>
		                            	</div>

		                            @elseif(Auth::user()->role->name == "Admin staff")
										<button class="btn font-weight-bold text-white" data-toggle="modal" data-target="#assign" style="background: #fd880a"> assign staff </button>
		                            @else
										-------------------------
		                            @endif
                                </div>
                            </div>
                            
                            @if($ticket->status->name != "closed")
	                            @if(!empty($ticket->assigner))
		                            @if(Auth::user()->id == $ticket->assigner->id || Auth::user()->role->name == "Admin staff")
			                            <div class="mb-3">
			                            	<button class="btn btn-info font-weight-bold text-white" data-toggle="modal" data-target="#update"> update </button>	
			                            </div>
		                            @endif
		                        @elseif(Auth::user()->role->name == "Admin staff")
									<div class="mb-3">
			                            <button class="btn btn-info font-weight-bold text-white" data-toggle="modal" data-target="#update"> 
			                            	update 
			                            </button>	
			                        </div>
	                            @endif
                            @endif
                        </div>
                        <div class="comments listing-reviews">
                            <ul class="p-5" style="box-shadow: 0px 1px 11px -1px rgba(216, 216, 216, 0.75);">
								<div class="alert alert-dark" role="alert">
	                        		<h4 class="text-center font-weight-bold">Comments</h4>
	                        		<hr>
	                        	</div>

                            	@if($ticket->status->name != "closed")
									<li>
				                        <div class="bd-example bd-example-padded-bottom">
				                        	<button type="button" class="btn btn-warning " data-toggle="modal" data-target="#gridSystemModal">
				                        		add comment
				                        	</button>
				                        </div>
	                                </li>
                                @endif

                            	@foreach ($comments as $element)
                            		<li>
	                                    <div class="avatar-block text-center">
	                                        <img src="{{ $element->user->getPhoto() }}" alt="img" class="img-responsive">
	                                        <div class="comment-by">
	                                            <h5 class="font-weight-bold"><a href="javascript:void(0)">{{ $element->user->name }}</a></h5>
	                                        </div>
	                                    </div>
	                                    <div class="review-content">
	                                        <h4>{{ $element->name }}</h4>
	                                        <div class="meta">
	                                            <span class="date">
												<i class="fa fa-calendar" aria-hidden="true"></i>
												{{ $element->created_at->toFormattedDateString() }}
											</span>
	                                            <span class="time">
												<i class="fa fa-clock-o" aria-hidden="true"></i>
												10:35pm
											</span>
	                                        </div>

	                                        <div class="review-entry">
	                                            <p class="text-justify">
	                                                {{ $element->comment }}
	                                            </p>
	                                        </div>

	                                        <div class="rate-review-block" style="margin-top: -14px">
	                                            {{-- <h5>Was this comment helpful to you?</h5>
	                                            <div class="btn-group">
	                                                <a href="javascript:void(0)" class="rate-btn toggole-contnet">
	                                                    <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Yes
	                                                </a>
	                                                <a href="javascript:void(0)" class="rate-btn toggole-contnet">
	                                                    <i class="fa fa-thumbs-o-down" aria-hidden="true"></i> No
	                                                </a>
	                                            </div> --}}

	                                            <a href="javascript:void(0)" class="report-link text-danger" data-toggle="modal" data-target="#report{{ $element->id }}">
													<b>Report Abuse</b>
												</a>
	                                        </div>
	                                    </div>
	                                </li>

	                                <div id="report{{ $element->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															
															<div class="modal-header">
																<h4 class="modal-title text-lowercase text-danger font-weight-bold text-center w-100" id="gridModalLabel">Report comment</h4>

																<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															</div>

															<div class="modal-body">
																<div class="form-block">
																	<form class="form-common" action="{{ route('report') }}" method="POST">
																		@csrf
																		
																		<div class="form-group">
																			<label for="formGroupExampleInput">Title</label>
																			<input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="report reason" required>
																		</div>

																		<div class="form-group">
																			<label for="formGroupExampleInput">Description</label>
																			<textarea name="description" class="form-control" required></textarea>
																		</div>

																		<input type="hidden" name="comment_id" value="{{ Crypt::encrypt($element->id) }}">

																		<div class="form-btn-block my-4">
																			<button type="submit" class="btn font-weight-bold btn-info">save</button>
																		</div>
																	</form>
																</div>
															</div>

														</div>
													</div>
												</div>
                            	@endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<div id="gridSystemModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title text-lowercase font-weight-bold text-center w-100" id="gridModalLabel">Add comment</h4>

					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>

				<div class="modal-body">
					<div class="form-block">
						<form class="form-common" action="{{ route('comment') }}" method="POST">
							@csrf
							
							<div class="form-group">
								<label for="formGroupExampleInput">Title</label>
								<input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="comment title" required>
							</div>

							<div class="form-group">
								<label for="formGroupExampleInput">Comment</label>
								<textarea name="comment" class="form-control" required></textarea>
							</div>

							<input type="hidden" name="ticket_id" value="{{ Crypt::encrypt($ticket->id) }}">

							<div class="form-btn-block my-4">
								<button type="submit" class="btn font-weight-bold btn-info">save</button>
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div id="update" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title text-info text-lowercase font-weight-bold text-center w-100" id="gridModalLabel">Update Ticket</h4>

					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>

				<div class="modal-body">
					<div class="form-block">
						<form class="form-common" action="{{ route('update') }}" method="POST">
							@csrf
							
							<div class="form-group">
								<label for="formGroupExampleInput">Ticket type</label>
								<select name="type_id" class="form-control">
									<option value=""></option>

									@foreach (App\TicketType::all() as $element)
										<option value="{{ $element->id }}" @if($ticket->ticket_type_id == $element->id) selected @endif> {{ $element->name }} </option>
									@endforeach
								</select>
							</div>

							<div class="form-group">
								<label for="formGroupExampleInput">Ticket status</label>
								<select name="status_id" class="form-control">
									<option value=""></option>
									@foreach (App\TicketStatus::all() as $element)
										<option value="{{ $element->id }}" @if($ticket->ticket_status_id == $element->id) selected @endif> {{ $element->name }} </option>
									@endforeach
								</select>
							</div>

							<div class="row">
								<div class="form-group col">
									<label for="formGroupExampleInput">Pickup Date</label>
									<input type="date" name="pickup_date" value="{{ $ticket->pickup_date }}" class="form-control">
								</div>

								<div class="form-group col">
									<label for="formGroupExampleInput">Handover Date</label>
									<input type="date" name="handover_date" value="{{ $ticket->handover_date }}" class="form-control">
								</div>
							</div>
							
							<input type="hidden" name="ticket_id" value="{{ Crypt::encrypt($ticket->id) }}">

							<div class="form-btn-block my-4">
								<button type="submit" class="btn font-weight-bold btn-info">save</button>
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div id="assign" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title text-info text-lowercase font-weight-bold text-center w-100" id="gridModalLabel">Assign staff</h4>

					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>

				<div class="modal-body">
					<div class="form-block">
						<form class="form-common" action="{{ route('assign') }}" method="POST">
							@csrf
							
							<div class="form-group">
								<label for="formGroupExampleInput">Staff members</label>
								<select name="staff_id" class="form-control">
									<option value=""></option>

									@foreach (App\User::all() as $user)
										@if($user->role->name == "GCUAVS Staff")
											<option value="{{ $user->id }}"> {{ $user->name }} </option>
										@endif
									@endforeach
								</select>
							</div>
							
							<input type="hidden" name="ticket_id" value="{{ Crypt::encrypt($ticket->id) }}">

							<div class="form-btn-block my-4">
								<button type="submit" class="btn font-weight-bold btn-info">save</button>
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>
@endsection
