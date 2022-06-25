@if(session('error_message'))
<div class="alert alert-danger alert-dismissible msg no-print">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h6><i class="icon fa fa-check"></i>Error! <span style="color: var(--light); margin-left: 10px;">{{ session('error_message') }}</span>
    </h6>
</div>
@endif