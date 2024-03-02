<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{route('events.store')}}" x-data="{
                    country: null,
                    city: null,
                    cities: null,
                    onCountryChange(event) {
                        axios.get(`/countries/${event.target.value}`).then(res => {
                            this.cities = res.data
                        });
                    }
                }" enctype="multipart/form-data" class="p-4 bg-white dark:bg-slate-800 rounded-md">
                    @csrf
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">タイトル</label>
                            <input type="text" id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-r-lg focus:ring-blue-500" placeholder="新規イベント名">
                            @error('title')
                            <div class="text-sm text-red-400">{{$message}}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="country_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">オプションを選んでください</label>
                            <select id="country_id" x-model="country" x-on:change="onCountryChange" name="country_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-r-lg focus:ring-blue-500">
                                <option>開催国を選んでください</option>
                                @foreach($counties as $country)
                                <option :value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select>
                            @error('country_id')
                            <div class="text-sm text-red-400">{{$message}}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="city_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">オプションを選んでください</label>
                            <select id="city_id" name="city_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-r-lg focus:ring-blue-500">
                                <template x-for="city i cities" :key="city.id">
                                    <option x-bind:value="city.id" x-text="city.name"></option>
                                </template>
                            </select>
                            @error('city_id')
                            <div class="text-sm text-red-400">{{$message}}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">住所</label>
                            <input type="text" id="address" name="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-r-lg focus:ring-blue-500" placeholder="新規イベント名">
                            @error('address')
                            <div class="text-sm text-red-400">{{$message}}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="file_input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">画像をアップロード</label>
                            <input type="file" id="file_input" name="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-r-lg focus:ring-blue-500" placeholder="新規イベント名">
                            @error('image')
                            <div class="text-sm text-red-400">{{$message}}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">開催日</label>
                            <input type="date" id="start_date" name="start_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-r-lg focus:ring-blue-500" placeholder="新規イベント名">
                            @error('start_date')
                            <div class="text-sm text-red-400">{{$message}}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">終了日</label>
                            <input type="date" id="end_date" name="end_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-r-lg focus:ring-blue-500" placeholder="新規イベント名">
                            @error('end_date')
                            <div class="text-sm text-red-400">{{$message}}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="start_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">開催時間</label>
                            <input type="date" id="start_time" name="start_time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-r-lg focus:ring-blue-500" placeholder="新規イベント名">
                            @error('time')
                            <div class="text-sm text-red-400">{{$message}}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="num_tickets" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">購入枚数</label>
                            <input type="date" id="num_tickets" name="num_tickets" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-r-lg focus:ring-blue-500">
                            @error('num_tickets')
                            <div class="text-sm text-red-400">{{$message}}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">説明</label>
                            <textarea type="date" id="description" name="description" class="block p-2.5 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-r-lg focus:ring-blue-500" placeholder="イベントの詳細"></textarea>
                            @error('description')
                            <div class="text-sm text-red-400">{{$message}}</div>
                            @enderror
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>