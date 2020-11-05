<div class="modal fade" id="addOffer" tabindex="-1" aria-labelledby="addOffer" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('offers.newOffer') }}</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('/offers') }}" id="addNew">
                    <add></add>
                    @csrf
                    <button type="submit" class="btn btn-custom">{{ trans('offers.add') }}</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-custom hvr-underline-from-center" data-dismiss="modal">{{ trans('offers.close') }}</button>
            </div>
        </div>
    </div>
</div>
