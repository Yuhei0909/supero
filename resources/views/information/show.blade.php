<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Show Information Detail') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800">
          <div class="mb-6">
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">Icon</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="icon">
                {{$information->icon}}
              </p>
            </div>
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">Nickname</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="nickname">
                {{$information->nickname}}
              </p>
            </div>
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">Gender</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="gender">
                {{$information->gender}}
              </p>
            </div>
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">Date_of_birth</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="date_of_birth">
                {{$information->date_of_birth}}
              </p>
            </div>
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">Age</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="age">
                {{$information->age}}
              </p>
            </div>
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">Blood_type</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="blood_type">
                {{$information->blood_type}}
              </p>
            </div>
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">Family</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="family">
                {{$information->family}}
              </p>
            </div>
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">Hobby</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="hobby">
                {{$information->hobby}}
              </p>
            </div>
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">Specialty</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="specialty">
                {{$information->specialty}}
              </p>
            </div>
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">Like</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="like">
                {{$information->like}}
              </p>
            </div>
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">Dislike</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="dislike">
                {{$information->dislike}}
              </p>
            </div>
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">Theme</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="theme">
                {{$information->theme}}
              </p>
            </div>
            <div class="flex items-center justify-end mt-4">
            <a href="{{ url()->previous() }}">
              <x-secondary-button class="ml-3">
                {{ __('Back') }}
              </x-primary-button>
            </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
