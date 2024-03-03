<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                イベント一覧
            </h2>
            <div>
                <a href="{{route('events.create')}}" class="dark:text-white hover:text-slate-200">新規イベント作成</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-auto">
                <table class="w-full text-sm text-left text-gray-500dark:text-gray-400">
                    <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                イベント名
                            </th>
                            <th scope="col" class="px-6 py-3">
                                開催日
                            </th>
                            <th scope="col" class="px-6 py-3">
                                開催国
                            </th>
                            <th scope="col" class="px-6 py-3">
                                アクション
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($events as $event)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium to-gray-900 whitespace-nowrap dark:text-white">
                                {{$event->title}}
                            </th>
                            <td class="px-6 py-4">
                                {{$event->start_date}}
                            </td>
                            <td class="px-6 py-4">
                                {{$event->country->name}}
                            </td>
                            <td class="px-6 py-4">
                                編集　削除
                            </td>
                        </tr>
                        @empty
                        <h1>現在イベントはありません</h1>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>