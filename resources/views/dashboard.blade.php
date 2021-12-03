<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pangaea Notification System
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="w-full">
                        Topics
                    </div>

                </div>

                <div class="bg-white rounded-lg shadow-lg py-6">
                    <div class="block overflow-x-auto mx-6">
                        <table class="w-full text-left rounded-lg">
                            <thead>
                                <tr class="text-gray-800 border border-b-0">
                                    <th class="px-4 py-3">Name</th>
                                    <th class="px-4 py-3">Slug</th>
                                    <th class="px-4 py-3">Total Subscriptions</th>
                                    <th class="px-4 py-3">Created at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $topics as $topic )

                                <tr class="w-full font-light text-gray-700 bg-gray-100 whitespace-no-wrap border border-b-0">
                                    
                                    <td class="px-4 py-4">{{ $topic->name }}</td>
                                    <td class="px-4 py-4">{{ $topic->slug }}</td>
                                    <td class="px-4 py-4">{{ $topic->subscribers()->count() }}</td>
                                    <td class="px-4 py-4">
                                        <span class="text-sm bg-green-500 text-white rounded-full px-2 py-1"> {{ \Carbon\Carbon::parse($topic->created_at )->diffForHumans() }}</span>
                                    </td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="w-full">
                        Messages
                    </div>

                </div>

                <div class="bg-white rounded-lg shadow-lg py-6">
                    <div class="block overflow-x-auto mx-6">
                        <table class="w-full text-left rounded-lg">
                            <thead>
                                <tr class="text-gray-800 border border-b-0">
                                    <th class="px-4 py-3">Content</th>

                                    <th class="px-4 py-3">Topic</th>
                                    <th class="px-4 py-3">Created at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $messages as $message )

                                <tr class="w-full font-light text-gray-700 bg-gray-100 whitespace-no-wrap border border-b-0">
                                    
                                    <td class="px-4 py-4">{{ $message->content }}</td>
                                    <td class="px-4 py-4">{{ $message->topic->name }}</td>
                                    <td class="px-4 py-4">
                                        <span class="text-sm bg-green-500 text-white rounded-full px-2 py-1"> {{ \Carbon\Carbon::parse($message->created_at )->diffForHumans() }}</span>
                                    </td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="p-6 bg-white border-b border-gray-200">

                <div class="w-full">
                    Subscribers
                </div>

                </div>

                <div class="bg-white rounded-lg shadow-lg py-6">
                <div class="block overflow-x-auto mx-6">
                    <table class="w-full text-left rounded-lg">
                        <thead>
                            <tr class="text-gray-800 border border-b-0">
                                <th class="px-4 py-3">URL</th>

                                <th class="px-4 py-3">Subscriber Subscriptions</th>
                                <th class="px-4 py-3">Created at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $subscribers as $subscriber )

                            <tr class="w-full font-light text-gray-700 bg-gray-100 whitespace-no-wrap border border-b-0">
                                
                                <td class="px-4 py-4">{{ $subscriber->url }}</td>
                                <td class="px-4 py-4">{{ $subscriber->subscriptions()->count() }}</td>

                                <td class="px-4 py-4">
                                    <span class="text-sm bg-green-500 text-white rounded-full px-2 py-1"> {{ \Carbon\Carbon::parse($subscriber->created_at )->diffForHumans() }}</span>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>