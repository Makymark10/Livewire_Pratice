<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <h1 class="text-3xl font-bold text-center mt-12 text-gray-800">Create a New Post</h1>
    <form action="{{ route('post.store') }}" method="POST" class="bg-white max-w-md mx-auto mt-10 p-8 rounded-lg shadow-md">
        @csrf
        <div class="mb-6">
            <label for="title" class="block mb-2 text-gray-700 font-medium">Title:</label>
            <input type="text" id="title" name="title" required
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>
        <div class="mb-6">
            <label for="content" class="block mb-2 text-gray-700 font-medium">Content:</label>
            <textarea id="content" name="content" required
                class="w-full px-3 py-2 border border-gray-300 rounded min-h-[80px] resize-y focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
        </div>
        <div class="mb-8">
            <label for="category" class="block mb-2 text-gray-700 font-medium">Category:</label>
            <select name="category" id="category"
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="">Select a category</option>
                <option value="news">News</option>
                <option value="updates">Updates</option>
                <option value="events">Events</option>
            </select>
        </div>
        <button type="submit"
            class="w-full bg-blue-600 text-white py-2 rounded font-semibold hover:bg-blue-700 transition-colors">
            Create Post
        </button>
    </form>
</body>
</html>
