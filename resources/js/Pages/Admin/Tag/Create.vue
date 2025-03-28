<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import {Link} from "@inertiajs/vue3";

export default {
    name: "Create",
    components: {Link},

    data() {
        return {
            tag: {

            }
        }
    },

    methods: {
        storeTag() {
            axios.post('http://suntest.test/admin/tags/', this.tag)
                .then(res => {
                    console.log(res);
                })
                .catch(error => {

                })
        }
    },

    layout: AdminLayout
}
</script>

<template>
    <div class="mb-4">
        <Link :href="route('admin.tags.index')"
              class="inline-block px-3 py-2 bg-indigo-500 text-white border border-indigo-600">Назад
        </Link>
    </div>
    <div>
        <div>
            <div class="mb-4">
                <input v-model="tag.title" type="text" class="border border-gray-200 w-1/3" placeholder="title">
            </div>
            <div class="mb-4">
                <a @click.prevent="storeTag" href="#"
                   class="inline-block px-3 py-2 bg-emerald-400 text-white border border-emerald-500">Создать
                </a>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
