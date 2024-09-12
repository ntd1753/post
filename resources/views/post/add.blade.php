<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>

</style>
<body>
<form action="{{route('post.store')}}" method="POST" class="space-y-6 bg-white p-6 rounded-lg shadow-md">
    @csrf
    <div>
        <label for="name" class="block text-lg font-medium text-gray-700">Post Name</label>
        <input type="text" name="name" id="name" placeholder="Post Name" class="mt-1 block w-full rounded-md border-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg p-4 h-12">
    </div>

    <div>
        <label for="content" class="block text-lg font-medium text-gray-700">Post Content</label>
        <textarea name="content" id="content" placeholder="Post Content" class="mt-1 block w-full rounded-md border-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg p-4"></textarea>
    </div>

    <h3 class="text-lg font-medium text-gray-900">Translations</h3>

    <!-- Translation Fields -->
    <div id="translations-container">
        <div class="translation space-y-4" id="translation_0">
            <div>
                <label for="translations_0_locale_id" class="block text-lg font-medium text-gray-700">Locale</label>
                <select name="translations[0][locale_id]" id="translations_0_locale_id" class="mt-1 block w-full rounded-md border-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg p-2 h-12">
                    @foreach ($locates as $locate)
                        <option value="{{ $locate->id }}">{{ $locate->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="translations_0_name" class="block text-lg font-medium text-gray-700">Translation Name</label>
                <input type="text" name="translations[0][name]" id="translations_0_name" placeholder="Translation Name" class="mt-1 block w-full rounded-md border-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg p-4 h-12">
            </div>

            <div>
                <label for="translations_0_content" class="block text-lg font-medium text-gray-700">Translation Content</label>
                <textarea name="translations[0][content]" id="translations_0_content" placeholder="Translation Content" class="mt-1 block w-full rounded-md border-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg p-4"></textarea>
            </div>
        </div>
    </div>

    <!-- Button to Add More Translations -->
    <button type="button" id="add-translation-btn" class="mt-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
        Add Translation
    </button>

    <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Submit Post
    </button>
</form>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let translationIndex = 1;  // Bắt đầu từ 1 vì bản dịch đầu tiên đã tồn tại

        document.getElementById('add-translation-btn').addEventListener('click', function () {
            // Tạo div chứa bản dịch mới
            const container = document.getElementById('translations-container');
            const newTranslation = document.createElement('div');
            newTranslation.classList.add('translation', 'space-y-4');
            newTranslation.id = `translation_${translationIndex}`;

            newTranslation.innerHTML = `
                <div>
                    <label for="translations_${translationIndex}_locale_id" class="block text-lg font-medium text-gray-700">Locale</label>
                    <select name="translations[${translationIndex}][locale_id]" id="translations_${translationIndex}_locale_id" class="mt-1 block w-full rounded-md border-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg p-2 h-12">
                        @foreach ($locates as $locate)
            <option value="{{ $locate->id }}">{{ $locate->name }}</option>
                        @endforeach
            </select>
        </div>

        <div>
            <label for="translations_${translationIndex}_name" class="block text-lg font-medium text-gray-700">Translation Name</label>
                    <input type="text" name="translations[${translationIndex}][name]" id="translations_${translationIndex}_name" placeholder="Translation Name" class="mt-1 block w-full rounded-md border-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg p-4 h-12">
                </div>

                <div>
                    <label for="translations_${translationIndex}_content" class="block text-lg font-medium text-gray-700">Translation Content</label>
                    <textarea name="translations[${translationIndex}][content]" id="translations_${translationIndex}_content" placeholder="Translation Content" class="mt-1 block w-full rounded-md border-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg p-4"></textarea>
                </div>
            `;

            container.appendChild(newTranslation);
            translationIndex++;
        });
    });
</script>

</body>
</html>
