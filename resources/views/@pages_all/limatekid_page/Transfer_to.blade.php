<div id="confirm_request{{$request->request_id}}" class="modal animated rubberBand delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
       <div class="modal-content">
          <div class="modal-body text-center">
             <form action="{{url('confirm_request',$request->request_id)}}" method="post">
               @csrf
                <div class="card-body">
                   <div class="row">
                      <div class="col-md-12">
                         <div class="card-header">
                            <h5>You are <span style="color:green">{{Auth::user()->name}} </span> and confirming the request</h5>
                         </div>
                         
                            <div class="col-md-12">
                               <div class="form-group">
                                  <label class="float-left">Confirmation:</label>
                                  <textarea class="form-control" name="confirmation" required placeholder="Your Confirmation goes here"></textarea>
                               </div>
                            </div>
                            <b>Signature</b>&nbsp;&nbsp;<i>[{{Auth::user()->signature}}]</i>
                         </div>
                         {{$request->request_id}}
                      </div>
                   </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                   <a href="#" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                   <button type="submit" class="btn btn-info">Confirm</button>
                </div>
             </form>
          </div>
       </div>
    </div>
 </div>
 