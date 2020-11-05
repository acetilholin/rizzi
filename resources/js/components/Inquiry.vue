<template>
    <div>
        <div class="row inquiry" >
            <div class="form-group col-1">
                <label for="title">Titolo</label>
                <select class="custom-select"
                        id="title"
                        name="title"
                        v-model="salutation"
                >
                    <option selected></option>
                    <option value="Signor">Sig.</option>
                    <option value="Signora">Sig.ra</option>
                    <option value="Famiglia">Fam</option>
                </select>
                <div class="invalid-feedback"/>
            </div>
            <div class="form-group col-3">
                <label for="fullnameInquiry">Nome e cognome *</label>
                <input type="text"
                       class="form-control"
                       id="fullnameInquiry"
                       v-bind:class="{ 'is-invalid': fnInv }"
                       aria-describedby="emailHelp"
                       name="fullname"
                       v-model="fullname"
                       @input="$v.fullname.$touch"
                >
                <div class="invalid-feedback">
                    Inserisci nome e cognome
                </div>
                <div v-if="!$v.fullname.minLength">
                    <span class="is-invalid">La lunghezza minima è di {{ $v.fullname.$params.minLength.min - fullname.length }} caratteri</span>
                </div>
            </div>
            <div class="form-group col-3">
                <label for="email">Email *</label>
                <input type="email"
                       class="form-control"
                       id="email"
                       name="email"
                       v-bind:class="{ 'is-invalid': emInv }"
                       v-model="email"
                       @input="$v.email.$touch"
                >
                <div class="invalid-feedback">
                    E-mail richiesta
                </div>
                <div v-if="!$v.email.email">
                    <span class="is-invalid">L'email non è valida.</span>
                </div>
            </div>
            <div class="form-group col-2">
                <label for="adults">Adulti *</label>
                <select class="custom-select"
                        id="adults"
                        name="adults"
                        v-model="adults"
                        v-bind:class="{ 'is-invalid': aduInv }"
                >
                    <option value="1">1 Adulto</option>
                    <option value="2">2 Adulti</option>
                    <option value="3">3 Adulti</option>
                    <option value="4">4 Adulti</option>
                    <option value="5">5 Adulti</option>
                    <option value="6">6 Adulti</option>
                    <option value="7">7 Adulti</option>
                    <option value="8">8 Adulti</option>
                    <option value="9">9 Adulti</option>
                    <option value="10">10 Adulti</option>
                </select>
                <div v-if="aduInv">
                    <span class="is-invalid">Il campo è obbligatiorio</span>
                </div>
            </div>
            <div class="form-group col-2">
                <label for="kids">Bambini *</label>
                <select class="custom-select"
                        id="kids"
                        name="kids"
                        v-model="kids"
                        v-bind:class="{ 'is-invalid': kiInv }"
                >
                    <option value="0">0 Bambini</option>
                    <option value="1">1 Bambino</option>
                    <option value="2">2 Bambini</option>
                    <option value="3">3 Bambini</option>
                    <option value="4">4 Bambini</option>
                </select>
                <div v-if="kiInv">
                    <span class="is-invalid">Il campo è obbligatiorio</span>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="form-group col-3">
                <label for="board">Pensione</label>
                <select class="custom-select"
                        id="board"
                        name="board"
                        v-model="board"
                >
                    <option value="mezza">Mezza pensione</option>
                    <option value="completa">Pensione completa</option>
                </select>
                <div class="invalid-feedback"> </div>
            </div>
            <div class="form-group col-3">
                <label for="dp1">Arrivo *</label>
                <vc-date-picker locale="it"
                                v-model="arrival"
                                :attributes='attributes'
                                mode="date"
                                :masks="masks"
                                color="red"
                                :max-date="departure"
                >
                    <template v-slot="{ inputValue, inputEvents }">
                        <input
                            id="dp1"
                            class="form-control"
                            :value="inputValue"
                            v-on="inputEvents"
                            v-bind:class="{ 'is-invalid': arrInv }"
                        />
                    </template>
                </vc-date-picker>
                <div v-if="arrInv">
                    <span class="is-invalid">Il campo è obbligatiorio</span>
                </div>
            </div>
            <div class="form-group col-3">
                <label for="dp2">Partenza *</label>
                <vc-date-picker locale="it"
                                v-model="departure"
                                mode="date"
                                :attributes='attributes'
                                :masks="masks"
                                :min-date="arrival"
                                color="red"
                >
                    <template v-slot="{ inputValue, inputEvents }">
                        <input
                            id="dp2"
                            class="form-control"
                            :value="inputValue"
                            v-bind:class="{ 'is-invalid': depInv }"
                            v-on="inputEvents"
                        />
                    </template>
                </vc-date-picker>
                <div v-if="depInv">
                    <span class="is-invalid">Il campo è obbligatiorio</span>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            I dati vengono trattati ai sensi del Regolamento (UE) 2016/679 del Parlamento europeo e del Consiglio.<br><br>
        </div>
        <div class="row">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" v-model="iPrivacy" class="custom-control-input" id="checkInquiry">
                <label class="custom-control-label" for="checkInquiry">
                    Accetto <span class="text-custom cursor" data-toggle="modal" data-target="#privacy">l’informativa sulla privacy</span>
                </label>
            </div>
        </div>
        <div class="row mt-1">
            * Campo obbligatorio
        </div>
        <VueLoadingButton class="btn btn-custom remove-ml mt-3 hvr-underline-from-center"
                          @click.native="sendInquiry"
                          :loading="isLoading"
                          :disabled="!this.iPrivacy"
        ><i class="far fa-envelope"></i> {{ buttonText }}
        </VueLoadingButton>
    </div>
