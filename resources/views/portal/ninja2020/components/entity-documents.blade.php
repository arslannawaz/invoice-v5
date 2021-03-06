@if($entity->documents->count() > 0)
    <div class="bg-white shadow sm:rounded-lg my-4">
        <div class="px-4 py-5 sm:p-6">
            <div class="sm:flex sm:items-start sm:justify-between">
                <div>
                    <p class="text-lg leading-6 font-medium text-gray-900">{{ ctrans('texts.attachments') }}:</p>
                    @foreach($entity->documents as $document)
                        <div class="inline-flex items-center space-x-1">
                            <a href="{{ route('client.documents.show', $document->hashed_id) }}" target="_blank"
                               class="block text-sm button-link text-primary">{{ Illuminate\Support\Str::limit($document->name, 40) }}</a>

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="text-primary h-6 w-4">
                                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                                <polyline points="15 3 21 3 21 9"></polyline>
                                <line x1="10" y1="14" x2="21" y2="3"></line>
                            </svg>

                            @if(!$loop->last)
                                <span>&mdash;</span>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif
