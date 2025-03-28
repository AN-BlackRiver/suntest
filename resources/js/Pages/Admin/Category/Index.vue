<script>
import {Link} from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";

export default {
    name: "categories",
    props: {
        categories: Array
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
            <Link :href="route('admin.categories.create')"
                  class="inline-block px-3 py-2 bg-indigo-500 text-white border border-indigo-600">Добавить
            </Link>
        </div>
        <div v-for="category in categories" class="border-b border-gray-200">
            <Link :href="route('admin.categories.show', category.id)" class="block p-4"> {{ category.title }}</Link>
        </div>
    </div>
</template>

<style scoped>

</style>
