<div wire:ignore.self class="modal fade" id="delete-all-modal">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">@lang('all.deleteAll')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="@lang('all.close')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @lang('all.are_you_sure_to_delete_all')
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('all.no')</button>
                <form action="{{ route('admin.posts.destroyAll') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">
                        @lang('all.yes')
                    </button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
