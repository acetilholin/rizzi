<template>
    <div>
        <div class="row justify-content-center">
            <div class="form-group col-3">
                <label for="from">Dal</label>
                <vc-date-picker locale="it"
                                v-model="from"
                                :attributes='attributes'
                                mode="date"
                                :masks="masks"
                                color="red"
                                :max-date="to"
                                @input="dateChanged"
                >
                    <template v-slot="{ inputValue, inputEvents }">
                        <input
                            id="from"
                            class="form-control"
                            :value="inputValue"
                            v-on="inputEvents"
                            name="from"
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
                                @input="dateChanged"
                >
                    <template v-slot="{ inputValue, inputEvents }">
                        <input
                            id="to"
                            class="form-control"
                            :value="inputValue"
                            v-on="inputEvents"
                            name="to"
                        />
                    </template>
                </vc-date-picker>
            </div>
        </div>
        <div class="text-center mt-4">
            <span class="text-custom">Tutte le visite</span> : {{ totalVisitors }}<br>
            <span class="text-muted"> In media: {{ avg }} / giorno</span>
        </div>
        <div class="spinner-border custom-color spinner" v-if="spinner" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="small mt-5 w-100">
              <visits :info="graphData"></visits>
        </div>
    </div>
</template>

<script>

import Visits from "./Visits";

export default {
    name: "Chart",
    components: {Visits},
    data() {
        return {
            labels: null, data: null, days: null, avg:0,
            totalVisitors: 0,
            graphData: null,
            spinner: true,
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
    created() {
        this.fetch30Days()
    },
    methods: {
        fetch(from, to) {
            axios.post('/interval', {
                datefrom: from,
                dateto: to
            })
                .then((response) => {
                    this.spinner = false
                    this.graphData = response.data
                    this.totalVisitors = response.data.totalVisitors
                    this.avg = response.data.avg
                })
        },
        fetch30Days() {
            let now = new Date()
            let to =  new Date()
            let from = new Date(now.setDate(now.getDate() - 30))
            this.fetch(from, to)
        },
        dateChanged() {
            if (this.from && this.to) {
                this.fetch(this.from, this.to)
            }
        }
    }
}
</script>

<style scoped>
.small {
    max-height: 250px;
    max-width: 95%;
}
.spinner {
    display: block;
    position: fixed;
    right: 49%;
    top: 50%
}
.custom-color {
    color:#800000!important;
}
</style>
