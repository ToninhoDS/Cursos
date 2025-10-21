new Vue({
    el: '#desafio',
    data() {
        return {
            nome: 'Higor Moroni',
            idade: 28,
            urlImagem: 'https://fonts.gstatic.com/s/i/productlogos/lens_camera/v1/192px.svg',
            valor: '',
            valor2: 0,
            classeEscolhida: ''
        }
    },
    watch: {
        resultado() {
            setTimeout(() => {
                this.valor2 = 0;
            }, 5000)
        }
    },
    computed: {
        resultado() {
            return this.valor2 !== 37 ? "Valor diferente de 37" : "Valor igual a 37";
        }
    },
    methods: {
        exibirAlerta() {
            window.alert('Isso é um alerta');
        },
        armazenaValor(event) {
            this.valor = event.target.value
        }
    }
});