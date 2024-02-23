<style scoped>

</style>

<template>
    <div id="page-container"
         class="mx-auto flex min-h-dvh w-full min-w-[320px] flex-col bg-gray-100 dark:bg-gray-900 dark:text-gray-100">
        <Toast />
        <main id="page-content" class="flex max-w-full flex-auto flex-col">
            <div class="relative flex min-h-dvh items-center overflow-hidden bg-white dark:bg-gray-800">
                <div
                    class="absolute bottom-0 left-0 top-0 -ml-44 w-48 transform bg-blue-50 dark:bg-blue-500 dark:bg-opacity-10 md:-ml-28 md:skew-x-6"
                    aria-hidden="true"></div>
                <div
                    class="absolute bottom-0 right-0 top-0 -mr-44 w-48 transform bg-blue-50 dark:bg-blue-500 dark:bg-opacity-10 md:-mr-28 md:skew-x-6"
                    aria-hidden="true"></div>
                <div class="container relative mx-auto space-y-16 px-8 py-16 lg:py-32 xl:max-w-7xl">
                    <div class="space-y-4 dark:text-gray-100 lg:space-y-8">
                        <div
                            class="flex flex-col rounded-lg bg-gray-50 shadow-lg dark:bg-gray-800 dark:text-gray-100"
                        >
                            <div class="bg-gray-100 px-5 py-4 dark:bg-gray-700/50">
                                <h3 class="flex items-center space-x-2">
                                    <svg
                                        class="hi-mini hi-user-circle inline-block size-5 text-teal-500"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                        aria-hidden="true"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-5.5-2.5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zM10 12a5.99 5.99 0 00-4.793 2.39A6.483 6.483 0 0010 16.5a6.483 6.483 0 004.793-2.11A5.99 5.99 0 0010 12z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                    <span>Accounts</span>
                                </h3>
                            </div>

                            <div class="grow p-5 md:flex md:space-x-5">
                                <p
                                    class="mb-5 text-sm text-gray-500 dark:text-gray-400 md:w-1/3 md:flex-none"
                                >
                                    Accounts
                                </p>
                                <form class="space-y-6 md:w-1/2" @submit.prevent="submitAccounts">
                                    <div class="space-y-1">
                                        <label for="name" class="font-medium">Name</label>
                                        <InputText type="text" id="name" name="name"
                                                   placeholder="John Doe" v-model="formAccounts.name"
                                                   class="block w-full rounded-lg border border-gray-200 leading-6 placeholder-gray-500 focus:border-teal-500 focus:ring focus:ring-teal-500 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-800 dark:placeholder-gray-400 dark:focus:border-teal-500" />
                                        <div class="text-sm text-red-600 space-y-1">{{ formAccounts.errors.name }}</div>
                                    </div>
                                    <div class="space-y-1">
                                        <label for="website" class="font-medium">Website</label>
                                        <InputText type="text" id="website" name="website"
                                                   placeholder="http://john.doe" v-model="formAccounts.website"
                                                   class="block w-full rounded-lg border border-gray-200 leading-6 placeholder-gray-500 focus:border-teal-500 focus:ring focus:ring-teal-500 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-800 dark:placeholder-gray-400 dark:focus:border-teal-500" />
                                        <div class="text-sm text-red-600 space-y-1">{{ formAccounts.errors.website }}</div>
                                    </div>
                                    <div class="space-y-1">
                                        <label for="phone" class="font-medium">Phone</label>
                                        <InputMask type="text" id="phone" name="phone"
                                                   placeholder="555-555-5555" v-model="formAccounts.phone" mask="999-999-9999"
                                                   class="block w-full rounded-lg border border-gray-200 leading-6 placeholder-gray-500 focus:border-teal-500 focus:ring focus:ring-teal-500 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-800 dark:placeholder-gray-400 dark:focus:border-teal-500" />
                                        <div class="text-sm text-red-600 space-y-1">{{ formAccounts.errors.phone }}</div>
                                    </div>
                                    <button
                                        type="submit"
                                        :disabled="formAccounts.processing"
                                        class="inline-flex items-center justify-center space-x-2 rounded-lg border border-teal-700 bg-teal-700 px-3 py-2 text-sm font-semibold leading-5 text-white hover:border-teal-600 hover:bg-teal-600 hover:text-white focus:ring focus:ring-teal-400 focus:ring-opacity-50 active:border-teal-700 active:bg-teal-700 dark:focus:ring-teal-400 dark:focus:ring-opacity-90"
                                    >
                                        Create account
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div
                            class="flex flex-col rounded-lg bg-gray-50 shadow-lg dark:bg-gray-800 dark:text-gray-100"
                        >
                            <div class="bg-gray-100 px-5 py-4 dark:bg-gray-700/50">
                                <h3 class="flex items-center space-x-2">
                                    <svg
                                        class="hi-mini hi-user-circle inline-block size-5 text-teal-500"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                        aria-hidden="true"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-5.5-2.5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zM10 12a5.99 5.99 0 00-4.793 2.39A6.483 6.483 0 0010 16.5a6.483 6.483 0 004.793-2.11A5.99 5.99 0 0010 12z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                    <span>Deals</span>
                                </h3>
                            </div>

                            <div class="grow p-5 md:flex md:space-x-5">
                                <p
                                    class="mb-5 text-sm text-gray-500 dark:text-gray-400 md:w-1/3 md:flex-none"
                                >
                                    Deals
                                </p>
                                <form class="space-y-6 md:w-1/2" @submit.prevent="submitDeals">
                                    <div class="space-y-1">
                                        <label for="name" class="font-medium">Deal Name</label>
                                        <InputText type="text" id="name" name="name"
                                                   placeholder="Nice Deal" v-model="formDeals.name"
                                                   class="block w-full rounded-lg border border-gray-200 leading-6 placeholder-gray-500 focus:border-teal-500 focus:ring focus:ring-teal-500 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-800 dark:placeholder-gray-400 dark:focus:border-teal-500" />
                                        <div class="text-sm text-red-600 space-y-1">{{ formDeals.errors.name }}</div>
                                    </div>
                                    <div class="space-y-1">
                                        <label for="stage" class="font-medium">Stage</label>
                                        <Dropdown @click="getDeals" v-model="formDeals.stage" :options="deals" optionLabel="Stage" optionValue="Stage" class="w-full" show-clear placeholder="Select stage" />
                                        <div class="text-sm text-red-600 space-y-1">{{ formDeals.errors.stage }}</div>
                                    </div>
                                    <div class="space-y-1">
                                        <label for="stage" class="font-medium">Account Name</label>
                                        <Dropdown @click="getAccounts" v-model="formDeals.accountName" :options="accounts" optionLabel="Account_Name" optionValue="Account_Name" class="w-full" show-clear placeholder="Select account" />
                                        <div class="text-sm text-red-600 space-y-1">{{ formDeals.errors.accountName }}</div>
                                    </div>
                                    <div class="space-y-1">
                                        <label for="closingDate" class="font-medium">Closing Date</label>
                                        <Calendar v-model="formDeals.closingDate" :min-date="minDate" date-format="dd.mm.yy" showIcon iconDisplay="input" inputId="closingDate" class="w-full" show-button-bar placeholder="Closing Date" />
                                        <div class="text-sm text-red-600 space-y-1">{{ formDeals.errors.closingDate }}</div>
                                    </div>
                                    <button
                                        type="submit"
                                        :disabled="formDeals.processing"
                                        class="inline-flex items-center justify-center space-x-2 rounded-lg border border-teal-700 bg-teal-700 px-3 py-2 text-sm font-semibold leading-5 text-white hover:border-teal-600 hover:bg-teal-600 hover:text-white focus:ring focus:ring-teal-400 focus:ring-opacity-50 active:border-teal-700 active:bg-teal-700 dark:focus:ring-teal-400 dark:focus:ring-opacity-90"
                                    >
                                        Create deal
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script lang="ts">
import {defineComponent, ref} from 'vue';
import {useForm} from "@inertiajs/vue3";
import Dropdown from 'primevue/dropdown';
import InputText from "primevue/inputtext";
import InputMask from 'primevue/inputmask';
import Calendar from "primevue/calendar";
import Toast from 'primevue/toast';
import axios from "axios";

