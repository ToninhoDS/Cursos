new Vue({
    el: '#app',
    data() {
        return {
            nome: 'Joaquim',
            logado: false,
            anonimo: false,
            cores: ['Vermelho', 'Verde', 'Amarelo', 'Azul', 'Preto'],
            pessoas: [
                {
                    nome: 'Ana',
                    idade: 26,
                    peso: 59
                },
                {
                    nome: 'Guilherme',
                    idade: 22,
                    peso: 89
                },
            ]
        }
    }
});