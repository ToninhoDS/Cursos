<template>
    <div>
        <AppContador v-for="c in 10" :key="c" />
        <button>???</button>
    </div>
</template>

<script>
import AppContador from '@/components/AppContador'

export default {
    components: {
        AppContador
    }
}
</script>