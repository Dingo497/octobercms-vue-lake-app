<template>
    <div
        class="leading-normal tracking-normal text-indigo-400 bg-cover bg-fixed"
        :style="{ backgroundImage: `url(${require('@/assets/imgs/header.png')})` }"
    >
        <NavigationComponent />
        <div
            class="container pt-24 md:pt-36 mx-auto flex flex-wrap flex-col md:flex-row items-center"
        >
            <router-view />
        </div>
        <FooterComponent />
    </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import NavigationComponent from "@/components/NavigationComponent.vue";
import FooterComponent from "@/components/FooterComponent.vue";

export default defineComponent({
    name: "App",
    components: {
        NavigationComponent,
        FooterComponent,
    },
});
</script>
