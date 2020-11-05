<div class="modal fade" id="changeImage" tabindex="-1" aria-labelledby="addOffer" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('offers.changeImage') }}</h5>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <img class="img-thumbnail" src="{{ asset('img/custom-fixed/cover.jpg') }}">
                </div>
                <form method="POST" enctype="multipart/form-data" action="{{ url('/image') }}" id="addNew">
                   <div class="mt-4">
                       <input type="file" class="form-control-file" name="photo" id="file">
                       <div class="text-muted">{{ trans('offers.imgSize') }}</div>
                       @csrf
                       <button type="submit" class="btn btn-outline-secondary mt-4">{{ trans('offers.change') }}</button>
                   </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-custom hvr-underline-from-center" data-dismiss="modal">{{ trans('offers.close') }}</button>
            </div>
        </div>
    </div>
</div>
