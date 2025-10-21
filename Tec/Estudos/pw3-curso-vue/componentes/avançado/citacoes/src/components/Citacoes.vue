<template>
    <div class="citacoes">
        <span>
            <button @click="numero--">&lt;</button>
            <button @click="numero++">&gt;</button>
        </span>
        <!-- <div>{{citacoes[indice].texto}}</div> -->
        <!-- <Citacao>
        </Citacao>
        <Citacao>
            <h2>Texto Sobrescrever</h2>
        </Citacao> -->
        <Citacao>
            <h6 slot="fonte">{{ citacoes[indice].fonte }}</h6>
            <p>{{ citacoes[indice].texto }}</p>
            <h1 slot="autor">{{ citacoes[indice].autor }}</h1>
        </Citacao>
    </div>
</template>

<script>
import Citacao from './Citacao';

export default {
    components: {
        Citacao
    },
    data() {
        return {
            numero: 0,
            citacoes: [{
                fonte: 'Jornal do Empreendedor',
                texto: 'Lembre-se sempre que você é absolutamente único. Assim como todos os outros.',
                autor: 'Margaret Mead'
            }, { 
                fonte: 'Frases de Mãe',
                texto: 'Isso não é um quarto, é um chiqueiro.',
                autor: 'Roberta'
            }, {
                fonte: 'Frases de Pai',
                texto: 'Vou contar até 3! 1, 2, 2...',
                autor: 'Gustavo'
            }, {
                fonte: 'Pensador',
                texto: 'A loucura dos grandes deve ser vigiada.',
                autor: 'Hamlet'
            }]
        }
    },
    computed: {
        indice() {
            return Math.abs(this.numero % this.citacoes.length)
        }
    }
}
</script>

<style scoped>
    .citacoes {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
</style>
