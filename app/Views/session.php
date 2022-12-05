<div id="idle-timeout-dialog" data-backdrop="static" tabindex="-1" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
	    <div class="modal-content">
	        <div class="modal-header" style="padding: 12px;background: #eeeef5">
	            <input type="hidden" id="base" value="http://localhost/probizdel-basics/">
	                <h3 class="modal-title">Session Timeout Notification</h3>
	        </div>
	        <div class="modal-body" style="padding: 17px;">
	            <p>Your session is about to expire 
	                <span id="idle-timeout-counter"></span> seconds.
	            </p>
	            <p> Do you want to continue your session ? </p>
	        </div>
	        <div class="modal-footer text-center" style="padding: 13px;">
	            <button id="idle-timeout-dialog-keepalive" type="button" class="btn btn-outline-primary" data-dismiss="modal">Yes, Keep Working</button>
	        </div>
	    </div>
	</div>
</div>