<template>
  <div>
    hello from lakespage
  </div>
</template>

<script lang="ts">
import { defineComponent, onMounted } from 'vue';
import axios from 'axios';
// import HelloWorld from '@/components/HelloWorld.vue';

export default defineComponent({
    name: 'LakesPage',
    components: {
        // HelloWorld,
    },

    setup() {
        onMounted(() => {
            axios.get('http://localhost:8000/api/lakemanagement/lakes')
                .then(response => console.log('Success fetching lakes data:', response.data))
                .catch(error => console.error('Error fetching lakes data:', error))
        })

        return {
            
        };
    }
});
</script>
