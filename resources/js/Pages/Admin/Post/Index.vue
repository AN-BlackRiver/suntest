<script>
import {Link} from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";
export default {
    name: "posts",
    props: {
        posts : Array
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
       <Link :href="route('admin.posts.create')"
             class="inline-block px-3 py-2 bg-indigo-500 text-white border border-indigo-600">Добавить
       </Link>
   </div>
    <div>
       <div v-for="post in posts" class="mb-4 pb-4 border-b border-gray-200">
          <Link :href="route('admin.posts.show', post.id)"> {{ post.title }} </Link>
       </div>
   </div>
</div>
</template>

<style scoped>

</style>
