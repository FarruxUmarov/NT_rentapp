<div class="relative">
    <div class="grid grid-cols-2 gap-6 mt-6">
        <div class="rounded-md shadow dark:shadow-gray-700 p-6 bg-white dark:bg-slate-900 h-fit">
            <div>
                <p class="font-medium mb-4">Upload your property image here, Please click "Upload Image" Button.</p>
                <div class="preview-box flex justify-center rounded-md shadow dark:shadow-gray-800 overflow-hidden bg-gray-50 dark:bg-slate-800 text-slate-400 p-2 text-center small w-auto max-h-60">Supports JPG, PNG and MP4 videos. Max file size : 10MB.</div>
                <input form="ads-create" type="file" id="input-file" name="image" accept="image/*" onchange={handleChange()} hidden>
                <label class="btn-upload btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md mt-6 cursor-pointer" for="input-file">Upload Image</label>
            </div>
        </div>

        <div class="rounded-md shadow dark:shadow-gray-700 p-6 bg-white dark:bg-slate-900 h-fit">
            <form id="ads-create" action="{{$action}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-12 gap-5">

                    <div class="col-span-12">
                        <label for="title" class="font-medium">Sarlavha</label>
                        <div class="form-icon relative mt-2">
                            <i class="mdi mdi-format-text absolute top-2 start-4 text-green-600"></i>
                            <input name="title" id="title" type="text" class="form-input ps-11" placeholder="Sarlovha :" required>
                        </div>
                    </div>

                    <div class="col-span-12">
                        <label for="address" class="font-medium">Manzil</label>
                        <div class="form-icon relative mt-2">
                            <i class="mdi mdi-map-marker-radius absolute top-2 start-4 text-green-600"></i>
                            <input name="address" id="address" type="text" class="form-input ps-11" placeholder="Manzil :" required>
                        </div>
                    </div>

                    <div class="md:col-span-4 col-span-1">
                        <label for="rooms" class="font-medium">Xonalar</label>
                        <div class="form-icon relative mt-2">
                            <i class="mdi mdi-door-open absolute top-2 start-4 text-green-600"></i>
                            <input name="rooms" id="rooms" type="number" class="form-input ps-11" placeholder="Xonalar :" required>
                        </div>
                    </div>

                    <div class="md:col-span-4 col-span-12">
                        <label for="square" class="font-medium">Maydon (m.kv)</label>
                        <div class="form-icon relative mt-2">
                            <i class="mdi mdi-ruler-square absolute top-2 start-4 text-green-600"></i>
                            <input name="square" id="square" type="number" class="form-input ps-11" placeholder="Maydon :" required>
                        </div>
                    </div>


                    <div class="md:col-span-4 col-span-12">
                        <label for="branch" class="font-medium">Branch</label>
                        <div class="form-icon relative mt-2">
                            <select name="branch" class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" id="branch" required>
                                <option value="">Branch : </option>
                                @foreach ($branches as $branch)

                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-span-12">
                        <label for="desc" class="font-medium">Ta'rif</label>
                        <div class="form-icon relative mt-2">
                            <i class="mdi mdi-text absolute top-2 start-4 text-green-600"></i>
                            <textarea name="desc" id="desc" class="form-input ps-11" placeholder="E'lon bo'yicha ta'rif..." required></textarea>
                        </div>
                    </div>

                    <div class="col-span-12">
                        <label for="price" class="font-medium">Narxi ($):</label>
                        <div class="form-icon relative mt-2">
                            <i class="mdi mdi-currency-usd absolute top-2 start-4 text-green-600"></i>
                            <input name="price" id="price" type="number" class="form-input ps-11" placeholder="Narxi :">
                        </div>
                    </div>

                    <div class="md:col-span-4 col-span-12 hidden">
                        <div class="form-icon relative mt-2">
                            <input name="user" value="{{ auth()->id() }}" type="number" class="form-input ps-11">
                        </div>
                    </div>

                    <div class="md:col-span-4 col-span-12 hidden">
                        <div class="form-icon relative mt-2">
                            <input name="status" value="1" type="number" class="form-input ps-11">
                        </div>
                    </div>

                </div>

                <button type="submit" id="submit" name="send" class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md mt-5">Add Property</button>
            </form>
        </div>
    </div>
</div>
<script>
    const handleChange = () => {
        const fileUploader = document.querySelector('#input-file');
        const getFile = fileUploader.files
        if (getFile.length !== 0) {
            const uploadedFile = getFile[0];
            readFile(uploadedFile);
        }
    }

    const readFile = (uploadedFile) => {
        if (uploadedFile) {
            const reader = new FileReader();
            reader.onload = () => {
                const parent = document.querySelector('.preview-box');
                parent.innerHTML = `<img class="preview-content" src=${reader.result} />`;
            };

            reader.readAsDataURL(uploadedFile);
        }
    };
</script>
<!-- End Content -->

