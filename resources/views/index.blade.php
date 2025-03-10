<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preorder List</title>
    @vite('resources/css/app.css')
    @vite('resources/js/vendor/preorderform/app.js')
</head>

<body>
    <div class="max-w-7xl mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold mb-6">Pre-orders List</h1>

        <!-- Search Form -->
        <div class="mb-4">
            <form action="{{ url('preorders') }}" method="GET" class="flex space-x-2">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Search by name, email, or product"
                    class="form-input w-1/3 px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none cursor-pointer">
                    Search
                </button>
            </form>
        </div>

        <!-- Table displaying Pre-orders -->
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-indigo-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Product</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Phone</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($preorders as $preorder)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $preorder->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $preorder->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $preorder->product }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $preorder->phone ?? 'N/A' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <form action="{{ route('preorders.destroy', $preorder->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this pre-order?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="cursor-pointer text-red-600 hover:text-red-900">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</body>

</html>