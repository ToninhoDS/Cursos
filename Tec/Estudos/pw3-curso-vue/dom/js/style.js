new Vue({
    el: '#app',
    data() {
        return {
            aplicarC1: false,
            aplicarC2: false,
            classeCSS: '',
            corEscolhida: '',
        }
    },
    computed: {
        estilo1() {
            return {
                c1: this.aplicarC1,
                'cor-2': !this.aplicarC1
            }
        }
    }
});