<template>
    <div
        class="max-w-lg mx-auto bg-white mt-8 p-8 rounded-lg shadow-md border-1 border-indigo-200"
    >
        <h1 class="text-2xl font-bold text-center mb-6 text-indigo-800">
            Preorder Form
        </h1>

        <form @submit.prevent="submitForm" class="space-y-6">
            <div class="mb-4">
                <label
                    for="name"
                    class="block text-sm font-medium text-gray-700"
                    >Name</label
                >
                <input
                    type="text"
                    id="name"
                    v-model="name"
                    class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm"
                    required
                    placeholder="Enter your full name"
                />
            </div>

            <div class="mb-4">
                <label
                    for="email"
                    class="block text-sm font-medium text-gray-700"
                    >Email</label
                >
                <input
                    type="email"
                    id="email"
                    v-model="email"
                    class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm"
                    required
                    placeholder="Enter your email"
                />
            </div>

            <div v-if="email.endsWith('@xyz.com')" class="mb-4">
                <label
                    for="phone"
                    class="block text-sm font-medium text-gray-700"
                    >Phone</label
                >
                <input
                    type="text"
                    id="phone"
                    v-model="phone"
                    class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm"
                    placeholder="Enter your phone number"
                />
            </div>

            <div class="mb-4">
                <label
                    for="product"
                    class="block text-sm font-medium text-gray-700"
                    >Select Product</label
                >
                <select
                    id="product"
                    v-model="product"
                    class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm"
                    required
                >
                    <option value="">Choose a product</option>
                    <option value="Rice">Rice</option>
                    <option value="Fish">Fish</option>
                    <option value="Vagetables">Vagetables</option>
                    <option value="Meat">Meat</option>
                </select>
            </div>

            <div class="mb-4">
                <button
                    type="submit"
                    class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 cursor-pointer"
                >
                    Submit
                </button>
            </div>
        </form>
    </div>

    <div
        v-if="showAlert"
        class="fixed top-2 right-1 bg-indigo-600 text-white p-4 rounded-lg shadow-lg transition-all duration-300 transform"
        :class="alertClass"
    >
        <div class="flex items-center space-x-2">
            <span class="text-sm">{{alertMessage}}</span>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            name: "",
            email: "",
            phone: "",
            product: "",
            showAlert: false,
            alertClass: "alert-success", // Default alert class
        };
    },
    methods: {
        submitForm() {
            console.log({
                name: this.name,
                email: this.email,
                phone: this.phone,
                product: this.product,
            });

            // Send a POST request to store the preorder
            axios.post('/preorder', {
                name: this.name,
                email: this.email,
                phone: this.phone,
                product: this.product,
            })
            .then(response => {
                // Handle success response
                this.showAlert = true;
                this.alertClass = "alert-success";
                this.alertMessage = "Preorder submitted successfully!!";
                setTimeout(() => {
                    this.showAlert = false;
                }, 3000);

                // Reset form
                this.name = '';
                this.email = '';
                this.phone = '';
                this.product = '';
            })
            .catch(error => {
                // Handle error response
                this.showAlert = true;
                this.alertClass = "alert-error";
                this.alertMessage = "An unexpected error occured! Please try again later."
                setTimeout(() => {
                    this.showAlert = false;
                }, 3000);
            });
        },
    },
};

</script>

<style scoped>
.alert-success {
    background-color: #38a169; /* Green */
}

.alert-error {
    background-color: #e53e3e; /* Red */
}
</style>

