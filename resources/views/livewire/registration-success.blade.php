
<div class="bg-white">
    <div class="mx-auto max-w-7xl py-24 sm:px-6 sm:py-32 lg:px-8">
      <div class="relative isolate overflow-hidden bg-white px-6 pt-16 shadow-2xl sm:rounded-3xl sm:px-16 md:pt-24 lg:flex lg:gap-x-20 lg:px-24 lg:pt-0">
        <div class="mx-auto max-w-md text-center lg:mx-0 lg:flex-auto lg:py-32 lg:text-left">
          <h2 class="text-3xl font-bold tracking-tight text-gray.800 sm:text-4xl">Thanks for your Registration</h2>
          <p class="mt-6 text-lg leading-8 text-gray-500">{{$status}}</p>
          <pre>
            {{ json_encode(json_decode($data, true), JSON_PRETTY_PRINT) }}
          </pre>
          <div class="mt-10 flex items-center justify-center gap-x-6 lg:justify-start">
            <a href="{{ url('/') }}" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Get started</a>
            <a href="#" class="text-sm font-semibold leading-6 text-gray-500">Learn more <span aria-hidden="true">→</span></a>
          </div>
        </div>
      </div>
    </div>
  </div>