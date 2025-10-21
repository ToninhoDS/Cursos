<template>
    <div class="container">
        <h1>Componente Usuário</h1>
        <p>Esse é um componente muito legal!</p>
        <p>Nome: {{nome}}</p>
        <hr>
        <div class="componentes">
            <app-usuario-info
                :nome="nome"
                :trocarNomeCB="trocarNome"
                @nomeMudou="nome = $event + 'BB'"
            />
            <app-usuario-editar
                :nome="nome"
            />
        </div>
    </div>
</template>

<script>
import AppUsuarioInfo from './UsuarioInfo'
import AppUsuarioEditar from './UsuarioEditar'

export default {
    components: { AppUsuarioInfo, AppUsuarioEditar },
    data() {
        return {
            nome: 'Kleber'
        }
    },
    methods: {
        trocarNome() {
            this.nome = 'Joana';
        }
    }
}
</script>

<style scoped>
    .container {
        background-color: #27363b;
        color: #fff;
        padding: 10px;
    }

    .container hr {
        margin: 20px 10px;
    }

    .componentes {
        display: flex;
    }

    .componentes > * {
        margin: 10px;
    }
</style>
