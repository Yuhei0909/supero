<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Edit Information') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800 ">
          @include('common.errors')
          <form class="mb-6" action="{{ route('information.update',$information->id) }}" method="POST">
            @method('put')
            @csrf
            <div class="flex flex-col mb-4">
              <x-input-label for="icon" :value="__('Icon')" />
              <x-text-input id="icon" class="block mt-1 w-full" type="text" name="icon" value="{{$information->icon}}" required autofocus />
              <x-input-error :messages="$errors->get('icon')" class="mt-2" />
            </div>
            <div class="flex flex-col mb-4">
              <x-input-label for="nickname" :value="__('Nickname')" />
              <x-text-input id="nickname" class="block mt-1 w-full" type="text" name="nickname" value="{{$information->nickname}}" autofocus />
              <x-input-error :messages="$errors->get('nickname')" class="mt-2" />
            </div>
            <div class="flex flex-col mb-4">
              <x-input-label for="gender" :value="__('Gender')" />
              <x-text-input id="gender" class="block mt-1 w-full" type="text" name="gender" value="{{$information->gender}}" required autofocus />
              <x-input-error :messages="$errors->get('gender')" class="mt-2" />
            </div>
            <div class="flex flex-col mb-4">
              <x-input-label for="date_of_birth" :value="__('Date_of_birth')" />
              <x-text-input id="date_of_birth" class="block mt-1 w-full" type="text" name="date_of_birth" value="{{$information->date_of_birth}}" autofocus />
              <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
            </div>
              <div class="flex flex-col mb-4">
              <x-input-label for="age" :value="__('Age')" />
              <x-text-input id="age" class="block mt-1 w-full" type="text" name="age" value="{{$information->age}}" required autofocus />
              <x-input-error :messages="$errors->get('age')" class="mt-2" />
            </div>
            <div class="flex flex-col mb-4">
              <x-input-label for="blood_type" :value="__('Blood_type')" />
              <x-text-input id="blood_type" class="block mt-1 w-full" type="text" name="blood_type" value="{{$information->blood_type}}" autofocus />
              <x-input-error :messages="$errors->get('blood_type')" class="mt-2" />
            </div>
              <div class="flex flex-col mb-4">
              <x-input-label for="family" :value="__('Family')" />
              <x-text-input id="family" class="block mt-1 w-full" type="text" name="family" value="{{$information->family}}" required autofocus />
              <x-input-error :messages="$errors->get('family')" class="mt-2" />
            </div>
            <div class="flex flex-col mb-4">
              <x-input-label for="hobby" :value="__('Hobby')" />
              <x-text-input id="hobby" class="block mt-1 w-full" type="text" name="hobby" value="{{$information->hobby}}" autofocus />
              <x-input-error :messages="$errors->get('hobby')" class="mt-2" />
            </div>
            <div class="flex flex-col mb-4">
              <x-input-label for="specialty" :value="__('Specialty')" />
              <x-text-input id="specialty" class="block mt-1 w-full" type="text" name="specialty" value="{{$information->specialty}}" required autofocus />
              <x-input-error :messages="$errors->get('specialty')" class="mt-2" />
            </div>
            <div class="flex flex-col mb-4">
              <x-input-label for="like" :value="__('Like')" />
              <x-text-input id="like" class="block mt-1 w-full" type="text" name="like" value="{{$information->like}}" autofocus />
              <x-input-error :messages="$errors->get('like')" class="mt-2" />
            </div>
            <div class="flex flex-col mb-4">
              <x-input-label for="dislike" :value="__('Dislike')" />
              <x-text-input id="dislike" class="block mt-1 w-full" type="text" name="dislike" value="{{$information->dislike}}" required autofocus />
              <x-input-error :messages="$errors->get('dislike')" class="mt-2" />
            </div>
            <div class="flex flex-col mb-4">
              <x-input-label for="theme" :value="__('Theme')" />
              <x-text-input id="theme" class="block mt-1 w-full" type="text" name="theme" value="{{$information->theme}}" autofocus />
              <x-input-error :messages="$errors->get('theme')" class="mt-2" />
            </div>
            <div class="flex items-center justify-end mt-4">
              <a href="{{ url()->previous() }}">
                <x-secondary-button class="ml-3">
                  {{ __('Back') }}
                </x-primary-button>
              </a>
              <x-primary-button class="ml-3">
                {{ __('Update') }}
              </x-primary-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
