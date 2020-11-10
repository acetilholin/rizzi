<template>
    <div>
        <div class="row inquiry" >
            <div class="form-group col-md-1">
                <label for="title">{{ $t("inquiry.title") }}</label>
                <select class="custom-select"
                        id="title"
                        name="title"
                        v-model="salutation"
                >
                    <option value="0">{{ $t("inquiry.sir") }}</option>
                    <option value="1">{{ $t("inquiry.madam") }}</option>
                    <option value="2">{{ $t("inquiry.family") }}</option>
                </select>
                <div class="invalid-feedback"/>
            </div>
            <div class="form-group col-md-3">
                <label for="fullnameInquiry">{{ $t("contact.fullname") }} *</label>
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
                    {{ $t("contact.insertFullname") }}
                </div>
                <div v-if="!$v.fullname.minLength">
                    <span class="is-invalid">{{ $t("contact.minLength") }} {{ $v.fullname.$params.minLength.min - fullname.length }} {{ $t("contact.chars") }}</span>
                </div>
            </div>
            <div class="form-group col-md-3">
                <label for="email">{{ $t("contact.email") }} *</label>
                <input type="email"
                       class="form-control"
                       id="email"
                       name="email"
                       v-bind:class="{ 'is-invalid': emInv }"
                       v-model="email"
                       @input="$v.email.$touch"
                >
                <div class="invalid-feedback">
                    {{ $t("contact.emailRequired") }}
                </div>
                <div v-if="!$v.email.email">
                    <span class="is-invalid">{{ $t("contact.emailInvalid") }}</span>
                </div>
            </div>
            <div class="form-group col-md-2">
                <label for="dp1">{{ $t("inquiry.arrival") }} *</label>
                <vc-date-picker :locale=this.lang
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
                    <span class="is-invalid">{{ $t("inquiry.required") }}</span>
                </div>
            </div>
            <div class="form-group col-md-2">
                <label for="dp2">{{ $t("inquiry.departure") }} *</label>
                <vc-date-picker :locale=this.lang
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
                    <span class="is-invalid">{{ $t("inquiry.required") }}</span>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="form-group col-md-3">
                <label for="board">{{ $t("inquiry.board") }}</label>
                <select class="custom-select"
                        id="board"
                        name="board"
                        v-model="board"
                >
                    <option value="mezza">{{ $t("inquiry.MP") }}</option>
                    <option value="completa">{{ $t("inquiry.PC") }}</option>
                </select>
                <div class="invalid-feedback"> </div>
            </div>
            <div class="form-group col-md-2">
                <label for="adults">{{ $t("inquiry.adultsTitle") }} *</label>
                <select class="custom-select"
                        id="adults"
                        name="adults"
                        v-model="adults"
                        v-bind:class="{ 'is-invalid': aduInv }"
                >
                    <option value="1">1 {{ $t("inquiry.adult") }}</option>
                    <option value="2">2 {{ $t("inquiry.adults") }}</option>
                    <option value="3">3 {{ $t("inquiry.adults") }}</option>
                    <option value="4">4 {{ $t("inquiry.adults") }}</option>
                    <option value="5">5 {{ $t("inquiry.adults") }}</option>
                    <option value="6">6 {{ $t("inquiry.adults") }}</option>
                    <option value="7">7 {{ $t("inquiry.adults") }}</option>
                    <option value="8">8 {{ $t("inquiry.adults") }}</option>
                    <option value="9">9 {{ $t("inquiry.adults") }}</option>
                    <option value="10">10 {{ $t("inquiry.adults") }}</option>
                </select>
                <div v-if="aduInv">
                    <span class="is-invalid">{{ $t("inquiry.required") }}</span>
                </div>
            </div>
            <div class="form-group col-md-2">
                <label for="kids">{{ $t("inquiry.childrenTitle") }} *</label>
                <select class="custom-select"
                        id="kids"
                        name="kids"
                        v-model="kids"
                        v-bind:class="{ 'is-invalid': kiInv }"
                >
                    <option value="0">0 {{ $t("inquiry.children") }}</option>
                    <option value="1">1 {{ $t("inquiry.child") }}</option>
                    <option value="2">2 {{ $t("inquiry.children") }}</option>
                    <option value="3">3 {{ $t("inquiry.children") }}</option>
                    <option value="4">4 {{ $t("inquiry.children") }}</option>
                </select>
                <div v-if="kiInv">
                    <span class="is-invalid">{{ $t("inquiry.required") }}</span>
                </div>
            </div>
        </div>
        <div class="row mt-4 tx-mobile" style="z-index: -1">
            {{ $t("inquiry.info") }}
            <br><br>
        </div>
        <div class="row">
            <div class="custom-control custom-checkbox tx-mobile">
                <input type="checkbox" v-model="iPrivacy" class="custom-control-input" id="checkInquiry">
                <label class="custom-control-label" for="checkInquiry">
                    {{ $t("contact.accept") }}
                    <span v-if="lang ==='it'" class="text-custom cursor" data-toggle="modal" data-target="#privacyIT">{{ $t("contact.privacyPolicy") }}</span>
                    <span v-if="lang ==='en-GB'" class="text-custom cursor" data-toggle="modal" data-target="#privacyEN">{{ $t("contact.privacyPolicy") }}</span>
                </label>
            </div>
        </div>
        <div class="row mt-1 tx-mobile">
            {{ $t("inquiry.mandatory") }}
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
            arrInv: false, kiInv: false, buttonText: this.send,
            masks: {
                input: 'DD.MM.YYYY'
            }
        }
    },
    props: ['lang','send'],
    components: {
        VueLoadingButton,
        DatePicker
    },
    created() {
        this.$root.$i18n.locale = this.lang
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
            if (this.iPrivacy) {
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
    .custom-control {
        padding-left: 1.7rem !important;
    }
</style>
