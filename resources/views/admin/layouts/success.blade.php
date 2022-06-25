@if(session('success_message'))
<div class="alert alert-success alert-dismissible msg no-print">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h6><i class="icon fa fa-check"></i>Success! <span style="color: var(--light); margin-left: 10px;">{{ session('success_message') }}</span>
    </h6>
</div>
@endif