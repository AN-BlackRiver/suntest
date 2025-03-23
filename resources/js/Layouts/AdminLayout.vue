<script>
import {Link} from "@inertiajs/vue3";
export default {
    name: "AdminLayout",

    components: {
        Link
    }
}
</script>

<template>
    <section class="w-full">
        <header class="p-4 mx-auto">
            HEADER
        </header>
    </section>
    <section class="w-full">
        <section class="mx-auto flex">
            <aside class="w-1/4 bg-gray-600 min-h-screen">
                <div>
                <Link :href="route('admin.posts.index')" class="block p-4 border-b border-gray-200 text-gray-300">Посты</Link>
                </div>
            </aside>
            <article class="p-4 w-3/4 bg-gray-100">
                <slot/>
            </article>
        </section>
    </section>
</template>

<style scoped>

</style>
