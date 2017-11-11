<template>
    <div class="col-sm-6">
        <a href="#" class="parent">
            <div class="child">
                {{ text }}
            </div>
        </a>
    </div>
</template>

<script>
    export default {
        props: ['text'],
    }
</script>
