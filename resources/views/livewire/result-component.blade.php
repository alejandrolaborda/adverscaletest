<div class="min-h-screen flex flex-col items-center justify-center bg-gray-900">
    <div id="form-wrapper">
        
        @if (session('result-data'))

            <div class="alert alert-success text-white">
                @foreach (session('result-data') as $key => $value)
                    <p><span class="font-bold">{{ $key }}:</span> {{ $value }}</p>
                @endforeach      
            </div>   

        @else

            <p class="text-white">There is no result data</p>

        @endif

        <div class="flex justify-center mt-8">
            <button type="button" onclick="window.location.href='/'" class="bg-gray-500 hover:bg-gray-700 font-bold py-2 px-4 rounded">
                Back
            </button>
            </button>
        </div>
    </div>
</div>
