<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Crypt;
use App\Ticket;
use Auth;
use App\Comment;
use App\Report;
use App\TicketStatus;
use App\TicketType;
use App\EquipmentTicket;
use DB;

class TicketController extends Controller
{
    public function ticket($id){
    	$id = Crypt::decrypt($id);
        $ticket = Ticket::find($id);
        $comments = $ticket->comments;

        return view('ticket', compact("ticket", "comments"));
    }

    public function filter_user(Request $request){
        $tickets = Ticket::where("requester_id", Auth::user()->id);

        if ($request->input("filter_status") != 0){
            $tickets = $tickets->where("ticket_status_id", $request->input("filter_status"));
        }

        if ($request->input("filter_priority") != 0){
            $tickets = $tickets->where("ticket_priority_id", $request->input("filter_priority"));
        }

        if ($request->input("filter_type") != 0){
            $tickets = $tickets->where("ticket_type_id", $request->input("filter_type"));
        }

        $tickets = $tickets->get();

        $data = '';

        if (isset($tickets[0]) ){
            foreach ($tickets->chunk(3) as $chunk_element){
                $data .='<div class="row">';
                    foreach ($chunk_element as $ticket){
                            $data .='<div class="col-md-4">';
                            $data .='<article class="popular-listing-post">';
                                $data .='<div class="post-thumb">';
                                    $data .='<img src="'.asset('assets/images/post/9.jpg').'" alt="img" class="img-responsive">';
                                    $data .='<div class="listing-info">';

                                        $data .='<div>';
                                            $data .='<h4 class="w-100 mb-3"><a href="" class="w-100 font-weight-bold text-center">'.$ticket->name.'</a></h4>';
                                            $data .='<a href="'.route('ticket', ['id' => Crypt::encrypt($ticket->id) ]).'" class="listing-btn-cmn pull-right mr-2 mb-2 font-weight-bold">details</a>';
                                        $data .='</div>';

                                        $data .='<h5 style="border-bottom: 2px solid white; padding-top: 9px;" class="pb-2 text-info font-weight-bold clearfix">Requested items:</h5>';

                                        $data .='<div class="row" style="margin-top: -4px !important;">';
                                            foreach ($ticket->equipments as $element){
                                                $data .='<div class="col-md-6">';
                                                    $data .='<p style="font-size: 12.5px">'.$element->name.'</p>';
                                                $data .='</div>';
                                            }
                                        $data .='</div>';
                                    $data .='</div>';

                                    $data .='<div class="overlay"></div>';
                                $data .='</div>';
                                $data .='<div class="post-details">';
                                    $data .='<div class="post-footer text-left">';
                                        $data .='<div class="row my-2 pb-2" style="padding-left: 15.5px;">';
                                            $data .='<div class="p-0 col-md-12 mx-1" style="font-size: 12.5px">';
                                                $data .='<i class="fa fa-calendar" aria-hidden="true"></i>';
                                                $data .='<b>issue date:</b>'.$ticket->created_at->toFormattedDateString().'';
                                            $data .='</div>';

                                            $data .='<div class="p-0 col-md-612 mx-1" style="font-size: 12.5px">';
                                                $data .='<i class="fa fa-calendar" aria-hidden="true"></i>';
                                                $data .='<b>pickup:</b>';

                                                if (!empty ($ticket->pickup_date)){
                                                    $data .=''.\Carbon\Carbon::parse($ticket->pickup_date)->toFormattedDateString();
                                                }
                                                else{
                                                    $data .='---------------------';
                                                }
                                            $data .='</div>';

                                            $data .='<div class="p-0 col-md-12 mx-1" style="font-size: 12.5px">';
                                                $data .='<i class="fa fa-calendar" aria-hidden="true"></i>';
                                                $data .='<b>handover:</b>';
                                                if (!empty($ticket->handover_date)){
                                                    $data .=''.\Carbon\Carbon::parse($ticket->handover_date)->toFormattedDateString();
                                                }
                                                else{ 
                                                    $data .='---------------------';
                                                }
                                           $data .='</div>';
                                        $data .='</div>';

                                        $data .='<div class="row my-2 pb-2 text-center" style="padding-left: 15.5px;">';
                                            $data .='<div class="p-0 col-md-6" style="font-size: 12.5px">';
                                            $data .='<b>status:</b> <span class="';
                                             
                                             if($ticket->status->name == "open")
                                                 $data .='text-success '; 
                                             elseif($ticket->status->name == "in-progress") 
                                                $data .='text-warning '; 
                                             else {
                                                $data .='text-danger '; 
                                             }
                                             
                                             $data .='font-weight-bold ">'; 
                                             $data .=''.$ticket->status->name.'</span>';

                                             $data .='</div>';

                                             $data .='<div class="p-0 col-md-6" style="font-size: 12.5px">';
                                             $data .='<b>priority:</b> <span class="';
                                                
                                             if($ticket->priority->name == "high") 
                                                $data .='text-danger '; 
                                             elseif($ticket->priority->name == "medium") 
                                                $data .='text-warning '; 
                                             else {
                                                $data .='text-info ';
                                             } 
                                                $data .='font-weight-bold ">'.$ticket->priority->name.'</span>';
                                             $data .='</div>';
                                        $data .='</div>';
                                    $data .='</div>';
                                $data .='</div>';
                            $data .='</article>';
                        $data .='</div>';
                    $data .='</div>';
                }
                $data .='</div>';
            }
        }else{
            $data .='<div class="row" style="margin-top: 15px; margin-bottom: 150px;">
                <div class="mx-3 text-center w-100 alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>No data to display!</strong>.
                </div>
            </div>';
        }

        return $data;
    }

