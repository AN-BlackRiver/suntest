<script>
import {Link} from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";

export default {
    name: "tags",
    props: {
        tags: Array
    },
    components: {
        Link,
    },
    layout: AdminLayout
}
</script>

<template>
    <div>
        <div class="mb-4">
            <Link :href="route('admin.tags.create')"
                  class="inline-block px-3 py-2 bg-indigo-500 text-white border border-indigo-600">Добавить
            </Link>
        </div>
        <div v-for="tag in tags" class="border-b border-gray-200">
            <Link :href="route('admin.tags.show', tag.id)" class="block p-4"> {{ tag.title }}</Link>
        </div>
    </div>
</template>

<style scoped>

</style>
