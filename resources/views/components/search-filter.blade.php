<div class="container relative z-1">
    <div class="grid grid-cols-1 justify-center">
        <div class="relative -mt-32">
            <div class="grid grid-cols-1">
                <ul class="inline-block mx-auto sm:w-fit w-full flex-wrap justify-center text-center p-4 bg-white dark:bg-slate-900 backdrop-blur-sm rounded-t-xl border-b dark:border-gray-800" id="myTab" data-tabs-toggle="#StarterContent" role="tablist">
                    <li role="presentation" class="inline-block">
                        <button class="px-6 py-2 text-base font-medium rounded-md w-full hover:text-green-600 transition-all duration-500 ease-in-out" id="buy-home-tab" data-tabs-target="#buy-home" type="button" role="tab" aria-controls="buy-home" aria-selected="true">Rent</button>
                    </li>
                    <li role="presentation" class="inline-block">
                        <button class="px-6 py-2 text-base font-medium rounded-md w-full transition-all duration-500 ease-in-out" id="sell-home-tab" data-tabs-target="#sell-home" type="button" role="tab" aria-controls="sell-home" aria-selected="false">Roommate</button>
                    </li>
                </ul>

                <div id="StarterContent" class="p-6 bg-white dark:bg-slate-900 md:rounded-xl rounded-none shadow-md dark:shadow-gray-700">
                    <div class="" id="buy-home" role="tabpanel" aria-labelledby="buy-home-tab">
                        <form action="/search" method="get">
                            <div class="registration-form text-dark text-start">
                                <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 lg:gap-0 gap-6">
                                    <div>
                                        <label class="form-label font-medium text-slate-900 dark:text-white">Search : <span class="text-red-600">*</span></label>
                                        <div class="filter-search-form relative filter-border mt-2">
                                            <i class="uil uil-search icons"></i>
                                            <input name="search_phrase" type="text" id="job-keyword" class="form-input filter-input-box bg-gray-50 dark:bg-slate-800 border-0" placeholder="Search your keaywords">
                                        </div>
                                    </div>


                                    <div>
                                        <label for="buy-properties" class="form-label font-medium text-slate-900 dark:text-white">Select Branches:</label>
                                        <div class="filter-search-form relative filter-border mt-2">
                                            <i class="uil uil-estate icons"></i>
                                            <select class="form-select z-2" data-trigger name="branch" id="choices-catagory-buy" aria-label="Default select example">
                                                <option value="">Branch : </option>
                                                @foreach($branches as $branch)
                                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div>
                                        <label for="buy-min-price" class="form-label font-medium text-slate-900 dark:text-white">Min Price :</label>
                                        <div class="filter-search-form relative filter-border mt-2">
                                            <i class="uil uil-usd-circle icons"></i>
                                            <input name="min_price" type="number" id="choices-min-price-buy" class="form-input filter-input-box bg-gray-50 dark:bg-slate-800 border-0" data-trigger aria-label="Default select example" placeholder="Min Price">
                                        </div>
                                    </div>

                                    <div>
                                        <label for="buy-max-price" class="form-label font-medium text-slate-900 dark:text-white">Max Price :</label>
                                        <div class="filter-search-form relative mt-2">
                                            <i class="uil uil-usd-circle icons"></i>
                                            <input name="max_price" type="number" id="choices-max-price-buy" class="form-input filter-input-box bg-gray-50 dark:bg-slate-800 border-0" data-trigger aria-label="Default select example" placeholder="Min Price">
                                        </div>
                                    </div>

                                    <div class="lg:mt-6">
                                        <input type="submit" id="search-buy" name="search" class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white searchbtn submit-btn w-full !h-12 rounded" value="Search">
                                    </div>
                                </div><!--end grid-->
                            </div><!--end container-->
                        </form>
                    </div>

                    <div class="hidden" id="sell-home" role="tabpanel" aria-labelledby="sell-home-tab">
                        <form action="#">
                            <div class="registration-form text-dark ltr:text-start rtl:text-end">
                                <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 lg:gap-0 gap-6">
                                    <div>
                                        <label class="form-label font-medium text-slate-900 dark:text-white">Search : <span class="text-red-600">*</span></label>
                                        <div class="filter-search-form relative filter-border mt-2">
                                            <i class="uil uil-search icons"></i>
                                            <input name="name" type="text" id="job-keyword" class="form-input filter-input-box bg-gray-50 dark:bg-slate-800 border-0" placeholder="Search your keaywords">
                                        </div>
                                    </div>

                                    <div>
                                        <label for="buy-properties" class="form-label font-medium text-slate-900 dark:text-white">Select Categories:</label>
                                        <div class="filter-search-form relative filter-border mt-2">
                                            <i class="uil uil-estate icons"></i>
                                            <select class="form-select z-2" data-trigger name="choices-catagory" id="choices-catagory-sell" aria-label="Default select example">
                                                <option>Houses</option>
                                                <option>Apartment</option>
                                                <option>Offices</option>
                                                <option>Townhome</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div>
                                        <label for="buy-min-price" class="form-label font-medium text-slate-900 dark:text-white">Min Price :</label>
                                        <div class="filter-search-form relative filter-border mt-2">
                                            <i class="uil uil-usd-circle icons"></i>
                                            <select class="form-select" data-trigger name="choices-min-price" id="choices-min-price-sell" aria-label="Default select example">
                                                <option>Min Price</option>
                                                <option>500</option>
                                                <option>1000</option>
                                                <option>2000</option>
                                                <option>3000</option>
                                                <option>4000</option>
                                                <option>5000</option>
                                                <option>6000</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div>
                                        <label for="buy-max-price" class="form-label font-medium text-slate-900 dark:text-white">Max Price :</label>
                                        <div class="filter-search-form relative mt-2">
                                            <i class="uil uil-usd-circle icons"></i>
                                            <select class="form-select" data-trigger name="choices-max-price" id="choices-max-price-sell" aria-label="Default select example">
                                                <option>Max Price</option>
                                                <option>500</option>
                                                <option>1000</option>
                                                <option>2000</option>
                                                <option>3000</option>
                                                <option>4000</option>
                                                <option>5000</option>
                                                <option>6000</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="lg:mt-6">
                                        <input type="submit" id="search-sell" name="search" class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white searchbtn submit-btn w-full !h-12 rounded" value="Search">
                                    </div>
                                </div><!--end grid-->
                            </div><!--end container-->
                        </form>
                    </div>
                </div>
            </div><!--end grid-->
        </div>
    </div><!--end grid-->
</div><!--end container-->
