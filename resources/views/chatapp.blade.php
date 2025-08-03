<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ChatApp</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="w-full bg-gray-100 min-h-screen flex items-center justify-center flex-col">
    <div class="w-full max-w-4xl bg-white border rounded shadow-md p-4">
        <h1 class="text-2xl font-bold text-center mb-4">Chat Application</h1>
        <p class="text-gray-600 text-center mb-3">Chat with our AI assistant!</p>
    </div>
    <div class="w-full max-w-4xl bg-white border rounded shadow-md flex flex-col h-[80vh]">
        {{-- Chat messages placeholder --}}
        <div class="flex-1 p-3 overflow-y-auto">
            <div class="flex-1 p-4 overflow-y-auto space-y-4">
                @if(session('chat_history'))
                    @foreach ($chatHistory as $msg)
                        <div class="{{ $msg['role'] === 'user' ? 'text-right' : 'text-left' }}">
                            <div class="inline-block px-4 py-2 rounded-lg 
                                {{ $msg['role'] === 'user' ? 'bg-green-200 text-black' : 'bg-gray-200 text-gray-800' }}">
                                {{ $msg['content'] }}
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-gray-400 text-center mt-10">Start chatting below...</p>
                @endif
            </div>
        </div>

        {{-- Chat input form --}}
        <form method="POST" action="{{ url('/chatapp') }}" class="border-t p-4 bg-gray-50 flex items-center gap-2">
            @csrf
            <textarea name="message" rows="1" placeholder="Type a message..."
                class="flex-1 resize-none px-4 py-2 border rounded-full focus:outline-none focus:ring-2 focus:ring-green-500">{{ old('message') }}</textarea>

            <button type="submit"
                class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-full font-semibold">
                Send
            </button>
        </form>
    </div>

</body>
</html>
