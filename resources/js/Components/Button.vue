<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-500 focus:outline-none focus:border-green-500 focus:shadow-outline-gray transition ease-in-out duration-150">
        <slot />
    </button>
</template>
