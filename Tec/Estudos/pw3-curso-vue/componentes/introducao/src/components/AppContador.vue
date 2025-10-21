<template>
    <div class="contador">
        <span>{{ contador }}</span>
        <button @click="contador++">+</button>
        <button @click="contador--">-</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            contador: 0
        }
    }
}
</script>

<style scoped>
    span {
        border-bottom: 1px solid #CCC;
        height: 30px;
        padding: 5px 25px;
    }

    button {
        height: 30px;
        width: 30px;
        border-radius: 50%;
        background-color: coral;
        color: white;
        outline: none;
    }
</style>