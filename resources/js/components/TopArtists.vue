<template>
    <div class="row">
        <h2 class="text-white">Your top 10 artists</h2>

        <div
            class="col-4 artistcard mb-3 p-0"
            v-for="artist in artists"
            :key="artist.item"
        >
            <img src="" />
            
        </div>
    </div>
</template>

<script>
export default {
    
};
</script>
