<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todos los Usuarios') }}
        </h2>
    </x-slot>

<!--
  Tailwind UI components require Tailwind CSS v1.8 and the @tailwindcss/ui plugin.
  Read the documentation to get started: https://tailwindui.com/documentation
-->
<div class="flex flex-col mt-5">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead>
              <tr>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                  Nombre
                </th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                  Direccion
                </th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                  Estado
                </th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                  Rol
                </th>
                <th class="px-6 py-3 bg-gray-50"></th>
              </tr>
            </thead>
            @foreach ($users as $item)
            <tbody class="bg-white divide-y divide-gray-200">
              <tr>
                <td class="px-6 py-4 whitespace-no-wrap">
                  <div class="flex items-center">
                      
                        <div class="flex-shrink-0 h-10 w-10">
                        <img  class="h-10 w-10 rounded-full" 
                                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60" alt="">
                        </div>
                        <div class="ml-4">
                        <div class="text-sm leading-5 font-medium text-gray-900">
                            {{ $item->name}}
                        </div>
                        <div class="text-sm leading-5 text-gray-500">
                            {{ $item->email}}
                        </div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-no-wrap">
                  <div class="text-sm leading-5 text-gray-900">
                      Regional Paradigm Technician
                    </div>
                  <div class="text-sm leading-5 text-gray-500">
                      Optimization
                </div>
                </td>
                <td class="px-6 py-4 whitespace-no-wrap">
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    Active
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                  Admin
                </td>
                <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                  <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                </td>
              </tr>
  
              <!-- More rows... -->
            </tbody>
            @endforeach
          </table><br>
          {{ $users->links() }}
        </div>
      </div>
    </div>
  </div>
 
</x-app-layout>