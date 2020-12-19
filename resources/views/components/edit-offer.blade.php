<div class="modal fade" id="editOffer" tabindex="-1" aria-labelledby="editOffer" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('offers.editOffer') }}</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('offerUpdate') }}" >
                    @method('PUT')
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-update-it" role="tab" aria-controls="nav-home" aria-selected="true">
                            {!! Html::image('countries/it.svg','drzava', array('width' => '30px', 'height' => '30px')) !!}
                        </a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-update-en" role="tab" aria-controls="nav-profile" aria-selected="false">
                            {!! Html::image('countries/gb.svg','drzava', array('width' => '30px', 'height' => '30px')) !!}
                        </a>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-update-it" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row mt-4" id="edit">
                                <div class="form-group col-6 col-padding">
                                    <label for="update-title">{{ trans('offers.title') }}</label>
                                    <input type="text" class="form-control" id="update-title" placeholder="Inserisci il titolo" name="title">
                                </div>
                                <div class="form-group col-3 col-padding">
                                    <label for="datepicker1">{{ trans('offers.from') }}</label>
                                    <input type="text" class="form-control" id="update-from" placeholder="Scegli la data" name="date_from">
                                </div>
                                <div class="form-group col-3 col-padding">
                                    <label for="datepicker2">{{ trans('offers.to') }}</label>
                                    <input type="text" class="form-control" id="update-to" placeholder="Scegli la data" name="date_to">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-padding">
                                    <label for="update-subtitle">{{ trans('offers.description') }}</label>
                                    <textarea class="form-control editor" id="update-subtitle" name="subtitle"></textarea>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group col-3 col-padding">
                                    <label for="update-status">{{ trans('offers.status') }}</label>
                                    <select class="custom-select" id="update-active" name="active">
                                        <option value="1">Attiva</option>
                                        <option value="0">Inattiva</option>
                                    </select>
                                </div>
                                <div class="form-group col-4 col-padding">
                                    <label for="update-pmp">{{ trans('offers.price') }}
                                        <span class="text-custom">mezza pensione</span>
                                        <i class="fas fa-info-circle" id="p2-info" style="color: lightgray" data-toggle="p3-info" title="e.g. 44 senza segno per €" data-placement="top"></i>
                                    </label>
                                    <input type="text" class="form-control" placeholder="Inserisci il prezzo" id="update-pmp" aria-describedby="priceMPHelp" name="price_mp" required>
                                    <small id="priceMPHelp" class="form-text text-muted">{{ trans('offers.zero') }}</small>
                                </div>
                                <div class="form-group col-4 col-padding">
                                    <label for="update-ppc">{{ trans('offers.price') }}
                                        <span class="text-custom">pensione completa</span>
                                    </label>
                                    <input type="text" class="form-control" placeholder="Inserisci il prezzo" id="update-ppc" aria-describedby="pricePCHelp" name="price_pc" required>
                                    <small id="pricePCHelp" class="form-text text-muted">{{ trans('offers.zero') }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-update-en" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="row mt-5">
                                <div class="form-group col-12 col-padding">
                                    <label for="title">{{ trans('offers.titleEN') }}</label>
                                    <input type="text" class="form-control" placeholder="Inserisci il titolo" id="update-title-en" name="titleEN">
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="form-group col-12 col-padding">
                                    <label for="subtitle">{{ trans('offers.description') }}</label>
                                    <textarea class="form-control editor" placeholder="Inserisci descrizione" id="update-subtitle-en" name="subtitleEN" rows="6"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id" id="offer-id">
                    @csrf
                    <button type="submit" class="btn btn-custom hvr-underline-from-center">{{ trans('offers.update') }}</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-custom hvr-underline-from-center" data-dismiss="modal">{{ trans('offers.close') }}</button>
            </div>
        </div>
    </div>
</div>
