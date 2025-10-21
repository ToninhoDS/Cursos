<template>
    <div class="componente">
        <h2>As Informações de Usuário</h2>
        <p>Vários detalhes...</p>
        <p>Nome: {{ nomeInvertido }}</p>
        <p>Idade: {{ idade }}</p>
        <button @click="trocarNome">Trocar Nome</button>
        <button @click="trocarNomeCB">Trocar Nome Com Callback</button>
    </div>
</template>

<script>
import barramento from '../barramento';

export default {
    // props: ['nome']
    props: {
        //nome: String
        nome: {
            type: String,
            // type: String|Number|Object|Function,
            // required: true,
            default: 'Antonio',
            // default: function () {
            //     return 'Bruno'
            // }
        },
        trocarNomeCB: {
            type: Function,
            required: true
        }
    },
    data() {
        return {
            idade: 0
        }
    },
    created() {
        barramento.quandoIdadeMudar(idade => this.idade = idade);
    },
    computed: {
        nomeInvertido() {
            return this.nome.split('').reverse().join('');
        }
    },
    methods: {
        trocarNome() {
            this.$emit('nomeMudou', 'Renata');
        }
    }
}
</script>

<style scoped>
    .componente {
        flex: 1;
        background-color: #ec485f;
        color: #fff;
    }
</style>
