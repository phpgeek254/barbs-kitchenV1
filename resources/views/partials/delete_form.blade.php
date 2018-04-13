@component('delete', $object=null)
<div class="modal" id="delete_user_{{ $user->id }}">
    <div class="modal-content center">
        <h5 class="center">
            <i class="fa fa-question fa-3x"></i>
            <br> Are You Sure you want to delete ??
        </h5>
                
            </div>
                <div class="button" style="margin: 10px;">
                    <a href="#!" style="float: right; clear: both;" class="modal-action modal-close btn">Cancel</a>
                     @slot('slot')
        
    				@endslot	
                </div>
            </div>
   
@endcomponent