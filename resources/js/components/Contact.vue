<template>
    <div>
        <div class="form-group">
            <label for="fullnContact">Nome e cognome</label>
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
                Inserisci nome e cognome
            </div>
            <div v-if="!$v.fullname.minLength">
                <span class="is-invalid">La lunghezza minima è di {{ $v.fullname.$params.minLength.min - fullname.length }} caratteri</span>
            </div>
        </div>
        <div class="form-group">
            <label for="emailContact">Email</label>
            <input type="email"
                   class="form-control"
                   id="emailContact"
                   v-bind:class="{ 'is-invalid': emailValid }"
                   aria-describedby="emailHelp"
                   name="email"
                   v-model="email"
            >
            <div class="invalid-feedback">
                E-mail richiesta
            </div>
            <div v-if="!$v.email.email">
                <span class="is-invalid">L'email non è valida.</span>
            </div>
        </div>
        <div class="form-group">
            <label for="msgContact">Messaggio</label>
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
                Il messaggio è richiesto
            </div>
            <div v-if="!$v.message.minLength">
                <span class="is-invalid">{{ $v.message.$params.minLength.min - message.length }} caratteri in più</span>
            </div>
        </div>
        <div id="response-message" class="col-md-12 text-center"></div>
        <VueLoadingButton class="btn btn-custom remove-ml hvr-underline-from-center"
                          @click.native="sendEmail"
                          :loading="isLoading"
                          :disabled="$v.fullname.$invalid || !$v.email.email || !$v.email.required || $v.message.$invalid"
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
            message: '', email: '', fullname: '',
            nameSurnameValid: '', emailValid: '', messageValid: '',
            isLoading: false,
            buttonText: 'Inviare'
        }
    },
    components: {
        VueLoadingButton
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