const formAccounts = useForm({
    name: null,
    website: null,
    phone: null
})

const formDeals = useForm({
    name: null,
    stage: null,
    accountName: null,
    closingDate: null
})

export default defineComponent({
    components: {
        Dropdown,
        InputText,
        InputMask,
        Calendar,
        Toast
    },
    props: {
        dealsData: {
            type: Array,
            default: () => []
        },
        accountsData: {
            type: Array,
            default: () => []
        }
    },
    data() {
        return {
            loadLazyTimeout: null,
            dropdownLoading: false,
            deals: this.dealsData,
            accounts: this.accountsData,
            minDate: null,
        }
    },
    created() {
        this.minDate = new Date();
    },
    methods: {
        submitAccounts() {
            formAccounts.post('/accounts', {
                preserveScroll: true,
                onSuccess: () => {
                    formAccounts.reset('name', 'website', 'phone')
                    this.$toast.add({ severity: 'success', summary: 'Accounts', detail: 'Account successfully created', life: 3000 });
                }
            })
        },
        submitDeals() {
            formDeals.post('/deals', {
                preserveScroll: true,
                onSuccess: () => {
                    formDeals.reset('name', 'stage', 'accountName', 'closingDate')
                    this.$toast.add({ severity: 'success', summary: 'Deals', detail: 'Deal successfully created', life: 3000 });
                }
            })
        },
        getDeals() {
            this.dropdownLoading = true;

            if (this.loadLazyTimeout) {
                clearTimeout(this.loadLazyTimeout);
            }

            this.loadLazyTimeout = setTimeout(() => {
                axios.post('/get-deals')
                    .then(res => {
                        console.log(res.data.data)
                        this.deals = res.data.data
                    })
                    .catch(function () {
                        this.$toast.add({ severity: 'error', summary: 'Stages error', detail: 'An error occurred while loading stages', life: 3000 });
                    })

                this.dropdownLoading = false
            }, Math.random() * 1000 + 250);
        },
        getAccounts() {
            this.dropdownLoading = true;

            if (this.loadLazyTimeout) {
                clearTimeout(this.loadLazyTimeout);
            }

            this.loadLazyTimeout = setTimeout(() => {
                axios.post('/get-accounts')
                    .then(res => {
                        console.log(res.data.data)
                        this.accounts = res.data.data
                    })
                    .catch(function () {
                        this.$toast.add({ severity: 'error', summary: 'Accounts error', detail: 'An error occurred while loading accounts', life: 3000 });
                    })

                this.dropdownLoading = false
            });
        }
    },
    setup() {
        return {
            formAccounts,
            formDeals
        };
    }
});
</script>

