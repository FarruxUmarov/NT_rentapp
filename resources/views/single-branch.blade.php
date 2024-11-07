<x-main-layout>

    <!-- Start -->
    <section class="relative md:py-24 pt-24 pb-16">
        <div class="container relative">
            <div class="grid grid-cols-1">
                <div class="p-6 rounded-md bg-green-600/10 dark:bg-green-600/20">
                    <div class="md:flex items-center">
                        <img src="/assets/images/agency/najot_talim.jpg" class="rounded-full size-28" alt="">

                        <div class="md:ms-4 md:mt-0 mt-4 md:flex justify-between items-end">
                            <div>
                                <h5 class="text-2xl font-medium"> {{ $branch->name }} filiali <span class="text-base md:inline block md:mt-0 mt-2"><span class="text-slate-400"><span class="mdi mdi-circle-medium align-middle md:inline-block hidden"></span>Real Estate Agency</span></span></h5>

                                <ul class="list-none mt-2 md:flex items-center md:divide-x-[1px] divide-slate-400">
                                    <li class="md:inline-flex flex">
                                        <ul class="text-amber-400 list-none">
                                            <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                            <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                            <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                            <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                            <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                            <li class="inline text-black dark:text-white">4.84(30)</li>
                                        </ul>
                                    </li>

                                    <li class="md:inline-flex flex items-center md:mx-2 md:mt-0 mt-2 md:px-2"><i data-feather="phone" class="size-4 align-middle text-green-600 me-2"></i> +(998) 78 888-98-88</li>

                                    <li class="md:inline-flex flex items-center md:mx-2 md:mt-0 mt-2 md:px-2">
                                        <ul class="list-none">
                                            <li class="inline"><a href="" class="btn btn-icon btn-sm border border-gray-300 dark:border-gray-400 rounded-md text-slate-400 hover:border-green-600 hover:text-white hover:bg-green-600 dark:hover:border-green-600"><i data-feather="facebook" class="size-4"></i></a></li>
                                            <li class="inline"><a href="" class="btn btn-icon btn-sm border border-gray-300 dark:border-gray-400 rounded-md text-slate-400 hover:border-green-600 hover:text-white hover:bg-green-600 dark:hover:border-green-600"><i data-feather="instagram" class="size-4"></i></a></li>
                                            <li class="inline"><a href="" class="btn btn-icon btn-sm border border-gray-300 dark:border-gray-400 rounded-md text-slate-400 hover:border-green-600 hover:text-white hover:bg-green-600 dark:hover:border-green-600"><i data-feather="twitter" class="size-4"></i></a></li>
                                            <li class="inline"><a href="" class="btn btn-icon btn-sm border border-gray-300 dark:border-gray-400 rounded-md text-slate-400 hover:border-green-600 hover:text-white hover:bg-green-600 dark:hover:border-green-600"><i data-feather="linkedin" class="size-4"></i></a></li>
                                        </ul><!--end icon-->
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end grid-->
        </div><!--end container-->

        <div class="container relative mt-6">

            <h5 class="text-xl font-medium mt-6 mb-4">Our Listings</h5>

            <x-ads :ads="$ads"/>

        </div><!--end container-->

    </section><!--end section-->
    <!-- End -->

</x-main-layout>
