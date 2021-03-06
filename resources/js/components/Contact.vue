<template>
    <div>
        <div class="form-group">
            <label for="fullnContact">{{ $t("contact.fullname") }}</label>
            <input type="text"
                   class="form-control"
                   id="fullnContact"
                   v-bind:class="{ 'is-invalid': nameSurnameValid }"
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
        <div class="form-group">
            <label for="emailContact">{{ $t("contact.email") }}</label>
            <input type="email"
                   class="form-control"
                   id="emailContact"
                   v-bind:class="{ 'is-invalid': emailValid }"
                   aria-describedby="emailHelp"
                   name="email"
                   v-model="email"
            >
            <div class="invalid-feedback">
                {{ $t("contact.emailRequired") }}
            </div>
            <div v-if="!$v.email.email">
                <span class="is-invalid">{{ $t("contact.emailInvalid") }}</span>
            </div>
        </div>
        <div class="form-group">
            <label for="msgContact">{{ $t("contact.message") }}</label>
            <textarea class="form-control"
                      id="msgContact"
                      v-bind:class="{ 'is-invalid': messageValid }"
                      rows="4"
                      aria-describedby="emailHelp"
                      name="message"
                      v-model="message"
                      @input="$v.message.$touch"
            ></textarea>
            <div class="invalid-feedback">
                {{ $t("contact.messageRequired") }}
            </div>
            <div v-if="!$v.message.minLength">
                <span class="is-invalid">{{ $v.message.$params.minLength.min - message.length }} {{ $t("contact.charsMore") }}</span>
            </div>
        </div>
        <div class="custom-control custom-checkbox mb-3 tx-mobile">
            <input type="checkbox" v-model="cPrivacy" class="custom-control-input" id="checkContact">
            <label class="custom-control-label" for="checkContact">
                {{ $t("contact.accept") }}
                <span v-if="lang ==='it'" class="text-custom cursor" data-toggle="modal" data-target="#privacyIT">{{ $t("contact.privacyPolicy") }}</span>
                <span v-if="lang ==='en-GB'" class="text-custom cursor" data-toggle="modal" data-target="#privacyEN">{{ $t("contact.privacyPolicy") }}</span>
            </label>
        </div>
        <VueLoadingButton class="btn btn-custom remove-ml hvr-underline-from-center"
                          @click.native="sendEmail"
                          :loading="isLoading"
                          :disabled="!this.cPrivacy"
        ><i class="far fa-envelope"></i> {{ buttonText }}
        </VueLoadingButton>
    </div>
</template>

<script>

import {required, maxLength, minLength, email} from 'vuelidate/lib/validators'
import VueLoadingButton from "vue-loading-button";

export default {
    name: "Contact",
    data() {
        return {
            cPrivacy: false,
            message: '', email: '', fullname: '',
            nameSurnameValid: '', emailValid: '', messageValid: '',
            isLoading: false,
            buttonText: this.send,
        }
    },
    props: ['lang','send'],
    components: {
        VueLoadingButton
    },
    created() {
        this.$root.$i18n.locale = this.lang
    },
    validations: {
        fullname: {
            required,
            minLength: minLength(5),
        },
        email: {
            required,
            email: email
        },
        message: {
            required,
            minLength: minLength(30)
        }
    },
    methods: {
        sendEmail() {
            this.nameSurnameValid = this.fullname === ''
            this.emailValid = this.email === ''
            this.messageValid = this.message === ''

            if (this.fullname !== '' && this.email !== '' && this.message !== '') {
                this.isLoading = true
                axios.post('/send-message', {
                    email: this.email,
                    fullname: this.fullname,
                    message: this.message
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
</script>

<style scoped>
    button:disabled {
        cursor: not-allowed;
        pointer-events: all !important;
    }
</style>
