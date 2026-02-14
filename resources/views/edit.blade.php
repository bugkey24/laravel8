<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Note | Simple Notes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 p-10 font-sans">
    <div class="max-w-lg mx-auto bg-white p-8 rounded-2xl shadow-sm border border-slate-100">
        <h2 class="text-2xl font-bold mb-6">Edit Catatan</h2>
        
        <form action="{{ route('notes.update', $note->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="title" value="{{ $note->title }}" class="w-full px-4 py-2 rounded-lg border border-slate-200 mb-4 focus:ring-2 focus:ring-blue-500 outline-none">
            <textarea name="content" rows="4" class="w-full px-4 py-2 rounded-lg border border-slate-200 mb-4 focus:ring-2 focus:ring-blue-500 outline-none">{{ $note->content }}</textarea>
            
            <div class="flex gap-2">
                <button type="submit" class="flex-1 bg-slate-900 text-white py-2 rounded-lg font-medium hover:bg-slate-800 transition">Update</button>
                <a href="{{ route('notes.index') }}" class="flex-1 bg-slate-100 text-slate-600 py-2 rounded-lg font-medium text-center hover:bg-slate-200 transition">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>