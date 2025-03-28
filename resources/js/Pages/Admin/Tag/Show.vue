<script>
import {Link} from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";

export default {
    name: "Show",
    props: {
        tag: Object
    },
    components: {
        Link,
    },
    layout: AdminLayout
}
</script>

<template>
    <div>
        <Link :href="route('admin.tags.index')"
              class="inline-block px-3 py-2 bg-indigo-500 text-white border border-indigo-600">Назад
        </Link>
    </div>
    <div>
        <div>
            <div class="mb-4 pb-4 border-b border-gray-200">
                <h1 class="text-3xl font-bold mt-5 mb-4 border-b border-gray-200 pb-4">{{ tag.title }}</h1>
            </div>
        </div>
    </div>

</template>

<style scoped>

</style>
