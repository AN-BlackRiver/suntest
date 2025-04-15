<script>
import {Link} from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";

export default {
    name: "Show",
    props: {
        post: Object
    },
    components: {
        Link,
    },
    layout: AdminLayout
}
</script>

<template>
    <div>
        <Link :href="route('admin.posts.index')"
              class="inline-block px-3 py-2 bg-indigo-500 text-white border border-indigo-600">Назад
        </Link>
    </div>
    <div>
        <div>
            <div class="mb-4 pb-4 border-b border-gray-200">
                <div>

                    <h1 class="text-3xl font-bold mt-5 mb-4 border-b border-gray-200 pb-4">{{ post.title }}</h1>
                </div>
                <div>
                    <p class="border-b border-gray-200 pb-4 mb-4">{{ post.content }}</p>
                </div>
                <p><span class="font-bold">Категория</span> : {{ post.category.title }}</p>
                <div class="mt-4">
                    <img class="w-[600px] h-[350px]" :src=post.image_url :alt=post.title>
                </div>
                <div class="mt-4"><a v-for="tag in post.tags" class="text-gray-500 mr-2">#{{tag.title}}</a></div>
            </div>
        </div>
    </div>

</template>

<style scoped>

</style>