    public function filter_staff(Request $request){
        $tickets = Ticket::where("name", "like", "%%");

        if ($request->input("filter_status") != 0){
            $tickets = $tickets->where("ticket_status_id", $request->input("filter_status"));
        }

        if ($request->input("filter_priority") != 0){
            $tickets = $tickets->where("ticket_priority_id", $request->input("filter_priority"));
        }

        if ($request->input("filter_type") != 0){
            $tickets = $tickets->where("ticket_type_id", $request->input("filter_type"));
        }

        $tickets = $tickets->get();

        $data = '';

        if (isset($tickets[0]) ){
            foreach ($tickets->chunk(3) as $chunk_element){
                $data .= '<div class="row">';
                    foreach ($chunk_element as $ticket){
                        $data .='<div class="col-md-4">';
                            $data .='<article class="popular-listing-post">';
                                $data .='<div class="post-thumb">';
                                    $data .='<img src="'.asset('assets/images/post/9.jpg').'" alt="img" class="img-responsive">';
                                     $data .='<div class="listing-info">';

                                         $data .='<div>';
                                             $data .='<h4 class="w-100 mb-3"><a href="" class="w-100 font-weight-bold text-center">'.$ticket->name.'</a></h4>';
                                             $data .='<a href="'.route('ticket', ['id' => Crypt::encrypt($ticket->id) ]).'" class="listing-btn-cmn pull-right mr-2 mb-2 font-weight-bold">details</a>';
                                         $data .='</div>';

                                         $data .='<h5 style="border-bottom: 2px solid white; padding-top: 9px;" class="pb-2 text-info font-weight-bold clearfix">Requested items:</h5>';

                                         $data .='<div class="row" style="margin-top: -4px !important;">';
                                            foreach ($ticket->equipments as $element){
                                                 $data .='<div class="col-md-6">';
                                                     $data .='<p style="font-size: 12.5px">'.$element->name.'</p>';
                                                 $data .='</div>';
                                            }
                                         $data .='</div>';
                                     $data .='</div>';

                                     $data .='<div class="overlay"></div>';
                                 $data .='</div>';
                                 $data .='<div class="post-details">';
                                     $data .='<div class="post-meta post-entry-block">';
                                         $data .='<div class="post-author text-info pull-left w-50">';
                                             $data .='<h5 class="text-left font-weight-bold text-uppercase pt-1" style="color: rgba(0, 0, 0, 0.5)">requested by</h5>';
                                         $data .='</div>';

                                         $data .='<div class="post-author w-50 mt-0">';
                                             $data .='<img src="'.$ticket->requester->getPhoto().'" alt="img" class="d-inline-block img-responsive">';
                                             $data .='<p class="post-entry d-inline ml-1" style="font-size: 15.4px; color: rgba(0, 0, 0, 0.7)">'.
                                                $ticket->requester->name.
                                            '</p>';
                                         $data .='</div>';
                                     $data .='</div>';
                                     $data .='<div class="post-entry-block">';
                                         $data .='<div class="post-author text-info pull-left w-50">';
                                             $data .='<h5 class="text-left font-weight-bold text-uppercase pt-1">assigned to</h5>';
                                         $data .='</div>';

                                         $data .='<div class="post-author w-50 mt-0">';
                                            if($ticket->assigner){
                                                 $data .='<img src="'.$ticket->assigner->getPhoto().'" alt="img" class="d-inline-block img-responsive">';

                                                 $data .='<p class="post-entry d-inline ml-1" style="font-size: 15.4px; color: rgba(0, 0, 0, 0.7)">
                                                    '.$ticket->assigner->name.'
                                                </p>';
                                            }else{
                                                 $data .='<p class="post-entry d-inline ml-1" style="font-size: 15.4px; color: rgba(0, 0, 0, 0.7)">';
                                                     $data .='---------------------------';
                                                 $data .='</p>';
                                            }
                                         $data .='</div>';
                                     $data .='</div>';
                                     $data .='<div class="post-footer text-center">
                                        <div class="contact-no d-inline-block pull-left">';
                                             $data .='<h5><i class="fa fa-calendar" aria-hidden="true"></i> <b>date: </b>';
                                            if (!empty ($ticket->pickup_date)){
                                                 $data .=''.\Carbon\Carbon::parse($ticket->pickup_date)->toFormattedDateString();
                                            }else{
                                                 $data .='---------------------';
                                            }
                                        $data .='</div>';
                                        $data .='<div class="schedule-info pull-right'.$ticket->status->name.'">';
                                            $data .='<i class="fa fa-clock-o" aria-hidden="true"></i>';
                                            $data .='<h5 class="font-weight-bold">'.$ticket->status->name.'</h5>';
                                        $data .='</div>';
                                    $data .='</div>';
                                $data .='</div>';
                            $data .='</article>';
                        $data .='</div>';
                    }
                $data .='</div>';
            }
        }else{
            $data .='<div class="row" style="margin-top: 15px; margin-bottom: 150px;">
                <div class="mx-3 text-center w-100 alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>No data to display!</strong>.
                </div>
            </div>';
        }

        return $data;
    }

