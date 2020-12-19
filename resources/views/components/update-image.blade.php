<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-lg">
            <div class="modal-body">

                <div class="text-center mt-2 mb-2">
                    <img src="/" id="update-image" style="height: 200px; width: 400px">
                </div>

                <form method="POST" action="{{ route('imageUpdate') }}" enctype="multipart/form-data" id="modalupdate">
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleFormControlFile1">{{ trans('image.image') }}</label>
                        <br>
                        <input type="file" class="form-control-file" name="file" id="fileUpdate">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="update-category">{{ trans('image.category') }}</label>
                        <select class="custom-select custom-select-sm" id="update-category" name="category">
                            <option value="hotel">Hotel</option>
                            <option value="rooms">Camere</option>
                            <option value="dine">Sale da pranzo</option>
                            <option value="stube">Weinstube</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="update-ita">
                            {!! Html::image('countries/it.svg','drzava', array('width' => '30px', 'height' => '30px')) !!}
                        </label>
                        <input type="text" class="form-control" id="update-ita" aria-describedby="emailHelp" name="caption_it">
                    </div>
                    <div class="form-group">
                        <label for="update-eng">
                            {!! Html::image('countries/gb.svg','drzava', array('width' => '30px', 'height' => '30px')) !!}
                        </label>
                        <input type="text" class="form-control" id="update-eng" aria-describedby="emailHelp" name="caption_en">
                    </div>

                    <input type="hidden" name="id" id="id">
                    @csrf
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-custom hvr-underline-from-center">{{ trans('offers.update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
