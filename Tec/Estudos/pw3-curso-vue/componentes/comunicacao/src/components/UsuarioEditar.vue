<template>
    <div class="componente">
        <h2>Alterar os Dados de Usuário</h2>
        <p>Edite as informações</p>
        <p>Nome: {{ nome }}</p>
        <p>Idade: {{ idade }}</p>
        <button @click="alterarIdade">Alterar Idade</button>
    </div>
</template>

<script>
import barramento from '../barramento';

export default {
    props: {
        nome: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            idade: 18
        }
    },
    methods: {
        alterarIdade() {
            this.idade++
            barramento.alterarIdade(this.idade);
        }
    }
}
</script>

<style scoped>
    .componente {
        flex: 1;
        background-color: #98b99a;
        color: #fff;
    }
</style>
