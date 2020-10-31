<div class="modal fade" id="editOffer" tabindex="-1" aria-labelledby="editOffer" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('offers.editOffer') }}</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('update') }}" >
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-6 col-padding">
                            <label for="update-title">{{ trans('offers.title') }}</label>
                            <input type="text" class="form-control" id="update-title" placeholder="Inserisci il titolo" name="title">
                        </div>
                        <div class="form-group col-3">
                            <label for="datepicker1">{{ trans('offers.from') }}</label>
                            <input type="text" class="form-control" id="update-from" placeholder="Scegli la data" name="date_from">
                        </div>
                        <div class="form-group col-3">
                            <label for="datepicker2">{{ trans('offers.to') }}</label>
                            <input type="text" class="form-control" id="update-to" placeholder="Scegli la data" name="date_to">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-9 col-padding">
                            <label for="update-title">{{ trans('offers.subtitle') }}</label>
                            <input type="text" class="form-control" id="update-subtitle" placeholder="Inserisci breve descrizione" name="subtitle">
                        </div>
                        <div class="form-group col-3 col-padding">
                            <label for="update-status">{{ trans('offers.status') }}</label>
                            <select class="custom-select" id="update-active" name="active">
                                <option value="1">Attiva</option>
                                <option value="0">Inattiva</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="id" id="offer-id">
                    @csrf
                    <button type="submit" class="btn btn-custom">{{ trans('offers.update') }}</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-custom hvr-underline-from-center" data-dismiss="modal">{{ trans('offers.close') }}</button>
            </div>
        </div>
    </div>
</div>