</template>

<script>

import {required, maxLength, minLength, email} from 'vuelidate/lib/validators'
import VueLoadingButton from "vue-loading-button";
import DatePicker from 'v-calendar/lib/components/date-picker.umd'

export default {
    name: "Inquiry",
    data() {
        return {
            attributes: [
                {
                    key: 'today',
                    dot: true,
                    content: 'black',
                    dates: new Date()
                }
            ],
            iPrivacy: false,
            isLoading: false,
            salutation: '', fullname: '',
            email: '', adults: '', kids: '',
            board: '', arrival: null, departure: null,
            fnInv: false, emInv: false, aduInv: false, depInv: false,
            arrInv: false, kiInv: false, buttonText: 'Inviare',
            masks: {
                input: 'DD.MM.YYYY'
            }
        }
    },
    components: {
        VueLoadingButton,
        DatePicker
    },
    validations: {
        fullname: {
            required,
            minLength: minLength(7),
        },
        email: {
            required,
            email: email
        }
    },
    methods: {
        sendInquiry() {
            if (this.privacy) {
                this.depInv = this.departure === null
                this.arrInv = this.arrival === null
                this.aduInv = this.adults === ''
                this.kiInv = this.kids === ''
                this.emInv = this.email === ''
                this.fnInv = this.fullname === ''

                if (!this.depInv && !this.arrInv && !this.aduInv && !this.kiInv && !this.emInv && !this.fnInv) {
                    this.isLoading = true
                    axios.post('/send-inquiry', {
                        salutation: this.salutation,
                        fullname: this.fullname,
                        email: this.email,
                        adults: this.adults,
                        kids: this.kids,
                        board: this.board,
                        arrival: this.arrival,
                        departure: this.departure
                    })
                        .then(response => {
                            this.isLoading = response.data.loading
                            setTimeout(() => {
                                this.buttonText =  response.data.resp
                            }, 500)
                        })
                }
            }
        }
    }
}
</script>

<style scoped>
    button:disabled {
        cursor: not-allowed;
        pointer-events: all !important;
    }
</style>
