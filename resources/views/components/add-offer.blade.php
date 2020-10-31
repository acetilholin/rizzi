<div class="modal fade" id="addOffer" tabindex="-1" aria-labelledby="addOffer" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('offers.newOffer') }}</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="/offers" >
                    <div class="row">
                        <div class="form-group col-6 col-padding">
                            <label for="update-title">{{ trans('offers.title') }}</label>
                            <input type="text" class="form-control" placeholder="Inserisci il titolo" name="title">
                        </div>
                        <div class="form-group col-3">
                            <label for="add-from">{{ trans('offers.from') }}</label>
                            <input type="text" class="form-control" id="add-from" placeholder="Scegli la data" name="date_from">
                        </div>
                        <div class="form-group col-3">
                            <label for="add-to">{{ trans('offers.to') }}</label>
                            <input type="text" class="form-control" id="add-to" placeholder="Scegli la data" name="date_to">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-9 col-padding">
                            <label for="update-title">{{ trans('offers.subtitle') }}</label>
                            <input type="text" class="form-control" placeholder="Inserisci breve descrizione" name="subtitle">
                        </div>
                        <div class="form-group col-3 col-padding">
                            <label for="update-status">{{ trans('offers.status') }}</label>
                            <select class="custom-select" name="active">
                                <option value="1">Attiva</option>
                                <option value="0">Inattiva</option>
                            </select>
                        </div>
                    </div>
                    @csrf
                    @include('messages.login-register')
                    @yield('content')
                    <button type="submit" class="btn btn-custom">{{ trans('offers.add') }}</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-custom hvr-underline-from-center" data-dismiss="modal">{{ trans('offers.close') }}</button>
            </div>
        </div>
    </div>
</div>
