<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries">
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    clifford: '#da373d',
                }
            }
        }
    }
    </script>
    <!-- Styles -->
    <style type="text/tailwindcss">
        @layer utilities {
      .content-auto {
        content-visibility: auto;
      }
    }
  </style>
</head>

<body class="bg-black">
    <!-- component -->
    <!-- component -->
    <section class="pt-24  w-full h-full">
        <div class="px-12 mx-auto max-w-7xl">
            <div class="w-full mx-auto text-left md:w-11/12 xl:w-9/12 md:text-center ">
                <h1
                    class="mb-8 text-4xl font-extrabold leading-none tracking-normal text-slate-300 md:text-6xl md:tracking-tight ">
                    <span>Mulai</span> <span
                        class="block w-full py-2 text-transparent bg-clip-text leading-12 bg-gradient-to-r from-green-400 to-purple-500 lg:inline">kelola
                        data</span> <span>dengan mudah sekarang juga </span>
                </h1>
                <p class="px-0 mb-8 text-lg text-gray-600 md:text-xl lg:px-24 text-slate-300">
                    Mulailah mengelola data Anda sekarang juga dengan template dan desain terkini kami. Dirancang untuk
                    mendukung Anda dalam menyampaikan kisah sukses dan meraih hasil yang optimal.
                </p>
                <div class="mb-4 space-x-0 md:space-x-2 md:mb-8">
                    <a href="<?= url('/admin/login'); ?>"
                        class="inline-flex items-center justify-center w-full px-6 py-3 mb-2 text-lg text-white bg-green-400 rounded-2xl sm:w-auto sm:mb-0">
                        Masuk Dashboard
                        <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                 
                </div>
            </div>
            <div class="w-full mx-auto mt-20 text-center md:w-10/12 shadow-2xl shadow-slate-100 ">
                <div class="relative z-0 w-full mt-8">
                    <div class="relative overflow-hidden shadow-2xl">
                        <div class="flex items-center flex-none px-4 bg-green-400 rounded-b-none h-11 rounded-xl">
                            <div class="flex space-x-1.5">
                                <div class="w-3 h-3 border-2 border-white rounded-full"></div>
                                <div class="w-3 h-3 border-2 border-white rounded-full"></div>
                                <div class="w-3 h-3 border-2 border-white rounded-full"></div>
                            </div>
                        </div>
                        <img src="https://cdn.devdojo.com/images/march2021/green-dashboard.jpg">
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
