<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import {Link} from "@inertiajs/vue3";

export default {
    name: "Create",
    components: {Link},
    props: {
        categories: Array
    },
    data() {
        return {
            entries: {
                post: {
                    category_id: null
                },
                tags: ''
            }
        }
    },

    methods: {
        storePost() {
            axios.post(route('admin.posts.store'), this.entries, {
                headers: {
                    "Content-Type": "multipart/form-data"
                }
            })
                .then(res => {
                    this.entries = {
                        post: {
                            category_id: null
                        },
                        tags: ''
                    }
                    this.$refs.input_image.value = null
                })
                .catch(error => {

                })
        },
        addImage(e) {
            this.entries.image = e.target.files[0]
        }
    },

    layout: AdminLayout
}
</script>

<template>
    <div class="mb-4">
        <Link :href="route('admin.posts.index')"
              class="inline-block px-3 py-2 bg-indigo-500 text-white border border-indigo-600">Назад
        </Link>
    </div>
    <div>
        <div>
            <div class="mb-4">
                <input v-model="entries.post.title" type="text" class="border border-gray-200 w-1/3"
                       placeholder="title">
            </div>
            <div class="mb-4">
                <textarea v-model="entries.post.content" type="text" class="border border-gray-200 w-1/3"
                          placeholder="Content"></textarea>
            </div>
            <div class="mb-4">
                <input v-model="entries.post.published_at" type="date" class="border border-gray-200 w-1/3"
                       placeholder="title">
            </div>
            <div class="mb-4">
                <select v-model="entries.post.category_id" class="border border-gray-200 w-1/3">
                    <option disabled selected :value="null">Выберите категорию</option>
                    <option v-for="category in categories" :value="category.id">{{ category.title }}</option>
                </select>
            </div>
            <div class="mb-4">
                <input v-model="entries.tags" type="text" class="border border-gray-200 w-1/3" placeholder="tags">
            </div>
            <div class="mb-4">
                <input ref="input_image" @change="addImage" type="file" class="border border-gray-200 w-1/3"
                       placeholder="file">
            </div>
            <div class="mb-4">
                <a @click.prevent="storePost" href="#"
                   class="inline-block px-3 py-2 bg-emerald-400 text-white border border-emerald-500">Создать
                </a>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
