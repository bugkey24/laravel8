<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Notes | Legacy App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-slate-50 text-slate-800">

    <div class="max-w-2xl mx-auto py-12 px-4">
        <header class="mb-10 text-center">
            <h1 class="text-3xl font-semibold text-slate-900">Simple Notes</h1>
            <p class="text-slate-500 text-sm mt-2">Laravel 8 running on Docker (PHP 8.0)</p>
        </header>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 mb-8">
            <form action="{{ route('notes.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <input type="text" name="title" placeholder="Judul Catatan..." 
                        class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 transition shadow-sm">
                </div>
                <div class="mb-4">
                    <textarea name="content" rows="3" placeholder="Tulis sesuatu yang penting..." 
                        class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 transition shadow-sm"></textarea>
                </div>
                <button type="submit" class="w-full bg-slate-900 text-white font-medium py-2 rounded-lg hover:bg-slate-800 transition shadow-md">
                    Simpan Catatan
                </button>
            </form>
        </div>

<div class="space-y-4">
    @foreach($notes as $note)
    <div class="bg-white p-5 rounded-xl border border-slate-100 hover:shadow-md transition">
        <h3 class="font-semibold text-lg text-slate-900">{{ $note->title }}</h3>
        <p class="text-slate-600 mt-1 text-sm leading-relaxed">{{ $note->content }}</p>
        
        <div class="flex justify-end gap-3 mt-4 pt-3 border-t border-slate-50">
            <a href="{{ route('notes.edit', $note->id) }}" class="text-blue-500 hover:text-blue-700 text-xs font-bold uppercase tracking-wider">
                Edit
            </a>
            <form action="{{ route('notes.destroy', $note->id) }}" method="POST" onsubmit="return confirm('Hapus catatan ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 hover:text-red-700 text-xs font-bold uppercase tracking-wider">
                    Delete
                </button>
            </form>
        </div>
    </div>
    @endforeach
</div>
    </div>

</body>
</html>
