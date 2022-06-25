<div class="modal fade" id="confirm-delete" style="display: none;" aria-hidden="true" style="width: 70%;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Confirm Delete</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="post" id="deleteForm" action="">
                <div class="modal-body">
                    @csrf()
                    @method('delete')
                    <div class="text-center">
                        @if (isset($type))
                            <h5 style="margin: 10px">Are you sure you want to delete this {{ $type }}?</h5>
                        @else
                            <h5 style="margin: 10px" class="modal-text">Are you sure you want to delete this record?
                            </h5>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>