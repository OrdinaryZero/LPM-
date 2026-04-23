<div class="flex flex-col items-center">
    <div class="relative flex flex-col items-center p-4">
        <div class="w-24 h-24 md:w-28 md:h-28 rounded-full border-4 border-white shadow-lg overflow-hidden mb-3 bg-gray-100 z-10">
            <img src="{{ asset('uploads/struktur/' . $node->foto_nomer) }}" alt="{{ $node->nama }}" class="w-full h-full object-cover">
        </div>
        <div class="text-center bg-white shadow-sm border border-gray-100 rounded-2xl px-6 py-3 -mt-8 pt-8 min-w-[180px] z-0">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">{{ $node->jabatan }}</p>
            <h4 class="font-extrabold text-gray-800 text-sm md:text-base">{{ $node->nama ?? 'N/A' }}</h4>
        </div>
        
        @if($node->bawahan->count() > 0)
            <div class="w-0.5 h-8 bg-gray-300 mt-2"></div>
        @endif
    </div>

    @if($node->bawahan->count() > 0)
        <div class="flex flex-row justify-center border-t-2 border-gray-300 relative mt-[-2px] pt-4 gap-8">
            @foreach($node->bawahan as $bawahan)
                <div class="relative flex flex-col items-center">
                    <div class="absolute -top-4 w-0.5 h-4 bg-gray-300"></div>
                    @include('components.tree-node', ['node' => $bawahan])
                </div>
            @endforeach
        </div>
    @endif
</div>