    public function assign(Request $request){
    	$id = Crypt::decrypt($request->input("ticket_id"));

        $ticket = Ticket::find($id);

        $ticket->staff_id = $request->input("staff_id");
        $saved = $ticket->save();

        if ($saved){
            $notification = array(
                'message'    => 'Operation done successfully', 
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message'    => 'Problem in the desired operation. Try again!!!', 
                'alert-type' => 'error'
            );
        }

		return back()->with($notification);
    }

    public function update(Request $request){
    	$id = Crypt::decrypt($request->input("ticket_id"));

        $ticket = Ticket::find($id);

        $ticket->ticket_status_id = ($request->input("status_id") == "") ? $ticket->ticket_status_id : $request->input("status_id");
        $ticket->ticket_type_id = ($request->input("type_id") == "") ? $ticket->ticket_type_id : $request->input("type_id");
        $ticket->pickup_date = ($request->input("pickup_date") == "") ? $ticket->ticket_status_id : $request->input("pickup_date");
        $ticket->handover_date = ($request->input("handover_date") == "") ? $ticket->ticket_type_id : $request->input("handover_date");

        $saved = $ticket->save();

        if ($saved){
            $notification = array(
                'message'    => 'Operation done successfully', 
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message'    => 'Problem in the desired operation. Try again!!!', 
                'alert-type' => 'error'
            );
        }

		return back()->with($notification);
    }

    public function request(Request $request){

        $ticket = new Ticket();
        $ticket->name = $request->input("name");
        $ticket->ticket_status_id = TicketStatus::where("name", "like", "open")->get()[0]->id;
        $ticket->ticket_type_id = TicketType::where("name", "like", "equipment available")->get()[0]->id;
        $ticket->pickup_date = ($request->input("pickup_date") == "") ? $ticket->ticket_status_id : $request->input("pickup_date");
        $ticket->handover_date = ($request->input("handover_date") == "") ? $ticket->ticket_type_id : $request->input("handover_date");
        $ticket->requester_id = Auth::user()->id;
        $ticket->ticket_priority_id = $request->input("priority_id");
        $saved = $ticket->save();

        DB::insert('insert into equipment_ticket (equipment_id, ticket_id) values (?, ?)', [$request->input("equipment"), $ticket->id]);

        if ($saved){
            $notification = array(
                'message'    => 'Operation done successfully', 
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message'    => 'Problem in the desired operation. Try again!!!', 
                'alert-type' => 'error'
            );
        }

		return back()->with($notification);
    }

    public function comment(Request $request){
    	$comment = new Comment();

    	$comment->name = $request->input("name");
    	$comment->comment = $request->input("comment");
    	$comment->user_id = Auth::user()->id;
    	$comment->ticket_id = Crypt::decrypt($request->input("ticket_id"));

    	$saved = $comment->save();

    	if ($saved){
            $notification = array(
                'message'    => 'Operation done successfully', 
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message'    => 'Problem in the desired operation. Try again!!!', 
                'alert-type' => 'error'
            );
        }
        
        return back()->with($notification);
    }

    public function report(Request $request){
    	$report = new Report();

    	$report->name = $request->input("name");
    	$report->description = $request->input("description");
    	$report->user_id = Auth::user()->id;
    	$report->comment_id = Crypt::decrypt($request->input("comment_id"));

    	$saved = $report->save();

    	if ($saved){
            $notification = array(
                'message'    => 'Operation done successfully', 
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message'    => 'Problem in the desired operation. Try again!!!', 
                'alert-type' => 'error'
            );
        }

        return back()->with($notification);
    }
}
