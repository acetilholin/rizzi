<div class="modal fade" id="addOffer" tabindex="-1" aria-labelledby="addOffer" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('offers.newOffer') }}</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('/offers') }}" id="addNew">
                    <div class="row">
                        <div class="form-group col-6 col-padding">
                            <label for="title">{{ trans('offers.title') }}</label>
                            <input type="text" class="form-control" placeholder="Inserisci il titolo" id="title" name="title" required>
                        </div>
                        <div class="form-group col-3 col-padding">
                            <label for="datepicker1">{{ trans('offers.from') }}</label>
                            <input type="text" class="form-control" id="datepicker1" placeholder="Inserisci la data" name="date_from">
                        </div>
                        <div class="form-group col-3 col-padding">
                            <label for="datepicker2">{{ trans('offers.to') }}</label>
                            <input type="text" class="form-control" id="datepicker2" placeholder="Inserisci la data" name="date_to">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-padding">
                            <label for="subtitle">{{ trans('offers.description') }}</label>
                            <textarea class="form-control editor" placeholder="Inserisci descrizione" id="subtitle" name="subtitle" rows="6" required></textarea>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group col-3 col-padding">
                            <label for="active">{{ trans('offers.status') }}</label>
                            <select class="custom-select" name="active" id="active">
                                <option value="1">Attiva</option>
                                <option value="0">Inattiva</option>
                            </select>
                        </div>
                        <div class="form-group col-4 col-padding">
                            <label for="p-mp">{{ trans('offers.price') }}
                                <span class="text-custom">{{ trans('offers.mpLong') }}</span>
                                <i class="fas fa-info-circle" id="p1-info" style="color: lightgray" data-toggle="p1-info" title="e.g. 44 senza segno per €" data-placement="top"></i>
                            </label>
                            <input type="text" class="form-control" placeholder="Inserisci il prezzo" id="p-mp" aria-describedby="priceMPHelp" name="price_mp" required>
                            <small id="priceMPHelp" class="form-text text-muted">{{ trans('offers.zero') }}</small>
                        </div>
                        <div class="form-group col-4 col-padding">
                            <label for="p-pc">{{ trans('offers.price') }}
                                <span class="text-custom">{{ trans('offers.pcLong') }}</span>
                            </label>
                            <input type="text" class="form-control" placeholder="Inserisci il prezzo" id="p-pc" aria-describedby="pricePCHelp" name="price_pc" required>
                            <small id="pricePCHelp" class="form-text text-muted">{{ trans('offers.zero') }}</small>
                        </div>
                    </div>
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
