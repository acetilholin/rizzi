<script>

import {Line} from 'vue-chartjs'

export default {
    props: ['info'],
    data() {
        return {
            graphData: null
        }
    },
    extends: Line,
    mounted() {
        this.graphData = this.info
    },
    methods: {
        newGraph() {
            this.renderChart({
                    labels: this.graphData.dates,
                    datasets: [
                        {
                            label: 'Visite al sito in un periodo di ' + this.graphData.days + ' giorni',
                            backgroundColor: '#ecf1f6',
                            data: this.graphData.visitors,
                            borderWidth: 1,
                            borderColor: '#800000'
                        }
                    ]
                },
                {
                    responsive: true,
                    maintainAspectRatio: false
                })
        }
    },
    watch: {
        info: {
            handler() {
                this.graphData = this.info
                this.newGraph()
            },
            deep: true
        }
    }
}
</script>

<style scoped>

</style>
