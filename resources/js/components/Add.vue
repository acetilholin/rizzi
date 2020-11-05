<template>
    <div>
        <div class="row">
            <div class="form-group col-6 col-padding">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" placeholder="Inserisci il titolo" id="title" name="title" required>
            </div>
            <div class="form-group col-3">
                <label for="from">Dal</label>
                <vc-date-picker locale="it"
                                v-model="from"
                                :attributes='attributes'
                                mode="date"
                                :masks="masks"
                                color="red"
                                :max-date="to"
                >
                    <template v-slot="{ inputValue, inputEvents }">
                        <input
                            id="from"
                            class="form-control"
                            :value="inputValue"
                            v-on="inputEvents"
                            name="from"
                            required
                        />
                    </template>
                </vc-date-picker>
            </div>
            <div class="form-group col-3">
                <label for="to">Al</label>
                <vc-date-picker locale="it"
                                v-model="to"
                                mode="date"
                                :attributes='attributes'
                                :masks="masks"
                                :min-date="from"
                                color="red"
                >
                    <template v-slot="{ inputValue, inputEvents }">
                        <input
                            id="to"
                            class="form-control"
                            :value="inputValue"
                            v-on="inputEvents"
                            name="to"
                            required
                        />
                    </template>
                </vc-date-picker>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-12 col-padding">
                <label for="subtitle">Descrizione</label>
                <textarea class="form-control" placeholder="Inserisci descrizione" id="subtitle" name="subtitle" rows="6" required/>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="form-group col-3 col-padding">
                <label for="active">Stato</label>
                <select class="custom-select" name="active" id="active">
                    <option value="1">Attiva</option>
                    <option value="0">Inattiva</option>
                </select>
            </div>
            <div class="form-group col-4 col-padding">
                <label for="p-mp">Prezzo <span class="text-custom">mezza pensione</span></label>
                <input type="text" class="form-control" placeholder="Inserisci il prezzo" id="p-mp" aria-describedby="priceMPHelp" name="price_mp" required>
                <small id="priceMPHelp" class="form-text text-muted">Formato: e.g. 44 senza segno per €</small>
            </div>
            <div class="form-group col-4 col-padding">
                <label for="p-pc">Prezzo <span class="text-custom">pensione completa</span></label>
                <input type="text" class="form-control" placeholder="Inserisci il prezzo" id="p-pc" aria-describedby="pricePCHelp" name="price_pc" required>
                <small id="pricePCHelp" class="form-text text-muted">Formato: e.g. 44 senza segno per €</small>
            </div>
        </div>
    </div>
</template>

<script>
import DatePicker from 'v-calendar/lib/components/date-picker.umd'

export default {
    name: "Add",
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
            from: '', to: '',
            masks: {
                input: 'DD.MM.YYYY'
            }
        }
    },
    components: {
        DatePicker
    }
}
</script>

<style scoped>
    .text-custom {
        font-weight: normal!important;
    }
</style>
